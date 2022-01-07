<?php
require_once 'models/users.php';

class UsersController
{
    function index()
    {
        #print_r($_GET['id']);
        $user = new User;
        $data_user = $user->get_data_user($_GET['id']);
        echo '<pre>';
        print_r($data_user);
        echo '</pre>';
        include_once 'views/users/index.php';
    }
    function create()
    {
        $message = '';
        if (isset($_POST['btn-create'])) {
            $dateTime = new DateTime();
            // rename image
            if (!empty($_FILES['photo']['name'])) {
                $photo_user = $dateTime->getTimestamp() . '_' . basename($_FILES['photo']['name']);
            } else {
                $photo_user = NULL;
            }

            $conn = new User;
            $message = $conn->validate_fields($_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_POST['birthday']);

            // move to directory
            move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/imgs/users/' . $photo_user);
            if (empty($message)) {
                $registered = $conn->createUser(2, $_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], $_POST['pass'], $photo_user, $_POST['birthday']);
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
