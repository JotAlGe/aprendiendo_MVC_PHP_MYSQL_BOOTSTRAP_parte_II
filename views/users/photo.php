<div class="container">
    <!-- nav -->
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
    <!-- end nav -->
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="mx-auto text-center">
                <img src="assets/imgs/posts/<?php echo $_SESSION['one_post'][0]['photo_post']; ?>" class="rounded" alt="...">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ps-lg-6 ps-xl-10 w-lg-90">
                <div class="mb-4">
                    <div class="main-title title-left"><?php echo $_SESSION['one_post'][0]['date_post']; ?><span class="line-left"></span></div>
                    <h2 class="w-90"><?php echo $_SESSION['one_post'][0]['name_user'] . ' ' . $_SESSION['one_post'][0]['lastname_user']; ?></h2>
                </div>
                <p class="mb-4">
                    <?php echo $_SESSION['one_post'][0]['desc_post']; ?>.
                </p>


                <!--  -->
            </div>
        </div>
    </div>



</div>
</div>
</div>
</div>