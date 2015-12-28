<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <!-- Page Content -->
    <div class="container">
        
        <?php include "parts/music_" . $_SESSION["danceStyle"] . ".php"; ?>
        
        <!-- Footer -->
        <?php include "footer.php"; ?>
    </div>
    <!-- /.container -->
    <?php include "scripts.php"; ?>
</body>
</html>