<style>
    .key {
        background-color: #F6C08A;
        font-size:2em;
        border-radius: 25px;
        padding-left:20px;
    }
    p {
        background-color: #7BD195;
        font-size:2em;
        border-radius: 25px;
        padding-left:20px;
    }
    input {
        border-radius: 25px;
        font-size:2em;
        padding-left:20px;
    }
@media (min-width: 769px) {
    body {
        background-color:rgba(0,0,0,0.0);
        margin-top:5%;
    }
}
    @media (max-width: 768px) {
        body {
            margin-top:25%;
            background-color:rgba(0,0,0,0.0);
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="/lesson/purchase/step3" method="post">
                <h2>Order form</h2>
                <p>Order your official DMV certificate today</p>
                <?php if (isset($error)):?>
                    <h2 style="color:red"><?php echo $error?></h2>
                <?php endif;?>
                <div>
                    <p>Cost (Including shipping and handling): $<span id="sub_total">49.95</span></p>
                </div>
                <div>
                    <p>
                    <input type="checkbox" id="expedite" name="expedite" /> Expedite the process for an addition $19.95
                    </p>
                </div>
                <div>
                    <p>
                        Total: $<span id="total"></span>
                       <input id="amount" name="amount" type="hidden" value="49.95"/>
                    </p>
                </div>
                <div>
                    <table>
                        <tr><td class="key">Credit Card No</td><td><input name="cc_no" /></td></tr>
                        <tr><td class="key">CCV</td><td><input name="ccv" /></td></tr>
                        <tr><td class="key">Expiration Month</td><td><input name="month" /></td></tr>
                        <tr><td class="key">Expiration Year</td><td><input name="year" /></td></tr>
                        <tr><td class="key">Name On Card</td><td><input name="name" /></td></tr>
                    </table>
                </div>
                <div>
                    <h3>Billing Address</h3>
                    <div><input id="same_billing" type="checkbox" name="same_as_billing" /> Check here if the billing address is the same as the shipping address</div>
                    <table id="billing_table">
                        <tr><td class="key">Billing Address 1</td><td><input class="billing_form" name="billing_addy1" /></td></tr>
                        <tr><td class="key">Billing Address 2</td><td><input class="billing_form" name="billing_addy2" /></td></tr>
                        <tr><td class="key">Billing City</td><td><input class="billing_form" name="billing_city" /></td></tr>
                        <tr><td class="key">Billing State</td><td><input class="billing_form" name="billing_state" /></td></tr>
                        <tr><td class="key">Billing ZIP</td><td><input class="billing_form" name="billing_zip" /></td></tr>
                    </table>
                </div>
                <div>
                    <a target="_blank" href="/lesson/terms" />Terms and Conditions</a>
                </div>
                <div>
                    <input style="padding-right:20px" type="submit" value="Order" />
                    <a href="/lesson/congrats" style="text-decoration:none; border-radius:25px;font-size:2em;padding-left:20px;background-color:#7BD195;padding-right:20px;">Start Over</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/lesson/assets/js/jquery.js"></script>
<script>
    $(document).ready(function() {
        var total = parseFloat($('#sub_total').text());
        $('#expedite').prop('checked', false);
        $('#total').text(total.toFixed(2));

        $('#expedite').change(function() {
            if (this.checked) {
                total += 19.95;
                $('#total').text(total.toFixed(2));
                $('#amount').val(total.toFixed(2));
            }
            if (!this.checked) {
                total -= 19.95;
                $('#total').text(total.toFixed(2));
                $('#amount').val(total.toFixed(2));
            }
        });

        $('#same_billing').change(function() {
            if ($(this).is(":checked")) {
                $('#billing_table').hide();
            } else {
                $('#billing_table').show();
            }
        });
    });
</script>
