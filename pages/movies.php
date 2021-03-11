<?php
  $Movie = new Movie($Conn);
  $movies = $Movie->getAllMovies();
  ?>

<div class="container">
  <h1 class="mb-4 pb-2">Movie Reviews</h1>
  <p>Browse our reviewed movies below.</p>
  <div class="row">
    <?php foreach($movies as $movie) {?>
    <div class="col-md-3">
      <div class="movie-card">
        <div class="movie-card-image" style="background-image: url('./movie-images/<?php echo $movie['movie_image']; ?>')">
          <a href="index.php?p=movie&id=<?php echo $movie['movie_id']; ?>"></a>
        </div>
        <a href="index.php?p=movie&id=<?php echo $movie['movie_id']; ?>"><h3><?php echo $movie['movie_name']; ?></h3></a>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
