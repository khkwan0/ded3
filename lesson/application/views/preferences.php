<div>
    <label>Choose preferred language</label>
    <input type="radio" name="lang" value="en" checked />English
    <input type="radio" name="lang" value="sp" />Spanish
</div>
<div>
    <button id="start">Get Started on the lesson!</button>
</div>
<script type="text/javascript" src="/assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var lang = '';
        $('input[type=radio][name=lang]').change(function() {
            if ($(this).val() == 'en') {
                lang = 'en';
            } else if ($(this).val() == 'sp') {
                lang = 'sp';
            }
            $.post('/ajax/preferenceChange',
                {
                'key': 'lang',
                'val': lang
                },
                function(data) {
                    
                }
            );
        });

        $('#start').click(function(data) {
            window.location = '/teach';
        });
    });
</script>
