<style>
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
<div id="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="background-color:rgba(0,0,0,0.5);padding-top:2%;padding-bottom:2%;color:#b09256">
            <table>
                <tr><td><label>Email: </label></td><td><input name="email" id="email" /></td></tr>
                <tr><td><label>Password: </label></td><td><input name="password" type="password" id="password" /></td>
                <tr><td><label>Confirm Password: </label></td><td><input type="password" id="password2" /></td>
            </table>
            <button id="do_register">Register</button>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div><a href="/lesson">Back to Login</a></div>
            <div>
               <p><h3>Note</h3></p>
               <p>By registering, you can take the lesson and quizzes on your own time.  You can continue on multiple devices as well as pause your lesson and continue at your convenience.  Your email and password is used only to identify where you left off in the lesson.  We do NOT and will NOT use your email for anything else.</p>
            </div>
            <div style="display:none" id="dup_msg">
                Duplicate email.  Please use a different one or <a href="/lesson">login</a>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#do_register').click(function(data) {
            var email   = $('#email').val();
            var pass    = $('#password').val();
            $.post('/lesson/ajax/register',
                {
                    'email' : email,
                    'pass'  : pass
                },
                function(data) {
                    if (data == '0') {
                        $('#dup_msg').show();
                    } else {
                        window.location = '/lesson/status';
                    }
                }
            );
        });
    });
</script>
