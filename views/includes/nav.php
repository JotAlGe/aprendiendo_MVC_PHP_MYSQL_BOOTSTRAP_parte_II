<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="?controller=users&action=index&id=<?php echo $_SESSION['id']; ?>">
        <img src="assets/imgs/users/<?php echo ($_SESSION['photo'] === null ? 'fulanito.png' : $_SESSION['photo']); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        <?php echo $_SESSION['nickname'] ?>
    </a>
    <?php if ($_SESSION['lev'] == 1) {
    ?>
        <a class="navbar-brand" href="?controller=users&action=users"><i class="fas fa-users"></i> Listado de usuarios</a>
    <?php
    } ?>

    <a class="navbar-brand" href="?controller=pages&action=logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sessión</a>
</nav>