<?php
session_start();
$title = "Videos - JvJ";

include('header.php');
include('Controllers/VideoController.php');
include('Controllers/DBController.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['filename'])) {
    \JvJ\Controllers\VideoController::deleteVideo(trim(htmlspecialchars($_GET['filename'])));
}
?>
<div id="myModal" class="modal">
    <div id="close">X</div>
    <img id="leftArrowVideo" class="arrow" src="assets/left_arrow.png">
    <video id="modalVid" class="customModalContent" src="">Your browser does not support this type of video.</video>
    <img id="rightArrowVideo" class="arrow" src="assets/right_arrow.png">
    <?php
    if ($_SESSION['role'] == 'Admin') {
    ?>
        <a id="deleteButtonVid" href="videos.php?filename=">DELETE</a>
    <?php } ?>
</div>
<div class="container">
    <?php
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $UrlGETAttributes = JvJ\Controllers\VideoController::displayVideos($page);
    echo '<p class="showPage">Page ' . $page . '</p>';
    ?>
    <div id="pageLinks">
        <?php
        for ($page = 1; $page <= $UrlGETAttributes[0]; $page++) :
        ?>
            <a href='<?php echo "?page=" . $page ?>' class="pages"><?php echo $page; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>