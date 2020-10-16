<?php
include 'connection.php';

include 'submit-post.php'

?>


<html lang="en">
    <?php include 'head.php';?>

    <body>
        <?php include 'header.php'; ?>
        
        <main role="main" class="container">
            
            <div class="row">
                
                <div class="col-sm-8 blog-main">
                    
                    <div class="blog-post">
                                                
                        <h2>Create new post </h2></br>
                        <form action="create-post.php" id="comments" method="POST" >
                            
                            <label>Title</label></br>
                            <input name="title" id="title" placeholder="Set post title" required></input></br>
                            <label>Author</label></br>
                            <input name="author" id="author" placeholder="Author name" required></input></br>
                            <label>Post</label></br>
                            <textarea name="body" id="body" rows="5" cols="40" placeholder="Be creative!" required></textarea></br>
                            <label>Created date</label></br>
                            <input name="created_on" id="created_on" type="date" required></input></br></br>
                            <input  class="btn btn-default" type="submit" name="submit" value="Submit">
                            
                        </form>
                        

                    </div><!-- /.blog-post -->
                
                </div><!-- /.blog-main -->
                
                <?php include 'sidebar.php'; ?>

            </div><!-- /.row -->

        </main><!-- /.container -->

        <?php include 'footer.php'; ?>

    </body>

</html>