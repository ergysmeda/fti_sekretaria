<?php // Example 12: logout.php
require_once 'header.php';

if (isset($_SESSION['user']))
{
    destroySession();
    echo "<br><div class='center'>Ju keni dal. Ju lutem
         <a data-transition='slide'
           href='login.php?r=$randstr'>kliko ketu</a>
           te rifreskoni faqen.</div>";
}
else echo "<div class='center'>Nuk dilni dot sepse s'keni hyre akoma.</div>";
?>
</div>
</body>
</html>
