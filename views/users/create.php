<div class="registration-form">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="lastname" name="lastname" placeholder="Last name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="nickname" name="nickname" placeholder="Nick name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="pass" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="file" class="form-control item" id="photo" name="photo">
        </div>

        <div class="form-group">
            <label for="birth-date">Birthday date</label>
            <input type="date" class="form-control item" id="birth-date" name="birthday" placeholder="Birth Date">
        </div>
        <?php
        if (!empty($message)) :
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?> </div>
        <?php endif; ?>

        <?php
        if (!empty($messageOk)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $messageOk; ?> </div>
        <?php
        }
        ?>
        <div class="form-group">
            <button type="submit" name="btn-create" class="btn btn-block create-account">Create Account</button>
        </div>
    </form>
    <div class="social-media">
        <h5><span class="forgot-pass"><a class="text-success" href="?controller=pages&action=login">Iniciar Sesión</a></span>
        </h5>
        <div class="social-icons">
            <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
            <a href="#"><i class="icon-social-google" title="Google"></i></a>
            <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
        </div>
    </div>
</div>