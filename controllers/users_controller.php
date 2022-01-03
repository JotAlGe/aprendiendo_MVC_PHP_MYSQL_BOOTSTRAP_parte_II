<?php
require_once 'models/users.php';

class UsersController
{
    function index()
    {
        include_once 'views/users/index.php';
    }
    function create()
    {
        if (isset($_POST['btn-create'])) {
            $conn = new User;
            $conn->createUser(2, $_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_FILES['photo']['name'], $_POST['birthday']);
            #print_r($_FILES['photo']['name']);
        }
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
