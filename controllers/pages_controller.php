<?php

require_once 'models/users.php';
class PagesController extends User
{
    /////////// index //////////////////////
    function index()
    {

        include_once 'views/pages/index.php';
    }
    /////////// ERROR //////////////////////
    function error()
    {
        include_once 'views/pages/error.php';
    }

    /////////// login //////////////////////
    function login()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $message = '';
        if (!empty($_POST['btn-login'])) {

            $logged = new User;
            $data = $logged->get_data_login($_POST['email'], $_POST['pass']);

            if (!empty($data)) {
                $_SESSION['id'] = $data['ID'];
                $_SESSION['lev'] = $data['LEV'];
                $_SESSION['name'] = $data['NAME'];
                $_SESSION['lastname'] = $data['LAST'];
                $_SESSION['nickname'] = $data['NICK'];
                $_SESSION['email'] = $data['EMAIL'];

                $_SESSION['photo'] = $data['PHOTO'];
                $_SESSION['data_register'] = $data['DATREG'];
                $_SESSION['birthday'] = $data['BIRTHDAY'];

                header('Location:?controller=pages&action=index');
                exit;
                /* echo '<pre>';
                print_r($_SESSION);
                echo '</pre>'; */
            } else {
                $message = '¡Datos incorrectos!';
            }
        }
        include_once 'views/pages/login.php';
    }

    /////////// logout //////////////////////
    function logout()
    {
        include_once 'views/pages/logout.php';
    }
}
