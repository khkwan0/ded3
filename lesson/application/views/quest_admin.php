<style>
    body { font-family: arial; }
    li {
        cursor: pointer;
        text-decoration: underline;
    }

    .issue_opt {
        border-style:solid;
        border-width:1px;
    }

    #preview {
        margin-top:30px;
    }
</style>
<div>
    <a href="/lesson/admin">Back</a>
</div>
<div>
    <div>
        <textarea id="lesson_text" rows="10" cols="100"></textarea>
    </div>
    <div>
        <label>Unit: </label><input id="unit" value="1" />
        <label>Section: </label><input id="section" value="a" />
        <label>Issue: </label><input id="issue" value="1" />
        <label>Slide: </label><input id="slide" value="1" />
    </div>
    <div>
        <button id="save">Save</button>
    </div>
</div>

<div id="preview">
    <div>
        <div>Units</div>
        <div>
            <ul>
                <?php foreach ($lessons as $unit=>$section):?>
                    <li class="unit_opt" unit="<?php echo $unit?>"><?php echo $unit?></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div>
        <div>Sections</div>
        <div>
            <ul id="sections_ul">
            </ul>
        </div>
    </div>

    <div>
        <div>Issues</div>
        <div>
            <ul id="issues_ul">
            </ul>
        </div>
    </div>

    <div>
        <div>Slides</div>
        <div>
            <ul id="slides_ul">
            </ul>
        </div>
    </div>
    
</div>

<script type="text/javascript" src="/lesson/assets/js/jquery.js"></script>
<script type="text/javascript" src="/lesson/assets/js/tinymce.js"></script>
<script type="text/javascript">

    function displaySlides(slides) {
        for (var key in slides) {
            $('#slides_ul').append('<li class="slides_opt" unit="'+slides[key].unit+'" section="'+slides[key].section+'" issue="'+slides[key].issue+'" slide="'+key+'">'+key+' <span style="text-decoration:none">'+slides[key].lesson+'</span></li>');
        }
    }

    function getSlides(section, unit, issue) {
        return $.ajax({
            type:"POST",
            url:"/lesson/ajax/getSlides",
            async:false,
            data:{
                'section':  section,
                'unit':     unit,
                'issue':    issue
            }
        }).responseText;
    }

    $(document).on('click', ".slides_opt", function() {
        var unit = $(this).attr('unit');
        var section = $(this).attr('section');
        var issue = $(this).attr('issue');
        var slide = $(this).attr('slide');

        $('#unit').val(unit);
        $('#section').val(section);
        $('#issue').val(issue);
        $('#slide').val(slide);
        $('#lesson_text').val(($(this).children('span').html()));
        tinyMCE.activeEditor.setContent(($(this).children('span').html()));
        });

    $(document).on('click', ".section_opt", function() {
        var unit = $(this).attr('unit');
        var section = $(this).attr('section');

        $.post('/lesson/ajax/getIssues',
            {
                'unit': unit,
                'section': section
            },
            function(data) {
                $('#issues_ul').empty();
                for (var key in data) {
                    $('#issues_ul').append('<li class="issues_opt" unit="'+unit+'" section="'+section+'" issue="'+key+'">'+key+'</li>');
                }
            },'json'
        );
    });

    $(document).on('click',".issues_opt", function() {
        var unit = $(this).attr('unit');
        var section = $(this).attr('section');
        var issue = $(this).attr('issue');

        $.post('/lesson/ajax/getSlides',
            {
                'unit': unit,
                'section': section,
                'issue': issue
            },
            function(data) {
                $('#slides_ul').empty();
                displaySlides($.parseJSON(getSlides(section,unit,issue)));
            },'json'
        );
    });

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea",
            plugins: [
                'image',
                'spellchecker',
                'textcolor'
            ],
            toolbar: 'undo redo | forecolor backcolor | styleselect | bold italic | alignleft aligncenter alignright | link image',
            height: 400,
            width: 1280 
        });
        $('.unit_opt').click(function() {
            var unit = $(this).attr('unit');
            $.post('/lesson/ajax/getSections',
                {
                    'unit': unit
                },
                function(data) {
                    $('#sections_ul').empty();
                    for (var key in data) {
                        $('#sections_ul').append('<li class="section_opt" unit="'+unit+'" section="'+key+'">'+key+'</li>');
                    }
                },'json'
            );
        });


        $('#save').click(function() {
            var lesson_text = tinyMCE.get('lesson_text').getContent();
            if (lesson_text.length) {
                var unit = $('#unit').val();
                var section = $('#section').val();
                var issue = $('#issue').val();
                var slide = $('#slide').val();
                $.post('/lesson/ajax/saveLesson',
                    {
                        'unit': unit,
                        'section': section,
                        'issue': issue,
                        'slide': slide,
                        'lesson_text': lesson_text
                    },
                    function(data) {
                        tinyMCE.activeEditor.setContent('');
                        $('#slides_ul').empty();
                        var current_slide = $('#slide').val();
                        $('#slide').val(++current_slide);
                        displaySlides($.parseJSON(getSlides(section,unit,issue)));
                    }
                ); 
            } 
        });
    });
</script>
