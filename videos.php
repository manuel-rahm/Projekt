<?php
session_start();
$title = "Videos - JvJ";

include('header.php');
?>
<div id="myModal" class="modal">
    <div id="close">X</div>
    <img id="leftArrowVideo" class="arrow" src="assets/left_arrow.png">
    <video id="modalVid" class="customModalContent" src="">Your browser does not support this type of video.</video>
    <img id="rightArrowVideo" class="arrow" src="assets/right_arrow.png">
    <a id="deleteButtonVid" href="videos.php?filename=">DELETE</a>
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