<!DOCTYPE html>
<html>
  <head>
      <title>Reviews on must see TV Shows and Movies - The Movie Review</title>

      <link rel="shortcut icon" type="image/jpg" href="Favicon_Image_Location"/>

      <link rel='icon' href='favicon.ico' type='image/x-icon'/ >

      <meta charset="utf-8">
      <meta name="title" content="Reviews on must see TV Shows and Movies - The Movie Review">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="./css/styles.css">

      <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
      <!--<script src="https://kit.fontawesome.com/08a953774e.js" crossorigin="anonymous"></script>-->

  </head>
  <body id="page-<?php echo $page; ?>">
    <header>
      <!--<div class="page-header-top text-center text-md-left container">
        <a href="index.php?p=home"><img src="./images/logo.jpg" alt="TheMovieReview" /></a>
      </div>-->
      <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">

          <a href="index.php?p=home"><img src="./images/logo.png" alt="TheMovieReview" height="100" width="100"/></a>
          <button class="navbar-toggler" tpye="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php?p=home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?p=movies">Movies</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?p=tvshows">TV Shows</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?p=contactus">Contact Us</a>
                </li>
                <?php

                if($_SESSION['is_logged_in']) {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?p=account">My Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?p=logout">Logout</a>
                    </li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?p=login">Login / Register</a>
                    </li>
                    <?php
                }
                ?>
              </ul>
               <form action="search.html" method="get" class="form-inline my-2 my-lg-0">
                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
               </form>
            </div>
        </div>
      </nav>
    </header>
