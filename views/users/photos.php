<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <ul class="col container-filter portfolioFilte list-unstyled mb-0" id="filter">
                        <li><a class="categories active" data-filter="*" href="?controller=pages&action=index">INICIO</a></li>
                        <li><a class="categories" data-filter=".branding" href="javascript:history.go(-1)">Volver </a></li>
                        <!-- <li><a class="categories" data-filter=".design">Design</a></li>
                        <li><a class="categories" data-filter=".photo">Photo</a></li>
                        <li><a class="categories" data-filter=".coffee">coffee</a></li> -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="port portfolio-masonry mt-4">
            <div class="portfolioContainer row photo">
                <?php
                if (count($galery) == 0) {
                ?>
                    <h1 class="mx-auto">Aún no hay publicaciones</h1>
                    <?php
                } else {
                    for ($i = 0; $i < count($galery); $i++) {
                    ?>

                        <div class="col-lg-4 p-4 ">
                            <div class="item-box">
                                <a class="mfp-image" href="https://via.placeholder.com/800x540/D3D3D3/000000" title="Project Name">
                                    <img class="item-container img-fluid" src="assets/imgs/posts/<?php echo $galery[$i]['photo_post']; ?>" alt="work-img">
                                    <div class="item-mask">
                                        <div class="item-caption">
                                            <p class="text-dark mb-0"><?php echo $galery[$i]['name_user'] . ' ' . $galery[$i]['lastname_user']; ?></p>
                                            <h6 class="text-dark mt-1 text-uppercase">"<?php echo $galery[$i]['desc_post']; ?>"</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php

                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>