<?php
    include "connect.php";
    $original_url = mysqli_real_escape_string($conn, $_POST['original_url']);

    if(!empty($original_url) && filter_var($original_url, FILTER_VALIDATE_URL)){
        $ran_url = substr(md5(microtime()), rand(0, 26), 5);////generating a random number, 5 characters

        //checking that random generated url exists in the database or not
        $sql = mysqli_query($conn, "SELECT * FROM url WHERE short_url = '{$ran_url}'");
        if(mysqli_num_rows($sql) > 0){
            echo "Something went wrong. Please generate again!";
        }else{
            //insert typed url into the table with short url
            $sql2 = mysqli_query($conn, "INSERT INTO url (original_url, short_url, clicks) 
                                         VALUES ('{$original_url}', '{$ran_url}', '0')");
            if($sql2){
                $sql3 = mysqli_query($conn, "SELECT short_url FROM url WHERE short_url = '{$ran_url}'");
                if(mysqli_num_rows($sql3) > 0){
                    $short_url = mysqli_fetch_assoc($sql3);
                    echo $short_url['short_url'];
                }
            }
        }
    }else{
        echo "$original_url - This is not a valid URL!";
    }
?>