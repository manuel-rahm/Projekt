<?php
session_start();
$title = "Video Upload - JvJ";
include('header.php');
include('Controllers/UploadController.php');
if ($_SESSION['role'] != 'Admin' && $_SESSION['role'] != 'Uploader') {
    header('Location: login.php');
    exit;
}
?>
<div class="uploadForm">
    <form method="POST" enctype="multipart/form-data">
        <p>Select file or multiple files to upload:</p>
        <input type="file" name="files[]" id="fileToUpload" required multiple><br>
        <input type="submit" value="Upload File" name="submit" id="submitUpload">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>