<div id="outer_div">
    <?php
        $i = 1;
        $j= 'a';
        foreach ($questions as $question_id=>$question) {
            echo '<div>';
            echo '<div class="question" id="question_'.$question_id.'">'.$i++.'.'.' '.$question['question'].'</div>';
            foreach ($question['answers'] as $answer) {
                if (isset($answer->answer) && $answer->answer) {
                echo '<div id="'.$question_id.'_'.$answer->answer_id.'">';
                echo '<input type="radio" name="question_'.$question_id.'" value="'.$question_id.','.$answer->answer_id.'" />'.urldecode($answer->answer);
                echo '</div>';
                }
            }
            echo '</div>';
        }
    ?>
</div>
<div>
    <button id="submit_button">Check Answers</button>
</div>
<div id="wrong">
</div>
<div id="next_go" style="display:none">
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
<div id="warning_div">
</div>
<script type="text/javascript" src="/lesson/assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#go_next').click(function(data) {
            if (<?php echo $is_final?>) {
                window.location = '/lesson/congrats';
            } else {
                window.location = '/lesson/teach/unit/9999';
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
                        $('.question').css('color','black');
                        for (var key in data) {
                            $('#question_'+key).css('color','red');
                            wrong++;
                        }
                        if (wrong>0) {
                            console.log('fail');
                            $('#wrong').text(wrong+' incorect answers');
                        } else {
                            if (is_final) {
                                window.location = '/lesson/congrats';
                            } else {
                                console.log('pass');
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
