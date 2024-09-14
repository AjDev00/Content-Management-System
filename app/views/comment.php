<?php
require_once "../includes/config.inc.php";
require_once "comment_view.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <form action="../includes/comment.inc.php" method="POST">
                    <input type="hidden" name="postid" value="<?php echo htmlspecialchars($_GET['commentid'] ?? ''); ?>">
                    <textarea class = "form-control" name="comment_content" placeholder="Write your comment here" style = "height:13em;"></textarea>
                    <button class = "btn btn-success mt-2" type="submit">Submit Comment</button>
                    <?php
                        $commentview = new Commentview();
                        echo "<p>" . $commentview -> displayError() . "</p>";
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>