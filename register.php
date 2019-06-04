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

    $query = <<<_END
SELECT * FROM user WHERE username='$username'
_END;
    echo $query;
    $result = $conn->query($query);

    if (!$result) die('<div class="alert alert-danger">ERROR Invalid database operation</div>');
    if ($result->num_rows) echo "<div>Username already exists. </div>";
    else
    {
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = <<<_END
        INSERT INTO user(username, password, email) value
        ('$username', '$pw_hash', '$email')
_END;

        $insert_result =  $conn->query($insert_query);
        if (!$insert_result) die('<div class="alert alert-danger">ERROR Invalid database operation</div>');
        echo "<div> Register succeeded</div>";
        header('Location: index.php');
    }
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
                <div id="un_valid_feedback" class="valid-feedback">Username valid</div>
                <div id="un_invalid_feedback" class="invalid-feedback">Username's length should be between 8 and 40 characters</div>
                <div id="un_feedback"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">
                <span class="float-right">Password</span>
            </label>
            <div class="col-sm-10">
                <input id="pw_input" type="password" class="form-control" name="password" placeholder="Password" required>
                <div id="pw_valid_feedback" class="valid-feedback">Password valid</div>
                <div id="pw_invalid_feedback" class="invalid-feedback">Password's length should be at least 8 characters</div>
            </div>
            
        </div>
        <div class="form-group row">
            <label for="confirm_password" class="col-md-2 col-form-label">
                <span class="float-right">Retype password</span>
            </label>
            <div class="col-md-10">
                <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password" required>
            </div>
            <div class="valid-feedback">Retype password valid</div>
            <div class="invalid-feedback">Retype password invalid</div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">
                <span class="float-right">Email</span>
            </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="password" required>
            </div>
            <div class="valid-feedback">Email valid</div>
            <div class="invalid-feedback">Email invalid</div>
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
                $("#un_invalid_feedback").addClass("d-block");
            } else {
                $("#un_input").removeClass("is-invalid");
                $("#un_input").addClass("is-valid");
                $("#un_invalid_feedback").removeClass("d-block");
            }
        });

        
        // $('#un_input').change(function(){
        //     // use change to validate regular expression
        //     var temp = $(this).val();
        //     var unRegEx = /^[a-zA-Z0-9\.\_]+$/;
        //     if (unRegEx.test(temp)) {
        //         $('#un_valid_feedback').addClass("d-block");
        //     } else {
        //         $('#un_valid_feedback').removeClass('d-block');
        //         $('#un_invalid_feedback').text("Username contains invalid characters");
        //         $('#un_invalid_feedback').addClass('d-block');
        //     }
        // });


        // password

        $('pw_input').change(function() {
            // password should be at least 
            var temp = $(this).val();
            // if (temp.length < 10)
        });

        // retype password





        // email




    });
})();
</script>
</html>

