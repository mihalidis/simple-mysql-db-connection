<?php
//
function check_login($db) {
   if(isset ($_SESSION['user_id'])) {
       $id = $_SESSION['user_id'];
       $query = $db->query("SELECT * FROM users WHERE user_id = '{$id}'");

       if($query) {
           $user_data = $query->fetch(PDO::FETCH_ASSOC);
           return $user_data;
       }
   } else {
       header("Location: login.php");
       die;
   }

}

// create random number

function random_num($length) {
    $text = "";
    if($length < 5) {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) {
        $text .= rand(0,9);
    }

    return $text;
}