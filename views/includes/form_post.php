<link rel="stylesheet" href="assets/css/form_post.css">
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
            <label for="file-upload" class="subir">
                <i class="fas fa-cloud-upload-alt"></i>
                <i class="fa fa-upload" aria-hidden="true"></i>
            </label>
            <input id="file-upload" onchange='cambiar()' type="file" style='display: none;' />
            <input type="submit" value="Post">
        </div>
    </form>
</div>