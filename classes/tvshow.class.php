<?php
    class TVshow {
        protected $Conn;
        public function __construct($Conn){
            $this->Conn = $Conn;
        }

        public function getAllTVshows() {
            $query = "SELECT * FROM tv_shows";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTVshow($tv_show_id) {
            $query = "SELECT * FROM tv_shows WHERE tv_show_id = :tv_show_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "tv_show_id" => $tv_show_id
            ]);
            $tv_show_data = $stmt->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM tv_show_images WHERE tv_show_id = :tv_show_id";
            $stmt = $this->Conn->prepare($query);
            $stmt->execute([
                "tv_show_id" => $tv_show_id
            ]);
            $tv_show_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $tv_show_data;

        }
    }
