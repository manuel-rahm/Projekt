<?php
session_start();
$title = "Gallery - JvJ";

include('header.php');
include('Controllers/ImageController.php');
include('Controllers/DBController.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['filename'])) {
    if ($_SESSION['role'] == 'admin') {
        \JvJ\Controllers\ImageController::deleteImage(trim(htmlspecialchars($_GET['filename'])));
    }
}

if (!isset($_GET['gallery'])) {
    header('Location: galleryoverview.php');
    exit;
}
?>
<div id="myModal" class="modal">
    <div id="close">X</div>
    <img id="leftArrow" class="arrow" src="assets/left_arrow.png">
    <img id="modalImg" class="customModalContent" src="">
    <img id="rightArrow" class="arrow" src="assets/right_arrow.png">
    <?php
    if ($_SESSION['role'] == 'admin') {
    ?>
        <a id="deleteButton" href="gallery.php?filename=">DELETE</a>
    <?php } ?>
</div>
<div class="container">
    <?php
    $page = 1;
    if (isset($_GET['page'])) {
        $page = trim(htmlspecialchars($_GET['page']));
    }
    $UrlGETAttributes = JvJ\Controllers\ImageController::displayImages(trim(htmlspecialchars($_GET["gallery"])), $page);
    echo '<p class="showPage">Page ' . $page . '</p>';
    ?>
    <div id="pageLinks">
        <?php
        for ($page = 1; $page <= $UrlGETAttributes[0]; $page++) :
        ?>
            <a href='<?php echo "?page=" . $page . "&gallery=" . $UrlGETAttributes[1]; ?>' class="pages"><?php echo $page; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>