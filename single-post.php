<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }


?>

<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Zavrsni zadatak Blog</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

    </head>
    <body>
        <?php include 'header.php'; ?>
        
        <main role="main" class="container">
            
            

            <div class="row">
                

                <div class="col-sm-8 blog-main">
                    <?php 
                    
                        
                    $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();
                    // var_dump($posts);
                    
                    
                    ?>
                
                  

                    <div class="blog-post">

                        <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['id']) ?>"><?php echo($singlePost['title'])?></a></h2>
                        <p class="blog-post-meta"><?php echo($singlePost['created_on'])?> by <a href="#"><?php echo($singlePost['author'])?></a></p>
                        <p>
                        <?php echo($singlePost['body'])?>
                        </p>    
                    </div><!-- /.blog-post -->
                    
                    <div class="comments">
                        <h4>Comments</h4>
                        <?php include 'comments.php'?>

                    </div>


                </div><!-- /.blog-main -->
                
                

                <?php include 'sidebar.php'; ?>

            </div><!-- /.row -->

        </main><!-- /.container -->

        <?php include 'footer.php'; ?>

    </body>
</html>