<?php
    $Movie = new Movie($Conn);
    $movie_data = $Movie->getMovie($_GET['id']);
?>

<div class="container">
    <h1 class="mb-4 pb-2"><?php echo $movie_data['movie_name']; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php if($movie_data['images']) {?>
            <div class="row">
                <?php foreach($movie_data['images'] as $image) {?>
                <div class="col-md-4">
                    <div class="movie-image mb-4" style="background-image: url('./movie-images/<?php echo $image['movie_image']; ?>');">
                        <a href="./movie-images/<?php echo $image['movie_image']; ?>" data-lightbox="movie-imgs"></></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

        <div class="col-md-6">
            <p><?php echo $movie_data['movie_description']; ?></p>
            <br>
            <p>Click on any image to see a larger copy.</p>
            <br>

            <ul class="movie-features">
                <li>
                    <?php
                        $Like = new Like($Conn);
                        $count_likes = $Like->calculateLikes($_GET['id']);
                    ?>
                    <i class="far fa-thumbs-up"></i> <?php echo $count_likes; ?> Likes
                </li>
                <li><i class="fas fa-tags"></i> <?php echo $movie_data['movie_tags']; ?></li>
            </ul>

            <?php
                //favourite button
                $Favourite = new Favourite($Conn);
                $is_fav = $Favourite->isFavourite($_GET['id']);

                if($is_fav) {
                ?>
                    <button id="removeFav" type="button" class="btn btn-primary mb-3" data-projectid="<?php echo $_GET['id']; ?>">Remove from favourites</button>
                <?php
                }else{
                    if($_SESSION['user_data']) {
                ?>
                    <button id="addFav" type="button" class="btn btn-primary mb-3" data-projectid="<?php echo $_GET['id']; ?>">  Add to favourites  </button>
                <?php
                    }else{
                        ?>
                            <button type="button" class="btn btn-primary mb-3" >  Add to favourites  </button>
                        <?php
                    }
                }


                //like button
                $Like = new Like($Conn);
                $is_liked = $Like->isLiked($_GET['id']);

                if($is_liked) {
                ?>
                    <button id="removeLike" type="button" class="btn btn-primary mb-3" data-movieid="<?php echo $_GET['id']; ?>">Remove like</button>
                <?php
                }else{
                    if($_SESSION['user_data']) {
                ?>
                    <button id="addLike" type="button" class="btn btn-primary mb-3" data-movieid="<?php echo $_GET['id']; ?>"> Add Like  </button>
                <?php
                    }else{
                        ?>
                            <button type="button" class="btn btn-primary mb-3" > Add Like  </button>
                        <?php
                    }
                }
            ?>

        </div>
    </div>


</div>
