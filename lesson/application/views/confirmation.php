<div id="login_ctr">
    <div>
    <?php if (isset($res[11]['value'])):?>
        <span>Purchase confirmed - Transaction ID: <?php echo $res[11]['value']?></span>
        <p>
        An email has been sent confirming this transaction.  If you have any questions, please contact info@caldrivers.com with the following reference id: <?php echo $res[1]['value']?>.  (We also emailed you this reference ID).
        </p>
    <?php else:?>
        <span>Problem with credit card.</span>
        <span>Please try <a href="/lesson/congrats">again</a></span>
    <?php endif;?>
    </div>
</div>
