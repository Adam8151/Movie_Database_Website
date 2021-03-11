<?php
    $TVshow = new TVshow($Conn);
    $tv_show_data = $TVshow->getTVshow($_GET['id']);
?>

<div class="container">
    <h1 class="mb-4 pb-2"><?php echo $tv_show_data['project_name']; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php if($tv_show_data['images']) {?>
            <div class="row">
                <?php foreach($tv_show_data['images'] as $image) {?>
                <div class="col-md-4">
                    <div class="tvshow-image mb-4" style="background-image: url('./tvshow-images/<?php echo $image['tvshow_image']; ?>');">
                        <a href="./tvshow-images/<?php echo $image['tvshow_image']; ?>" data-lightbox="tvshow-imgs"></></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

        <div class="col-md-6">
            <p><?php echo $tv_show_data['tvshow_descrip']; ?></p>
            <br>
            <p>Click on any image to see a larger copy.</p>
            <br>

            <ul class="project-features">
                <li><i class=""></i> <?php echo $tv_show_data['tvshow_tags']; ?></li>
            </ul>

            <?php
                //watched button
                $Watched = new Watched($Conn);
                $has_watched = $Watched->hasWatched($_GET['id']);

                if($has_watched) {
                ?>
                    <button id="removeWatched" type="button" class="btn btn-primary mb-3" data-tvshowid="<?php echo $_GET['id']; ?>">Remove from watched list</button>
                <?php
                }else{
                    if($_SESSION['user_data']) {
                ?>
                    <button id="addwatched" type="button" class="btn btn-primary mb-3" data-tvshowid="<?php echo $_GET['id']; ?>">  Add to watched list  </button>
                <?php
                    }else{
                        ?>
                            <button type="button" class="btn btn-primary mb-3" >  Add to watched list  </button>
                        <?php
                    }
                }


                //wish button
                $Wish = new Wished($Conn);
                $has_wished = $Wish->hasLiked($_GET['id']);

                if($has_wished) {
                ?>
                    <button id="removeWish" type="button" class="btn btn-primary mb-3" data-tvshowid="<?php echo $_GET['id']; ?>">Remove from wish list</button>
                <?php
                }else{
                    if($_SESSION['user_data']) {
                ?>
                    <button id="addWish" type="button" class="btn btn-primary mb-3" data-tvshowid="<?php echo $_GET['id']; ?>"> Add to wish list </button>
                <?php
                    }else{
                        ?>
                            <button type="button" class="btn btn-primary mb-3" > Add Wish  </button>
                        <?php
                    }
                }
            ?>

        </div>
    </div>


</div>
