<?php
if (!isset($_SESSION)) {
    session_start();
}
session_destroy();
header("Location: ?controller=pages&action=login");
exit;
