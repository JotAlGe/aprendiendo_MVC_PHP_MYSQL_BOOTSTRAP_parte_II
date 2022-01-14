<?php
if (!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['name'])) {
    header("Location: ?controller=pages&action=login");
    exit;
}


require_once 'views/includes/nav.php';
require_once 'views/includes/form_post.php';

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <?php
        for ($i = 0; $i < count($post_result); $i++) { ?>


            <div class="col-md-8 mx-auto">
                <div class="media g-mb-30 media-comment">
                    <a href="?controller=users&action=index&id=<?php echo $post_result[$i]['id_user']; ?>">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="assets/imgs/users/<?php echo !empty($post_result[$i]['photo_user']) ? $post_result[$i]['photo_user'] : 'fulanito.png'; ?>" alt="Image Description">
                    </a>
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="g-mb-15">

                                    <a href="?controller=users&action=index&id=<?php echo $post_result[$i]['id_user']; ?>">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php echo $post_result[$i]['nick_user']; ?></h5>
                                    </a>
                                    <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo $post_result[$i]['date_post']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-1">

                                <!-- edit button -->
                                <?php
                                if ($_SESSION['id'] == $post_result[$i]['id_user']) {
                                ?>
                                    <a href="?controller=pages&action=edit&id_post=<?php echo $post_result[$i]['id_post']; ?>">
                                        <i class="fas fa-pencil-alt text-primary"></i>
                                    </a>
                                <?php
                                }
                                ?>
                                <!--  -->
                            </div>


                        </div>
                        <p><?php echo $post_result[$i]['desc_post']; ?></p>
                        <?php if ($post_result[$i]['photo_post'] != NULL) { ?>
                            <img src="assets/imgs/posts/<?php echo $post_result[$i]['photo_post']; ?>" class="img-fluid" alt="">
                        <?php } ?>
                        <ul class="list-inline d-sm-flex my-0">
                            <?php
                            $pos = new Post;
                            $likes = $pos->get_like_by_post($post_result[$i]['id_post']);

                            ?>
                            <li class="list-inline-item g-mr-20">
                                <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="?controller=pages&action=likes&id_post=<?php echo $post_result[$i]['id_post']; ?>">
                                    <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3 text-secondary"></i>
                                </a>

                                <?php
                                echo count($likes);
                                ?>
                            </li>

                            <li class="list-inline-item ml-auto">
                                <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                    Reply
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>