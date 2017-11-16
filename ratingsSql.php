<?php


    $rating = new ratings($_POST['widget_id'],$_POST['uid']);

    //$rating = new ratings(1,456);
    //$rating->vote();

    isset($_POST['fetch']) ? $rating->get_ratings() : $rating->vote();






class ratings {


    private $widget_id;
    private $uid;


function __construct($wid,$user_uid) {
    include 'includes/dbh.inc.php';

    $this->widget_id = $wid;
    $user_uid=mysqli_real_escape_string($conn, $user_uid);
    $sql = "SELECT user_id FROM `users` WHERE user_uid = '$user_uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    $this->uid=$row['user_id'];
    #$all = file_get_contents($this->data_file);

    #if($all) {
        #$this->data = unserialize($all);
    #}
}
public function get_ratings() {
    include 'includes/dbh.inc.php';
    $sql = "SELECT score_a FROM user_item WHERE user_id = $this->uid AND item_id=$this->widget_id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    //echo $resultCheck;
    $row=mysqli_fetch_array($result);

    $vote=round($row['score_a']);
    echo $vote;

}
public function vote() {
    include 'includes/dbh.inc.php';
    #echo $this->widget_id;
    # Get the value of the vote
    preg_match('/star_([1-5]{1})/', $_POST['clicked_on'], $match);
    //preg_match('/star_([1-5]{1})/', 'star_5 ratings_stars', $match);
    $vote = $match[1];

    $sql = "INSERT INTO user_item (user_id,item_id, score_a) VALUES ($this->uid,$this->widget_id,$vote)";
    //echo $sql;
    mysqli_query($conn, $sql);
    #echo $vote;
    $this->get_ratings();
}

# ---
# end class
}
?>
