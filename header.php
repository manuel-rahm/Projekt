<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?php echo $title ?></title>
</head>

<body>
    <nav class="nav" id="navbar">
        <div class="navTitleContainer"><a class="navTitle" href="index.php">Jünger von Jesus</a></div>
        <a href="javascript:void(0);" class="burger"><i class="fa fa-bars fa-2x"></i></a>
        <a class="navLink" href="index.php">Home</a>
        <a class="navLink" href="galleryoverview.php">Galleries</a>
        <a class="navLink" href="videos.php">Video Gallery</a>
        <div class="adminContent">
            <a class="navLink" href="uploadimages.php">Upload Image</a>
            <a class="navLink" href="uploadvideos.php">Upload Video</a>
            <a class="navLink" href="usermanagement.php">Manage Users</a>
        </div>
        <div class="headerRight">
            <p class="userInfo">Logged in as: </p>
            <a class="changePWButton" href="changepw.php">Change PW</a>
            <form method="POST">
                <input type="hidden" name="logout">
                <input class="logoutButton" type="submit" value="Log out">
            </form>
        </div>
    </nav>