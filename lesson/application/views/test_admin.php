<style>
    .question_item {
        cursor:pointer;
    }

    .question_item:hover {
        color:red;
    }
</style>
<div>
    <a href="/lesson/admin">Back</a>
</div>
<div style="float:left">
    <div>
        Question:
        <div>
            <textarea cols="75" rows="8" id="question_area"></textarea>
        </div>
        <div>
            <button id="reset">New</button>
        </div>
        <input type="hidden" id="quest_id" value="0" />
    </div>
    <div style="width:600px">
        <table id="question_list">
            <tr><th>Question ID</th><th>Unit</th><th>Question</th></tr>
            <?php foreach ($questions as $question):?>
                <tr class="question_item" question_id="<?php echo $question->id?>" unit="<?php echo $question->unit?>">
                    <?php if ($question->active == 0):?>
                        <td><del><?php echo $question->id?></del></td><td><del><?php echo $question->unit?></del></td><td id="quest_<?php echo $question->id?>"><del><?php echo $question->question?></del></td>
                    <?php else:?>
                        <td><?php echo $question->id?></td><td><?php echo $question->unit?></td><td id="quest_<?php echo $question->id?>"><?php echo $question->question?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div style="float:left;margin-left:10px">
    <?php for($i=1;$i<6;$i++):?>
        <div>
            <?php echo chr(64+$i)?>.&nbsp;<input id="answer_id<?php echo $i?>" type="hidden" value="0" /><textarea cols="60" rows="2" answer_no="<?php echo $i?>" class="an_answer" id="answer<?php echo $i?>"></textarea>
            <input type="radio" name="is_correct" id="correct<?php echo $i?>" class="correct" value="<?php echo $i?>" />
        </div>
    <?php endfor;?>
    <div id="unit_ctr">
        Unit: <input id="unit" value="0" />
    </div>
    <div>
        <button id="save">Save</button>
    </div>
</div>
<div style="clear:both"></div>
<script type="text/javascript" src="/lesson/assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#save').click(function(data) {
            var question = $('#question_area').val();
            var quest_id = $('#quest_id').val();
            var answers = [];
            var correct = $('input[name=is_correct]:checked').val();
            var unit = $('#unit').val();

            if (unit>0 && correct) {
                $('.an_answer').each(function(data) {
                    var answer_no = $(this).attr('answer_no');
                    var datum = {text:escape($(this).val()), id:escape($('#answer_id'+answer_no).val())};
                    answers[answer_no-1] = datum;
                });
                console.log(correct);
                $.post('/lesson/ajax/createQuestion',
                    {
                        'question': question,
                        'question_id': quest_id,
                        'answers': answers,
                        'correct': correct,
                        'unit': unit
                    },
                    function(data) {
                        var insert_id = data;
                        if (quest_id == 0 && insert_id) {
                            var new_row = '<tr class="question_item" question_id="'+insert_id+'" unit="'+unit+'"><td>'+insert_id+'</td><td id="quest_'+insert_id+'">'+question+'</td></tr>';
                            $('#question_list').append(new_row);
                        }
                        $('#quest_id').val(0);
                        $('#question_area').val('');
                        $('.an_answer').each(function(data) {
                            $(this).val('');
                        });
                        $('.correct').each(function(data) {
                            $(this).prop('checked', false);
                        });
                    }, 'json'
                );
            } else {
                if (unit<1) {
                    alert('This question is for unit: '+unit);
                }
                if (!correct) {
                    alert('Please choose a correct answer.');
                }
            }
        });

        $('#reset').click(function(data) {
            $('#quest_id').val(0);
            $('textarea').val('');
        });
    });

    $(document).on('click','.question_item',function() {
        var question_id = $(this).attr('question_id');
        var unit = $(this).attr('unit');
        var question = $('#quest_'+question_id).text();
        $('.an_answer').each(function() {
            $(this).val('');
        });
        $('.correct').each(function() {
            $(this).prop('checked',false);
        });
        $('#unit').val(unit);
        $('#quest_id').val(question_id);
        $('#question_area').val(question);
        $.post('/lesson/ajax/getAnswers',
            {
                'question_id': question_id
            },
            function(data) {
                var i=1;
                for (var key in data) {
                    $('#answer'+i).val(unescape(data[key].answer));
                    $('#answer_id'+i).val(data[key].answer_id);
                    if (data[key].correct == 1) {
                        $('#correct'+i).prop('checked',true);
                    }
                    i++; 
                }
            },'json'
        );
    });
</script>
