<?php

class Purchase extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
    }

    public function step1() {
        $this->load->view('html_header', array('css'=>array('welcome.css')));
        $user_id = $this->session->userdata('user_id');
        $driver = array(
                'first_name'      =>  $this->input->post('first_name'),
                'last_name'      =>  $this->input->post('last_name'),
                'address1'  =>  $this->input->post('addy1'),
                'address2'  =>  $this->input->post('addy2'),
                'city'      =>  $this->input->post('city'),
                'state'     =>  $this->input->post('state'),
                'zip'       =>  $this->input->post('zip'),
                );

        $this->load->model('usersmodel');
        if ($user_id && $this->usersmodel->passed($user_id)) {
            $this->load->view('address_verification', array('info'=>$driver));
        } else {
            $this->load->view('error');
        }
        $this->load->view('html_footer');
    }

    public function step2() {  // enter CC info
        $raw_info = $this->input->post('driver');
        $user_id = $this->session->userdata('user_id');
        $this->load->view('html_header', array('css'=>array('welcome.css')));
        if ($user_id && isset($raw_info)) {
            $this->usersmodel->saveUserData($user_id, $raw_info);
            $this->load->view('order');
        } else {
            $this->load->view('error');
        }
        $this->load->view('html_footer');
        
    }

    public function step3() {
        $user_id = $this->session->userdata('user_id');
        $this->load->view('html_header', array('css'=>array('welcome.css')));
        if ($user_id) {
            $card_info = array(
                    'cc_no'     =>  $this->input->post('cc_no'),
                    'ccv'       =>  $this->input->post('ccv'),
                    'month'     =>  $this->input->post('month'),
                    'year'      =>  $this->input->post('year'),
                    'name'      =>  $this->input->post('name'),
                    'expedite'  =>  $this->input->post('expedite'),
                    'amount'    =>  $this->input->post('amount'),
                    );
            $rv = $this->validate($card_info);
            if ($this->input->post('same_as_billing') == 'on') {
                $billing_info = 'same';
            } else {
                $billing_info = array(
                        'billing_addy1'     =>  $this->input->post('billing_addy1'),
                        'billing_addy2'     =>  $this->input->post('billing_addy2'),
                        'billing_city'     =>  $this->input->post('billing_city'),
                        'billing_state'     =>  $this->input->post('billing_state'),
                        'billing_zip'     =>  $this->input->post('billing_zip'),
                        );
            }
            $this->usersmodel->saveBillingInfo($user_id, $billing_info);
            if ($rv['pass']) {
                $this->load->model('usersmodel');
                $driver = $this->usersmodel->getShippingInfo($user_id);
                $billing = $this->usersmodel->getBillingInfo($user_id);
                if ($billing == 'same') { $billing = $driver; }
                $this->load->view('complete_verification', array('info'=>$card_info, 'raw_driver'=>$driver, 'billing'=>$billing));
            } else {
                $this->load->view('order', array('error'=>'The credit card appears invalid.  Please enter a valid credit card.  '.$rv['error']));
            }
        } else {
            $this->load->view('error');
        }
        $this->load->view('html_footer');
    }

    public function charge() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $this->load->view('html_header', array('css'=>array('welcome.css')));
            $raw_cc = $this->input->post('dvklj');
            if (isset($raw_cc) && $raw_cc) {
                $cc = json_decode(base64_decode($raw_cc), true);
                $this->load->model('billing');
                $this->load->model('usersmodel');
                $invoice = $this->billing->createInvoice($user_id, $cc['amount']);
                $ship = json_decode(base64_decode($this->usersmodel->getShippingInfo($user_id)), true);
                $bill = json_decode(base64_decode($this->usersmodel->getBillingInfo($user_id)), true);
                if (isset($invoice) && isset($invoice['invoice_id'])) {
                    $result = $this->process($cc, $invoice, $ship, $bill);
                } else {
                    echo 'Failed to generate invoice.  please contact info@caldrivers.com.';
                }
                if (isset($res[11]['value'])) {
                    $this->usersmodel->updatePaid($user_id, $cc);
                    $user_info = $user_info = $this->usersmodel->getUserInfo($user_id);
                    $email = $user_info['email'];
                    $email_body = "Congratulations, you have passed and purchased a signed California Depart of Motor Vehicles learner's certification.  We are currently reviewing your exam and processing your shipping request.  We should have the certificate in the mail headed to your shipping destination with 48 hours.  If you chose to expedite, the shipment should be delivered within the next working day (assuming you purchased before 4 PM).";
                    mail($email,'driversedtoday.net Purchase confirmation: '.$res[11]['value'],$email_body);
                    mail('chris@caldrivers.com,ken@caldrivers.com',$email.' completed and paid', 'Review and send this asap');
                }
                $this->load->view('confirmation',array('res'=>$result));
            }
            $this->load->view('html_footer');
        }
    }

    private function validate($card_info = array()) {
        $pass_filter = false;
        $error = '';

        // remove dashes and spaces from cc noumber and verify
        $card_info['cc_no'] = filter_var($card_info['cc_no'],FILTER_SANITIZE_NUMBER_INT);
        $card_info['cc_no'] = str_replace(array('-','+'), '', $card_info['cc_no']);
        if (is_numeric($card_info['cc_no']) && (strlen($card_info['cc_no']) == 16 || strlen($card_info['cc_no']) == 15)) {
            $pass_filter = true;
        } else {
            $error = 'Invalid credit card number: '.$card_info['cc_no'];
        }

        if ($pass_filter) {
            $card_info['ccv'] = filter_var($card_info['ccv'], FILTER_SANITIZE_NUMBER_INT);
            $card_info['ccv'] = str_replace(array('-','+'), '', $card_info['ccv']);
            if (is_numeric($card_info['ccv']) && ((strlen($card_info['ccv']) == 3) || strlen($card_info['ccv']) == 4)) {
                $pass_filter = true;
            } else {
                $error = 'Invalid CCV';
            }
        }

        if ($pass_filter) {
            if (is_numeric($card_info['month']) && $card_info['month']>0 && $card_info['month']<13 && is_int($card_info['month'])) {
                $pass_filter = true;
            } else {
                $error = 'Invalid Month';
            }
        }

        if ($pass_filter) {
            if (is_numeric($card_info['year']) && $card_info['year']>2015 && is_int($card_info['year'])) {
                $pass_filter = true;
            } else {
                $error = 'Invalid Month';
            }
        }

        if ($pass_filter) {
            if ($card_info['year'] >= date('Y', time())) {
                if ($card_info['year'] == date('Y', time())) {
                    if ($card_info['month'] >= date('m', time())) {
                        $pass_filter = true;
                    } else {
                        $error = 'Invalid Date';
                    }
                } else {
                    $pass_filter = true;
                }
            } else {
                $error = 'Invalid Date';
            }
        }

        $res = array(
            'pass'  =>  $pass_filter,
            'error' =>  $error,
            );
        return $res;
    }

    private function process($card_info = array(), $invoice = array(), $ship = array(), $bill = array()) {
        $bill_name = explode(' ',$card_info['name']);
        $bill_first_name = $bill_name[0];
        $bill_last_name = $bill_name[1];
        $prod_id = '<name>46uGU25Phsj</name>';
        $prod_trans_key = '<transactionKey>3Qawmg927Jj384VG</transactionKey>';
        $sandbox_id_and_key =' <name>5DvHq56d</name><transactionKey>342Vev9Lbj76LfEq</transactionKey>';
        $xml = '
            <createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
                <merchantAuthentication>'
                .$prod_id.$prod_trans_key.
                '
                </merchantAuthentication>
                <refId>'.$invoice['ref_id'].'</refId>
                <transactionRequest>
                <transactionType>authCaptureTransaction</transactionType>
                <amount>'.$card_info['amount'].'</amount>
                <payment>
                    <creditCard>
                        <cardNumber>'.$card_info['cc_no'].'</cardNumber>
                        <expirationDate>'.$card_info['month'].$card_info['year'].'</expirationDate>
                        <cardCode>'.$card_info['ccv'].'</cardCode>
                    </creditCard>
                </payment>
                <order>
                 <invoiceNumber>INV-'.$invoice['invoice_id'].'</invoiceNumber>
                 <description>CA DMV Certificate</description>
                </order>
                <lineItems>
                  <lineItem>
                    <itemId>1</itemId>
                    <name>vase</name>
                    <description>Cannes logo </description>
                    <quantity>18</quantity>
                    <unitPrice>45.00</unitPrice>
                  </lineItem>
                </lineItems>
                <billTo>
                    <firstName>'.$bill_first_name.'</firstName>
                    <lastName>'.$bill_last_name.'</lastName>
                    <address>'.$bill['billing_addy1'].' '.$bill['billing_addy2'].'</address>
                    <city>'.$bill['billing_city'].'</city>
                    <state>'.$bill['billing_state'].'</state>
                    <zip>'.$bill['billing_zip'].'</zip>
                    <country>USA</country>
                </billTo>
                <shipTo>
                  <firstName>'.$ship['first_name'].'</firstName>
                  <lastName>'.$ship['last_name'].'</lastName>
                  <address>'.$ship['address1'].' '.$ship['address2'].'</address>
                  <city>'.$ship['city'].'</city>
                  <state>'.$ship['state'].'</state>
                  <zip>'.$ship['zip'].'</zip>
                  <country>USA</country>
                </shipTo>
                <customerIP>192.168.1.1</customerIP>
              </transactionRequest>
            </createTransactionRequest>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.authorize.net/xml/v1/request.api");
        curl_setopt($ch,CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $res = curl_exec($ch);
        $this->billing->saveStatus($invoice['invoice_id'], $res);
        $p = xml_parser_create();
        xml_parse_into_struct($p, $res, $vals, $index);
        xml_parser_free($p);
        curl_close($ch);
        return $vals;
    }
}
