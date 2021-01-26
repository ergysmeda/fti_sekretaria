<head>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<?php // Example 07: login.php
require_once 'header.php';
$error = $user = $pass = "";

if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $pass = passwordify($pass);
    if ($user == "" || $pass == "")
        $error = 'Nuk jane futur gjithe te dhenat';
    else {
        $result = queryMysql("SELECT user_email, user_password FROM user WHERE user_email='$user' AND user_password='$pass'");
        $rowCount = $result->num_rows;
        if ($rowCount == 0) {
            echo "Invalid login attempt";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            die("<div class='center'>Sapo jeni futu nr faqe. Ju lutem
             <a data-transition='slide'
               href='profili.php?view=$user&r=$randstr'>klikoni ketu</a>
               te vazhdoni.</div></div></body></html>");
        }
    }
}
?>
<div class="login-box">
    <form method='post' action='login.php?r=$randstr'>
        <h2>Login</h2>
        <div class="textbox">
            <input type="email" name="user" placeholder="Email" required="userid">
        </div>

        <div class="textbox">
            <input type="password" name="pass" placeholder="Password" required="password">
        </div>
        <div>
            <input class="btn" type="submit" name="submit" value="Sign In">
        </div>


    </form>

</div>

</body>
</html>