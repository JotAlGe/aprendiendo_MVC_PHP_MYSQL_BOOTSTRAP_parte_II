<link rel="stylesheet" href="assets/css/form_post.css">
<div class="form-container">
    <section class="data_user">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top rounded-circle img-fluid" width="20" height="80" src="assets/imgs/users/<?php echo is_null($_SESSION['photo']) ? 'fulanito.png' : $_SESSION['photo']; ?>" alt="Card image cap">
            </div>
        </div>
        <div class="card-footer"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lastname']; ?></div>
    </section>
    <form method="post" enctype="multipart/form-data">
        <div class="post">
            <textarea name="post" placeholder="<?php echo (empty($message) ? $_SESSION['name'] . ', cuentanos lo que quieras...' : $message); ?> " name="post"></textarea>
            <?php if (!empty($errorPost)) : ?>
                <small class="text-muted text-danger"><?php echo $errorPost; ?></small>
            <?php endif; ?>
        </div>

        <div class="button">
            <label for="file-upload" class="subir">
                <i class="fas fa-cloud-upload-alt"></i>
                <i class="fa fa-camera" aria-hidden="true"></i>
            </label>
            <input id="file-upload" type="file" style='display: none;' name="img-post" />
            <input type="submit" value="Post" name="btn-post">
        </div>
    </form>
</div>