<?php
    class Movie {
        protected $Conn;
        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function getAllMovies() {
            $query = "SELECT * FROM movies";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getMovie($movie_id) {
            $query = "SELECT * FROM movies WHERE movie_id = :movie_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "movie_id" => $movie_id
            ]);
            $movie_data = $stmt->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM movie_images WHERE movie_id = :movie_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "movie_id" => $movie_id
            ]);
            $movie_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $movie_data;

        }
    }
