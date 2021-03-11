<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');


if($_SESSION['user_data']) {
    if($_POST['movie_id', 'tvshow_id']) {
        $Wished = new Wished($Conn);
        $toggle = $Wished->toggleWished($_POST['movie_id', 'tvshow_id']);
        if(toggle) {
            echo json_encode([
                "success" => true,
                "reason" => "Movie/TV show was added to the users wished list."
            ]);
        }else{
            echo json_encode([
                "success" => true,
                "reason" => "Movie/TV show was removed from the users wished list."
            ]);
        }
    }else{
        echo json_encode([
            "success" => false,
            "reason" => "Movie/TV show ID not provided."
        ]);
    }
}else{
    echo json_encode([
        "success" => false,
        "reason" => "User not logged in."
    ]);
}
