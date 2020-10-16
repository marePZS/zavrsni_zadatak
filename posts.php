<?php include 'connection.php';?>


<html lang="en">
<?php include 'head.php';?>

    <body>
        <?php include 'header.php'; ?>
        
        <main role="main" class="container">
            
            

            <div class="row">
                

                <div class="col-sm-8 blog-main">
                    <?php 
                    
                        
                    $sql = "SELECT * FROM posts ORDER BY created_on DESC";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $posts = $statement->fetchAll();
                    // var_dump($posts);
                    
                    
                    ?>
                    <?php
                    foreach ($posts as $post) {
                        // var_dump($post);
                    ?>
                  

                    <div class="blog-post">
                                                
                        <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title'])?></a></h2>
                        
                        <p class="blog-post-meta"><?php echo($post['created_on'])?> by <a href="#"><?php echo($post['author'])?></a></p>
                        
                        <p><?php echo($post['body'])?></p>

                    </div><!-- /.blog-post -->

                    <?php
                        }
                    ?>  
                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                    </nav>
                
    

                </div><!-- /.blog-main -->
                
                

                <?php include 'sidebar.php'; ?>

            </div><!-- /.row -->

        </main><!-- /.container -->

        <?php include 'footer.php'; ?>

    </body>

</html>