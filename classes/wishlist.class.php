<?php
    class Wished {
        protected $Conn;

        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function hasWished($movie_id, $tv_show_id){
            $query = "SELECT * FROM wish_list WHERE user_id = :user_id AND movie_id = :movie_id OR tv_show_id = :tv_show_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id'],
                "movie_id" => $movie_id,
                "tv_show_id" => $tv_show_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function toggleWished($movie_id, $tv_show_id){
            // Check if project is already favourite
            $has_wished = $this->hasWished($movie_id, $tv_show_id);

            if($has_wished) {
                // Is already favourite - so remove.
                $query = "DELETE FROM wish_list WHERE wish_list_id = :wish_list_id";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "wish_list_id" => $has_wished['wish_list_id']
                ]);
                return false; // Return false for "removed"
            }else{
                // Is not favourite - so add
                $query = "INSERT INTO wish_list (user_id, movie_id, tv_show_id) VALUES (:user_id, :movie_id, :tv_show_id)";
                $stmt = $this->Conn->prepare($query);
                $stmt->execute([
                    "user_id" => $_SESSION['user_data']['user_id'],
                    "movie_id" => $movie_id,
                    "tvshow_id" => $tvshow_id
                ]);
                return true; // Return false for "added"
            }
        }

        public function getAllWishedMoviesForUser(){
            $query = "SELECT * FROM wish_list LEFT JOIN movies ON wish_list.movie_id = movies.movie_id WHERE wish_list.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id']
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllWishedTVShowsForUser(){
            $query = "SELECT * FROM wish_list LEFT JOIN tv_shows ON wish_list.tvshow_id = tv_shows.tv_show_id WHERE wish_list.user_id = :user_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "user_id" => $_SESSION['user_data']['user_id']
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
