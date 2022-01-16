<?php
#echo '<pre>';
#print_r($_SESSION['users_list']);
#echo '</pre>';

?>
<!-- nav -->
<div class="row">
    <div class="col-lg-12">
        <div class="text-center">
            <ul class="col container-filter portfolioFilte list-unstyled mb-0" id="filter">
                <li><a class="categories active" data-filter="*" href="?controller=pages&action=index">INICIO</a></li>

            </ul>
        </div>
    </div>
</div>
<!-- end nav -->
<hr>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th><span>Usuario</span></th>
                                    <th><span>Fecha de registro</span></th>
                                    <th class="text-center"><span>Fecha de nacimiento</span></th>
                                    <th><span>Email</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($_SESSION['users_list']); $i++) {
                                ?>

                                    <tr>
                                        <td>
                                            <img src="assets/imgs/users/<?php echo (empty($_SESSION['users_list'][$i]['photo_user']) ? 'fulanito.png' : $_SESSION['users_list'][$i]['photo_user']); ?>" alt="">
                                            <a href="?controller=users&action=index&id=<?php echo $_SESSION['users_list'][$i]['id_user']; ?>" class="user-link"><?php echo $_SESSION['users_list'][$i]['name_user'] . ' ' . $_SESSION['users_list'][$i]['lastname_user']; ?></a>
                                            <span class="user-subhead"><?php echo $_SESSION['users_list'][$i]['nick_user']; ?></span>
                                        </td>
                                        <td><?php echo $_SESSION['users_list'][$i]['date_register']; ?></td>
                                        <td class="text-center">
                                            <span class="label label-default"><?php echo $_SESSION['users_list'][$i]['birthday']; ?></span>
                                        </td>
                                        <td>
                                            <a href="mailto:<?php echo $_SESSION['users_list'][$i]['email_user']; ?>"><?php echo $_SESSION['users_list'][$i]['email_user']; ?></a>
                                        </td>
                                        <td style="width: 20%;">
                                            <a href="?controller=users&action=index&id=<?php echo $_SESSION['users_list'][$i]['id_user']; ?>    " class="table-link text-warning">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>

                                            <?php if ($_SESSION['users_list'][$i]['cod_level'] != 1) { ?>
                                                <a onclick="if(confirm('¿Desea eliminar el este post?')){ return true;} else{return false;}" href="?controller=users&action=delete&id=<?php echo $_SESSION['users_list'][$i]['id_user']; ?>" class="table-link danger">
                                                    <span class="fa-stack">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>