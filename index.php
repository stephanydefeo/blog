<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

    <div id="wrapper" class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
</nav>



        <?php
            try {

                $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
                while($row = $stmt->fetch()){
                    
                    echo '<div>';
                        echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
                        echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
                        echo '<p>'.$row['postDesc'].'</p>';                
                        echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';                
                    echo '</div>';

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>

    </div>


</body>
</html>