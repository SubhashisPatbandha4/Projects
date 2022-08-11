<?php
session_start();
if (isset($_SESSION['myopinion_userid'])) {
    $_SESSION['myopinion_userid'] = null;
    unset($_SESSION['myopinion_userid']);
}

header("Location: index.php");
die;
