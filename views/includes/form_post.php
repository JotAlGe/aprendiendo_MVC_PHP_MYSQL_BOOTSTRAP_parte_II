<div class="form-container">
    <section class="data_user">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top rounded-circle img-fluid" width="20" height="80" src="assets/imgs/users/<?php echo $_SESSION['photo']; ?>" alt="Card image cap">
            </div>
        </div>
        <div class="card-footer"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lastname']; ?></div>
    </section>
    <form method="post">
        <div class="post">
            <textarea name="post" placeholder="<?php echo $_SESSION['name'] ?>, cuentanos lo que quieras..."></textarea>
        </div>
        <div class="button">
            <input type="submit" value="Post">
        </div>
    </form>
</div>