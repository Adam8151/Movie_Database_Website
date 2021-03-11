<div class="container">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>Welcome to your account. From here you can view the movies and TV shows added to your watched list and wish list.</p>

    <h2>My Watched List</h2>
    <ul class="user-watched">
        <?php
            $Watched = new Watched($Conn);
            $user_watched = $Watched->getAllWatchedMoviesForUser() AND getAllWatchedTVShowsForUser();
            if($user_watched) {
                foreach($user_watched as $watched) {
                    echo '<li><a style=color:#0066cc href="index.php?p=movie&id='.$fav['movie_id'].'">'.$fav['movie_name'].'</a></li>' OR '<li><a style=color:#0066cc href="index.php?p=tvshow&id='.$fav['tv_show_id'].'">'.$fav['tv_show_name'].'</a></li>';
                }
            }
        ?>
    </ul>

    <h2>My Wish List</h2>
    <ul class="user-wish">
        <?php
            $Wished = new Wished($Conn);
            $user_wished = $Wished->getAllWishedMoviesForUser() AND getAllWishedTVShowsForUser();
            if($user_wish) {
                foreach($user_wish as $Wished) {
                    echo '<li><a style=color:#0066cc href="index.php?p=movie&id='.$fav['movie_id'].'">'.$fav['movie_name'].'</a></li>' OR '<li><a style=color:#0066cc href="index.php?p=tvshow&id='.$fav['tv_show_id'].'">'.$fav['tv_show_name'].'</a></li>';
                }
            }
        ?>
    </ul>
</div>
