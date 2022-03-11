<?php

namespace JvJ\Controllers;

/**
 * Class for handling images. Interacts with the corresponding model.
 * 
 */

class ImageController
{
    /**
     * Connect to the database to get all the images belonging to one category
     * @param string $gallery The category (person) for a specific gallery
     * 
     * @return $dbImages All images of one category
     */
    public static function getImages($gallery)
    {
        $connection = DBController::getConnection();
        $preparedStatement = $connection->prepare('SELECT fldfilename FROM tblimage WHERE fkcategory = ?');
        $preparedStatement->execute(array($gallery));
        $dbImages = $preparedStatement->fetch();
        return $dbImages;
    }

    /**
     * Counts the number of images of one category, part of function displayImages
     * @param string $gallery The category (person) for a specific gallery
     * 
     * @return $numberOfImages Returns the number of images belonging to one category
     */
    public static function getImageCountCategory($gallery)
    {
        $connection = DBController::getConnection();
        $query = "SELECT count(*) FROM `tblimage` WHERE fkcategory = '$gallery'";
        $result = $connection->query($query);
        $numberOfImages = $result->fetchColumn();
        return $numberOfImages;
    }

    /**
     * Display the images for one category and pagination of those images
     * 
     * @return void
     */
    public static function displayImages($gallery, $page)
    {
        $connection = DBController::getConnection();
        echo '<div class="row">';
        $idCount = 0;
        $imagesPerPage = 9;
        $numberOfImages = ImageController::getImageCountCategory($gallery);
        $numberOfPages = ceil($numberOfImages / $imagesPerPage);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $startingLimit = ($page - 1) * $imagesPerPage;
        $images = "SELECT fldfilename AS 'FileName' FROM tblimage WHERE fkcategory = '$gallery' order by fkcategory desc, fldFileName asc LIMIT " . $startingLimit . "," . $imagesPerPage;
        $categoryImages = $connection->query($images)->fetchAll();
        foreach ($categoryImages as $image) {
            echo '<div class="column"><img id="' . $idCount . '" class="galleryImg" src="upload/Images/' . $image['FileName'] . '"></div>';
            $idCount++;
            if (
                $idCount % 3 === 0
            ) {
                echo '</div>';
                echo '<div class="row">';
            }
            if ($idCount % 9 === 0) {
                echo '</div>';
            }
        }
        if ($idCount % 3 != 0) {
            echo '</div>';
        }
        $UrlGETAttributes = [$numberOfPages, $gallery];
        return $UrlGETAttributes;
    }

    /**
     * Delete selected image in database and unlink it
     * 
     * @param string $filename File name of the image
     * 
     * @return void
     */
    public static function deleteImage()
    {
        $connection = DBController::getConnection();
        $filename = trim(htmlspecialchars($_GET['filename']));
        $imagePath = "upload/Images/";
        $query = "DELETE FROM tblimage WHERE fldfilename = '$filename'";
        $connection->query($query);
        if (unlink($imagePath . $filename)) {
            echo '<script>alert("Image deleted successfully!")</script>';
        }
    }
}
