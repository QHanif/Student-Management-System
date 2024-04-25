<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: loginPage.html');
    exit();
} else {
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
}
?>