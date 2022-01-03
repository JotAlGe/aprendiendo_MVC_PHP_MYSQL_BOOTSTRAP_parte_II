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
        $message = '';
        if (isset($_POST['btn-create'])) {
            $conn = new User;
            $message = $conn->validate_fields($_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_FILES['photo']['name'], $_POST['birthday']);
            if (empty($message)) {
                $registered = $conn->createUser(2, $_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_FILES['photo']['name'], $_POST['birthday']);
                $messageOk = '';
                if ($registered == true) $messageOk = 'Se ha registrado al usuario ' . $_POST['nickname'];
                else $messageOk = 'No se ha podido registrar a ' . $_POST['nickname'];
            }
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
