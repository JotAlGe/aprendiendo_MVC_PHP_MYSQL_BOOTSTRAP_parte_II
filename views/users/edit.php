<?php
#echo '<pre>';
#print_r($_SESSION['user_edit']);
#echo '</pre>';
?>
<div class="container">
    <div class="jumbotron">

        <div class="card">
            <div class="card-header">
                <h1 class="display-5 text-center">Editar Usuario</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="post">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <input type="text" name="name" value="<?php echo $_SESSION['user_edit'][0]['name_user']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" value="<?php echo $_SESSION['user_edit'][0]['lastname_user']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nick" value="<?php echo $_SESSION['user_edit'][0]['nick_user']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" value="<?php echo $_SESSION['user_edit'][0]['email_user']; ?>">
                            </div>

                            <button type="submit" class="btn btn-primary" name="update_user">Actualizar a <?php echo $_SESSION['user_edit'][0]['name_user']; ?></button>
                            <a name="" id="" class="btn btn-danger" href="javascript:history.go(-1)" role="button">Cancelar</a>
                        </form>
                        <?php
                        if (!empty($_SESSION['message_user'])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $_SESSION['message_user']; ?></strong>
                            </div>

                            <script>
                                $(".alert").alert();
                            </script>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>