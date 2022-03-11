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
?>
<div id="myModal" class="modal">
    <div id="close">X</div>
    <img id="leftArrow" class="arrow" src="assets/left_arrow.png">
    <img id="modalImg" class="customModalContent" src="">
    <img id="rightArrow" class="arrow" src="assets/right_arrow.png">

    <a id="deleteButton" href="gallery.php?filename=">DELETE</a>
</div>
<div class="container">
    <div id="pageLinks">
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>