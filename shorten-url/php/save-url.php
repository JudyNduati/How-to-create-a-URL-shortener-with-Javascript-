<?php
    include "connect.php";
    $og_url = mysqli_real_escape_string($conn, $_POST['short_url']);
    $short_url = str_replace(' ', '', $og_url);
    $hidden_url = mysqli_real_escape_string($conn, $_POST['hidden_url']);

    if(!empty($short_url)){
        if(preg_match("/\//i", $short_url)){
            $explodeURL = explode('/', $short_url);
            $shortURL = end($explodeURL);
            if($shortURL != ""){
                $sql = mysqli_query($conn, "SELECT short_url FROM url WHERE short_url = '{$shortURL}' && short_url != '{$hidden_url}'");
                if(mysqli_num_rows($sql) == 0){
                    $sql2 = mysqli_query($conn, "UPDATE url SET short_url = '{$shortURL}' WHERE short_url = '{$hidden_url}'");
                    if($sql2){
                        echo "success";
                    }else{
                        echo "Error - Failed to update link!";
                    }
                }else{
                    echo "The short url that you've entered already exist. Please enter another one!";
                }
            }else{
                echo "Required - You have to enter short url!";
            }
        }else{
            echo "Invalid URL - You can't edit domain name!";
        }
    }else{
        echo "Error- You have to enter short url!";
    }
?>