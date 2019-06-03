<?php
require_once 'util.php';
require_once 'dbconfig.php';

$username = "";
$password = "";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die("Fatal error");

if (isset($_POST['username']) && isset($_POST['password']))
{
    $username = mysql_entities_fix_string($conn, $_POST['username']);
    $password = mysql_entities_fix_string($conn, $_POST['password']);
   
    $user_query = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($user_query);
    if (!$result) die ("Invalid username");
    elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if (password_verify($password, $row["password"]))
        {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
        }
        else
        {
            echo die("Invalid password");
        }
        $result->close();
    }
    else
    {
        die ("User not found");
    }

    $conn->close();
    
}


?>

<form action="login.php" class="px-4 py-3" method="post">
    <div class="form-group row">
        <h5>Login</h5>
        <input class="form-control form-control-sm" type="text" placeholder="Username" name="username" required>
        <div class="invalid-feedback">Please enter your username</div>
    </div>
    <div class="form-group row">
        <input class="form-control form-control-sm" type="password" placeholder="Password" name="password" required>
        <div class="invalid-feedback">Please enter your password</div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-sm btn-success">Login</button>
    </div>
</form>