<style>
    html {
    background: url(/lesson/assets/img/lesson/<?php echo $background?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size:cover;
    font-family: arial;
            color:white;
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

    .question { color:white; font-size: 2em; }
    .answer {color:#b09256; font-size:1.2em;}

</style>
<div id="container" style="background-color:rgba(64,64,64,0.8)">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <span class="prev"><a style="text-decoration:none;border-radius:25px;background-color:rgba(0,0,0,0.5);padding-left:10px;padding-right:10px;font-size:4em;color:#b09256;" href="/lesson/teach/unit/<?php echo $issue->id?>">Back</a></span>
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
        <div class="col-sm-4">
            <h2 style="color:#b09256">Quiz Unit: <?php echo $unit?></h2>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php
            $i = 1;
            $j= 'a';
            foreach ($questions as $question_id=>$question) {
                echo '<div>';
                echo '<div class="question" id="question_'.$question_id.'">'.$i++.'.'.' '.$question['question'].'</div>';
                foreach ($question['answers'] as $answer) {
                    if (isset($answer->answer) && $answer->answer) {
                    echo '<div class="answer" id="'.$question_id.'_'.$answer->answer_id.'">';
                    echo '<input type="radio" name="question_'.$question_id.'" value="'.$question_id.','.$answer->answer_id.'" />'.urldecode($answer->answer);
                    echo '</div>';
                    }
                }
                echo '</div>';
            }
        ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <button id="submit_button">Check Answers</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div id="wrong" style="font-size:2em;color:red"></div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div id="next_go" style="display:none;font-size:2em;color:#00ff00">
            <div>
                <?php if ($is_final):?>
                    Congratulations!  You passed the final!
                <?php else:?>
                    All correct.  Move onto the next unit?
                <?php endif;?>
            </div>
            <div>
                <button id="go_next">Continue</button>
            </div>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div id="warning_div" style="color:red;background-color:white;font-size:2em;"></div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script type="text/javascript" src="/lesson/assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#go_next').click(function(data) {
            if (<?php echo $is_final?>) {
                window.location = '/lesson/congrats';
            } else {
                window.location = '/lesson/teach/unit/<?php echo $next->id?>';
            }
        });

        $('#submit_button').click(function(data) {
            var answers = '';
            var validate = 0;
            var wrong = 0;
            var is_final = 0;
            $('#warning_div').html('');
            $('input:checked').each(function(data) {
                answers += $(this).val() + ';';
                validate++;
            });
            if (<?php echo count($questions)?> == validate) {
            console.log('Post');
                $.post('/lesson/ajax/checkAnswers',
                    {
                        answers: answers,
                        is_final: <?php echo $is_final?>
                    }, function(data) {
                        console.log('data: '+data);
                        $('#outer_div input').css('color','black');
                        $('.question').css('color','#00ff00');
                        for (var key in data) {
                            $('#question_'+key).css('color','red');
                            wrong++;
                        }
                        if (wrong>0) {
                            console.log('fail');
                            $('#wrong').text(wrong+' incorect answers.  All answers must be green to continue.  Please choose the correct answers.');
                        } else {
                            if (is_final) {
                                window.location = '/lesson/congrats';
                            } else {
                                $('#wrong').hide();
                                $('#next_go').show();
                            }
                        }
                    },'json'
                );
            } else {
                console.log(<?php echo count($questions)?> + ' != ' + validate);
                $('#warning_div').html('Please answer all questions');
                $('#warning_div').show();
            }
        });
    });
</script>
