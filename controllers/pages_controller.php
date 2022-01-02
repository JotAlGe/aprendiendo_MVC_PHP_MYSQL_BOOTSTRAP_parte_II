<?php
class PagesController
{
    function index()
    {
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
