<?php include 'head.html'; ?>

<?php
require_once 'dbconfig.php';
require_once 'util.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connection_error) die('<div class="alert alert-danger">ERROR Cannot connect to database</div>');
if (isset($_POST["username"]) && 
    isset($_POST["password"]) && 
    isset($_POST["email"]))
{

    $username = mysql_entities_fix_string($conn, $_POST["username"]);
    $password = mysql_entities_fix_string($conn, $_POST["password"]);
    $email = mysql_entities_fix_string($conn, $_POST["email"]);

    $query = <<<_END
SELECT * FROM user WHERE username='$username'
_END;
    echo $email;
    $result = $conn->query($query);

    if (!$result) die('<div class="alert alert-danger">ERROR Invalid select database operation</div>');
    if ($result->num_rows) echo "<div>Username already exists. </div>";
    else
    {
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = <<<_END
        INSERT INTO user (username, password, email)
        VALUES ('$username', '$pw_hash', '$email')
_END;
        echo $insert_query;
        $insert_result =  $conn->query($insert_query);
        if (!$insert_result) die('<div class="alert alert-danger">ERROR Invalid insert database operation</div>');
        echo "<div> Register succeeded</div>";
        // unset($_POST);
        $conn->close();
        header('Location: index.php');
        exit; // rememer to include exit 
    }
    $conn->close();
}

?>

<body>
    <?php include 'layouts/navbar.php';?>
    <div class="container" style="height: 100vh;">
    <form id="register_form" action="./register.php" method="post" novalidate>
        <h3 style="text-align: center; margin: 20px">Registration Form</h3>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">
                <span class="float-right">Username</span>
            </label>
            <div class="col-sm-10">
                <input id="un_input" type="text" class="form-control" name="username" placeholder="Username" required>
                <div id="un_feedback"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">
                <span class="float-right">Password</span>
            </label>
            <div class="col-sm-10">
                <input id="pw_input" type="password" class="form-control" name="password" placeholder="Password" required>
                <div id="pw_feedback"></div>
            </div>
            
        </div>
        <div class="form-group row">
            <label for="confirm_password" class="col-md-2 col-form-label">
                <span class="float-right">Retype password</span>
            </label>
            <div class="col-md-10">
                <input id="rtpw_input" type="password" class="form-control" name="confirm_password" placeholder="Retype Password" required>
                <div id="rtpw_feedback"></div>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">
                <span class="float-right">Email</span>
            </label>
            <div class="col-sm-10">
                <input id="email_input" type="email" class="form-control" name="email" placeholder="password" required>
                <div id="email_feedback"></div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-6-sm">
                <input type="submit" class="form-control btn btn-success w-100 d-block" value="Register">
            </div>
            <div class="col-6-sm">
                <input type="button" class="btn btn-light w-100" value="Cancel" onclick="location.href('index.php')"> 
            </div>
        </div>
    </form>
    </div>
    <?php include 'layouts/footer.html';?>
</body>
<script>
(function() {
    'use strict';
    $(document).ready(function() {
        console.log("hello");
        // live validation -> I think this one is pretty cool !
        // username
        $('#un_input').keyup(function(e) {
            var temp = $(this).val();
            // console.log(temp.length);
            if (temp.length < 8 || temp.length > 40) {
                $("#un_input").removeClass("is-valid");
                $("#un_input").addClass("is-invalid");
                $('#un_feedback').text("Username's length should be between 8 and 40 characters");
                $('#un_feedback').addClass('invalid-feedback');
                $("#un_feedback").addClass("d-block");
            } else {
                $("#un_input").removeClass("is-invalid");
                $("#un_input").addClass("is-valid");
                $('#un_feedback').text("Username valid");
                $('#un_feedback').removeClass('invalid-feedback');
                $('#un_feedback').addClass('valid-feedback');
                $("#un_feedback").addClass("d-block");
            }
        });
        // password

        $('#pw_input').change(function() {
            // password should be at least 
            var temp = $(this).val();
            // if (temp.length < 10)
            var input = $('#pw_input');
            var feedback = $('#pw_feedback');
            if (temp.length < 3 || temp.length > 60) {
                if (input.hasClass('is-valid')) input.removeClass('is-valid');
                if (!input.hasClass('is-invalid')) input.addClass('is-invalid');
                feedback.text("Password's length should be at least 8 characters");
                feedback.removeClass('valid-feedback');
                feedback.addClass('invalid-feedback');
            } else {
                if (input.hasClass('is-invalid')) input.removeClass('is-invalid');
                input.addClass('is-valid');
                feedback.text('Password valid');
                feedback.removeClass('invalid-feedback');
                feedback.addClass('valid-feedback');
            }
        });

        // retype password
        $('#rtpw_input').change(function() {
            var temp = $(this).val();
            var input = $(this);
            var feedback = $('#rtpw_feedback');
            if (temp == $('#pw_input').val()) {
                if (input.hasClass('is-invalid')) input.removeClass('is-invalid');
                input.addClass('is-valid');
                feedback.text('Retype password valid');
                feedback.removeClass('invalid-feedback');
                feedback.addClass('valid-feedback');
            } else {
                input.addClass('is-invalid');
                input.removeClass('is-valid');
                feedback.text('Retype password does not match');
                feedback.removeClass('valid-feedback');
                feedback.addClass('invalid-feedback');
            }
        });

        // email
        $('#email_input').change(function() {
            var emRegExp = /^[a-zA-Z0-9_.]+\@[a-z-A-Z0-9]+(.[a-zA-Z0-9]+)+$/;
            var temp = $(this).val();
            if (emRegExp.test(temp)) {
                $(this).addClass('is-valid');
                $(this).removeClass('is-invalid');
                $('#email_feedback').text('Email is valid');
                $('#email_feedback').addClass('valid-feedback');
                $('#email_feedback').removeClass('invalid-feedback');
            } else {
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
                $('#email_feedback').text('Email is invalid');
                $('#email_feedback').addClass('invalid-feedback');
                $('#email_feedback').removeClass('valid-feedback');
            }
        });


        $('#register_form').submit(function(e) {
            var username = $('#un_input');
            var password = $('#pw_input');
            var rtpw = $('#rtpw_input');
            var email = $('#email_input');
            if (username.hasClass('is-invalid') || password.hasClass('is-invalid') ||
                rtpw.hasClass('is-invalid') || email.hasClass('is-invalid')) {
                e.preventDefault();
            }
        });

    });
})();
</script>
</html>

