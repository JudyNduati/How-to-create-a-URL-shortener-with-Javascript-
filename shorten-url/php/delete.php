<?php
    include "connect.php";
    if(isset($_GET['id'])){
        $delete_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = mysqli_query($conn, "DELETE FROM url WHERE short_url = '{$delete_id}'");
        if($sql){
            header("Location: ../");
        }else{
            header("Location: ../");
        }
    }elseif(isset($_GET['delete'])){
        $sql3 = mysqli_query($conn, "DELETE FROM url");
        if($sql3){
            header("Location: ../");
        }else{
            header("Location: ../");
        }
    }else{
        header("Location: ../");
    }
?>