<?php
  $TVshow = new TVshow($Conn);
  $tvshows = $TVshow->getAllTVshows();
  ?>

<div class="container">
  <h1 class="mb-4 pb-2">TV Show Reviews</h1>
  <p>Browse our reviewed TV shows below.</p>
  <div class="row">
    <?php foreach($tvshows as $tv_show) {?>
    <div class="col-md-3">
      <div class="tvshow-card">
        <div class="tvshow-card-image" style="background-image: url('./tv_show-images/<?php echo $tv_show['tv_show_image']; ?>')">
          <a href="index.php?p=tvshow&id=<?php echo $tv_show['tv_show_id']; ?>"></a>
        </div>
        <a href="index.php?p=tvshow&id=<?php echo $tv_show['tv_show_id']; ?>"><h3><?php echo $tv_show['tv_show_name']; ?></h3></a>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
