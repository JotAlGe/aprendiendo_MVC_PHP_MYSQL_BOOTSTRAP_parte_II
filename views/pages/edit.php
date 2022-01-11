<div class="container">
    <div class="jumbotron">

        <div class="card">
            <div class="card-header">
                <h1 class="display-5 text-center">Editar post</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['post'][0]['id_post'] ?>">
                            <div class="form-group">
                                <textarea name="description" id="" style=" width: 100%; max-height: 200px;" value=""><?php echo $_SESSION['post'][0]['desc_post'] ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" name="update">Actualizar post</button>
                            <a name="" id="" class="btn btn-danger" href="javascript:history.go(-1)" role="button">Cancelar</a>
                        </form>
                        <?php
                        if (!empty($_SESSION['message'])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?php echo $_SESSION['message']; ?></strong>
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