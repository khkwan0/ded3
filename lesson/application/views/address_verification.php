<style>
    .key {
        font-size: 2em;
    }

    .value {
        font-size: 2em;
        border-radius:25px;
        padding-left:50px;
        background-color: #7BD195;
        padding-right:50px;

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

    .container {
        background-color:rgba(0,0,0,0.1);
        border-radius: 25px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Please verify shipping address and name of trainee</h2>
            <table>
                <?php foreach ($info as $key=>$value):?>
                    <tr>
                        <td class="key"><?php echo ucfirst(str_replace('_',' ',$key))?></td><td class="value"><?php echo $value?></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <div style="background-color:#DE6A6A; margin-top:40px;border-radius:25px;font-size:2em;padding-left:20px; text-align:center;">
                <a style="text-decoration: none" href="/lesson/congrats">Not Correct</a>
            </div>
            <div style="background-color:#F6C08A; margin-top:40px;border-radius:25px;font-size:2em;padding-left:20px; text-align:center;">
                <form method="post" action="/lesson/purchase/step2">
                    <input type="hidden" value="<?php echo base64_encode(json_encode($info))?>" name="driver" />
                    <input type="submit" value="OK.  Verified all information is correct" />
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
<div>
