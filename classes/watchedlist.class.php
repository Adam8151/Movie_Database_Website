<?php
    class Watched {
        protected $Conn;

        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function hasWatched($movie_id, $tv_show_id){
            $query = "SELECT * FROM watched_list WHERE user_id = :user_id AND movie_id = :movie_id OR tv_show_id = :tv_show_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
                "movie_id" => $movie_id,
                "tv_show_id" => $tv_show_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function toggleWatched($movie_id, $tv_show_id){
            // Check if project is already favourite
            $has_watched = $this->hasWatched($movie_id, $tv_show_id);

            if($has_watched) {
                // Is already favourite - so remove.
                $query = "DELETE FROM watched_list WHERE watched_list_id = :watched_list_id";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "watched_list_id" => $has_watched['watched_list_id']
                ]);
                return false; // Return false for "removed"
            }else{
                // Is not favourite - so add
                $query = "INSERT INTO watched_list (user_id, movie_id, tv_show_id) VALUES (:user_id, :movie_id, :tv_show_id)";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_id" => $_SESSION['user_data']['user_id'],
                    "movie_id" => $movie_id,
                    "tv_show_id" => $tv_show_id
                ]);
                return true; // Return false for "added"
            }
        }

        public function getAllWatchedMoviesForUser(){
            $query = "SELECT * FROM watched_list LEFT JOIN movies ON watched_list.movie_id = movies.movie_id WHERE watched_list.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id']
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllWatchedTVShowsForUser(){
            $query = "SELECT * FROM watched_list LEFT JOIN tv_shows ON watched_list.tv_show_id = tv_shows.tv_show_id WHERE watched_list.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id']
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
