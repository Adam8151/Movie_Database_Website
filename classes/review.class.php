<?php
class Review {
  protected $Conn;

  public function __construct($Conn){
    $this->Conn = $Conn;
  }
  public function createReview($review_data) {
    $query = "INSERT INTO reviews (user_id, movie_id, review_rating) VALUES (:user_id, :movie_id, :review_rating) OR (user_id, tv_show_id, review_rating) VALUES (:user_id, :tv_show_id, :review_rating)";
    $stmt = $this->Conn->prepare($query);
    return $stmt->execute([
      'user_id' => $_SESSION['user_data']['user_id'],
      'movie_id' => $review_data['movie_id'] or 'tv_show_id' => $review_data['tv_show_id'],
      'review_rating' => $review_data['review_rating']
    ]);
  }

  public function calculateRating($movie_id, $tvshow_id) {
    $query = "SELECT AVG(review_rating) AS avg_rating FROM reviews WHERE movie_id = :movie_id OR tv_show_id = :tv_show_id";
    $stmt = $this->Conn->prepare($query);
    $stmt ->execute([
      'movie_id' => $movie_id OR 'tv_show_id' => $tv_show_id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
