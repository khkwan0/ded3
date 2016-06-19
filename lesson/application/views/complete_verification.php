<style>

    .key {
        background-color: #F6C08A;
        font-size:2em;
        border-radius: 25px;
    }
    td {
        font-size: 2em;
        padding-left:20px;
        padding-right:20px;
    }
</style>
<div id="login_ctr">
    <h2>The final Step</h2>
    <h3>
        <p>
            This is the final step before we submit your credit card.
        </p>
        <p class="important">
            Please make sure all information is correct.  We would hate to send the certificate to the wrong place.
        </p>
    </h3>
    <div>
        <?php
            $driver = json_decode(base64_decode($raw_driver), true);
            $billing = json_decode(base64_decode($billing), true);
            ?>
        <h3>Shipping to:</h3>
        <table>
            <?php foreach ($driver as $key=>$value):?>
            <tr>
                <td class="key"><?php echo ucfirst(str_replace('_',' ',$key))?><td><?php echo $value?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <h3>Billing to:</h3>
        <table>
            <?php foreach ($info as $key=>$value):?>
                <tr>
                    <?php if ($key == 'cc_no'):?>
                        <td class="key">Card ending in:</td>
                        <td>***<?php echo substr($value, 11)?></td>
                    <?php elseif($key == 'expedite'):?>
                        <td class="key"><?php echo ucfirst($key)?></td>
                        <td><?php echo ($value=='on'?'Yes':'No')?></td>
                    <?php elseif ($key != 'ccv'):?>
                        <td class="key"><?php echo ucfirst($key)?></td><td><?php echo $value?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        </table>
        <h3>Billing Info:</h3>
        <table>
            <?php foreach ($billing as $key=>$value):?>
                <tr>
                    <td class="key"><?php echo ucfirst(str_replace('_',' ',$key))?><td><?php echo $value?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <form method="post" action="/lesson/purchase/charge">
        <div style="margin-top:10px">
            <span>
                <a href="/lesson/congrats" style="text-decoration:none; border-radius:25px;font-size:2em;padding-left:20px;background-color:#7BD195;padding-right:20px;">Start Over</a>
            </span>
            <span style="margin-left:10px">
                    <input type="hidden" name="dvklj" value="<?php echo base64_encode(json_encode($info))?>" />
                    <input type="hidden" name="opiad" value="<?php echo base64_encode(json_encode($billing))?>" />
                    <input type="submit" value="PURCHASE" />
            </span>
        </div>
    </form>
</div>
