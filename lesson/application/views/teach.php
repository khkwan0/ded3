<style>
    html {
    background: url(/lesson/assets/img/lesson/<?php echo $background?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size:cover;
    font-family: arial;
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
<div id="container" style="background-color:rgba(64,64,64,0.8)">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <?php if (isset($prev_id) && $prev_id):?>
                <span class="prev"><a style="text-decoration:none;border-radius:25px;background-color:rgba(0,0,0,0.5);padding-left:10px;padding-right:10px;font-size:4em;color:#b09256;" href="/lesson/teach/unit/<?php echo $prev_id?>">Back</a></span>
            <?php endif;?>
        </div>
        <div class="col-sm-2">
            <?php if ($at_end):?>
                <span class="next"><a href="/lesson/test/quiz/69">Take the final</a></span>
            <?php else:?>
                <span id="next"><a style="text-decoration:none;border-radius:25px;background-color:rgba(0,0,0,0.5);padding-left:10px; padding-right:10px;font-size:4em; color:#b09256;" href="/lesson/teach/unit/<?php echo $issues[1]->id?>">Next</a></span>
            <?php endif;?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h2 style="color:#dddddd">Welcome <?php echo $email?></h2>
            <h3><a style="text-decoration:none;border-radius:25px;background-color:#F6C08A;padding-left:10px;padding-right:10px;" href="/lesson/status">Exit</a></h3>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            Unit <?php echo $issues[0]->unit?>
        </div>
        <div class="col-sm-1">
            Section <?php echo $issues[0]->section?>
        </div>
        <div class="col-sm-1">
            Issue <?php echo $issues[0]->issue?>
        </div>
        <div class="col-sm-1">
            Slide <?php echo $issues[0]->slide?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="issue_area" style="font-size:2em;color:#b09256">
            <?php echo str_replace("</p>", "", str_replace("<p>", "", str_replace("<p>&nbsp;</p>", "", $issues[0]->lesson)))?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <?php if (isset($prev_id) && $prev_id):?>
                <span class="prev"><a style="text-decoration:none;border-radius:25px;background-color:rgba(0,0,0,0.5);padding-left:10px;padding-right:10px;font-size:4em;color:#b09256;" href="/lesson/teach/unit/<?php echo $prev_id?>">Back</a></span>
            <?php endif;?>
        </div>
        <div class="col-sm-2">
            <?php if ($at_end):?>
                <span id="next"><a href="/lesson/test/quiz/69">Take the final</a></span>
            <?php else:?>
                <span id="next"><a style="text-decoration:none;border-radius:25px;background-color:rgba(0,0,0,0.5);padding-left:10px; padding-right:10px;font-size:4em; color:#b09256;" href="/lesson/teach/unit/<?php echo $issues[1]->id?>">Next</a></span>
            <?php endif;?>
        </div>
    </div>
</div>
