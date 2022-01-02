<?php
require_once 'config/Connection.php';
class PagesController extends Connection
{
    function index()
    {
        $conn = new Connection;
        $conn->connect();
        include_once 'views/pages/index.php';
    }
    function error()
    {
        include_once 'views/pages/error.php';
    }
    function login()
    {
        include_once 'views/pages/login.php';
    }
}
