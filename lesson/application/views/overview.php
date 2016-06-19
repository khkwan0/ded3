<style>
    html {
    background: url(/lesson/assets/img/lesson/<?php echo $background?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size:cover;
    font-family: arial;
    }

    ul {
        list-style-type:none;
    }

    .unit_li {
        font-size:1.5em;
        border-radius:25px;
        background-color: #F6C08A;
        margin-bottom:20px;
        padding:10px 10px 10px 10px;
        margin-right:20px;
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
    <div>
        <div style="margin-top:30px;padding-left:20px">
            <a href="/lesson/status">Back to status</a>
        </div>
        <div>
            <p style="padding-left:20px;padding-right:20px;font-size:1em;">
                The following is the list of major topics (called Units) that this lesson will cover.  It follows the DMV Guidelines exactly.  Each Unit consists of sections and each section consists of issues.  Each issue may have one or more slides that contain pertinent information regarding driving in a motor vehicle.
            </p>
        </div>
        <div>
            <ul>
                <?php foreach ($units as $unit=>$title):?>
                    <li class="unit_li" unit="<?php echo $unit?>"><?php echo $unit.'. '.strip_tags($title)?></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
