<?php
session_start();
$title = "Image Upload - JvJ";
include('header.php');
?>
<div class="uploadForm">
    <form method="POST" enctype="multipart/form-data">
        <p>Select file or multiple files to upload<br>(multiple files will receive the same category selected):</p>
        <input type="file" name="files[]" id="fileToUpload" required multiple>
        <br>
        <label for="category">Select category:</label><br>
        <select name="category" id="categories">
            <option value="Andri">Andri</option>
            <option value="Andrin">Andrin</option>
            <option value="Brian">Brian</option>
            <option value="Jan">Jan</option>
            <option value="Joël">Joël</option>
            <option value="Julian">Julian</option>
            <option value="Kilian">Kilian</option>
            <option value="Manuel">Manuel</option>
            <option value="Mathis">Mathis</option>
            <option value="Noah">Noah</option>
            <option value="Pascal">Pascal</option>
            <option value="Sidney">Sidney</option>
            <option value="Simon">Simon</option>
            <option value="Vitus">Vitus</option>
            <option value="Yanik">Yanik</option>
            <option value="Group">Group</option>
        </select><br>
        <input type="submit" value="Upload File" name="submit" id="submitUpload">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>