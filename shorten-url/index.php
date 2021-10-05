<?php 
  include "php/connect.php";
  $new_url = "";
  if(isset($_GET)){
    foreach($_GET as $key=>$val){
      $u = mysqli_real_escape_string($conn, $key);
      $new_url = str_replace('/', '', $u);
    }
      $sql = mysqli_query($conn, "SELECT original_url FROM url WHERE short_url = '{$new_url}'");
      if(mysqli_num_rows($sql) > 0){
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE short_url = '{$new_url}'");
        if($sql2){
            $original_url = mysqli_fetch_assoc($sql);
            header("Location:".$original_url['original_url']);
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>URL Shortener in JavaScript</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <form action="#" autocomplete="off">
      <input type="text" spellcheck="false" name="original_url" placeholder="Enter or paste a long url" required>
      <i class="url-icon uil uil-link"></i>
      <button>Shorten</button>
    </form>
    <?php
      $sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");
      if(mysqli_num_rows($sql2) > 0){;
        ?>
          <div class="statistics">
            <?php
              $sql3 = mysqli_query($conn, "SELECT COUNT(*) FROM url");
              $res = mysqli_fetch_assoc($sql3);

              $sql4 = mysqli_query($conn, "SELECT clicks FROM url");
              $total = 0;
              while($count = mysqli_fetch_assoc($sql4)){
                $total = $count['clicks'] + $total;
              }
            ?>
            <span>Total Links: <span><?php echo end($res) ?></span> & Total Clicks: <span><?php echo $total ?></span></span>
            <a href="php/delete.php?delete=all">Clear All</a>
        </div>
        <div class="url-area">
          <div class="title">
            <li>Shorten URL</li>
            <li>Original URL</li>
            <li>Clicks</li>
            <li>Action</li>
          </div>
          <?php
            while($row = mysqli_fetch_assoc($sql2)){
              ?>
                <div class="data">
                <li>
                  <a href="<?php echo $domain.$row['short_url'] ?>" target="_blank">
                  <?php
                    if($domain.strlen($row['short_url']) > 50){
                      echo $domain.substr($row['short_url'], 0, 50) . '...';
                    }else{
                      echo $domain.$row['short_url'];
                    }
                  ?>
                  </a>
                </li> 
                <li>
                  <?php
                    if(strlen($row['original_url']) > 60){
                      echo substr($row['original_url'], 0, 60) . '...';
                    }else{
                      echo $row['original_url'];
                    }
                  ?>
                </li> 
              </li>
                <li><?php echo $row['clicks'] ?></li>
                <li><a href="php/delete.php?id=<?php echo $row['short_url'] ?>">Delete</a></li>
              </div>
              <?php
            }
          ?>
      </div>
        <?php
      }
    ?>
  </div>

  <div class="blur-effect"></div>
  <div class="popup-box">
  <div class="info-box">This is your shortened link. You can also edit your short link then saved it.</div>
  <form action="#" autocomplete="off">
    <label>Edit your shorten url</label>
    <input type="text" class="short-url" spellcheck="false" required>
    <i class="copy-icon uil uil-copy-alt"></i>
    <button>Save</button>
  </form>
  </div>

  <script src="script.js"></script>

</body>
</html>

