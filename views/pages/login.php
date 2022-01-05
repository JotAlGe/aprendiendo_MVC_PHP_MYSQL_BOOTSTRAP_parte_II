<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 mx-auto">
                <div class="form-container">
                    <form method="POST" class="form-horizontal">
                        <h3 class="title">Login Form</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" type="password" name="pass" placeholder="Password">
                        </div>
                        <?php if (!empty($message)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $message; ?></div>
                        <?php endif; ?>
                        <input class="btn signin" type="submit" name="btn-login" value="Login" />
                        <!-- <span class="forgot-pass"><a href="#">Lost password?</a></span> -->
                        <span class="register"><a href="?controller=users&action=create">Register / Signup</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>