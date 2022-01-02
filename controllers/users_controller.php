<?php

class UsersController
{
    function index()
    {
        include_once 'views/users/index.php';
    }
    function create()
    {
        include_once 'views/users/create.php';
    }
    function edit()
    {
        include_once 'views/users/edit.php';
    }
    function delete()
    {
    }
}
