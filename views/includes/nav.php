<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="assets/imgs/users/<?php echo ($_SESSION['photo'] == '' ? 'fulanito.png' : $_SESSION['photo']); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        <?php echo $_SESSION['nickname'] ?>
    </a>
    <a class="navbar-brand" href="?controller=pages&action=logout">Cerrar Sessión</a>
</nav>