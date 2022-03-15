<?php

namespace JvJ\Controllers;

include('./Models/Image.php');

/**
 * Class for handling images. Interacts with the corresponding model.
 * 
 */

class ImageController
{
    /**
     * Connect to the database to get all the images belonging to one category, part of function displayImages
     * @param string $gallery The selected gallery to be shown
     * @param $startingLimit Selector for images belonging to a gallery and specific page
     * @param $imagePerPage Number of how many images should be shown on a page
     * 
     * @return $dbImages All images of one category if the gallery contains elements, else nothing will be returned
     */
    public static function getImages($gallery, $startingLimit, $imagesPerPage)
    {
        $connection = DBController::getConnection();
        $images = "SELECT fldfilename AS 'FileName' FROM tblimage WHERE fkcategory = '$gallery' order by fkcategory desc, fldFileName asc LIMIT " . $startingLimit . "," . $imagesPerPage;
        $categoryImages = $connection->query($images)->fetchAll();
        foreach ($categoryImages as $image) {
            $image = new \JvJ\Models\Image('', $image['FileName'], $gallery);
            $dbImages[] = $image;
        }
        if (isset($dbImages)) {
            return $dbImages;
        }
    }

    /**
     * Counts the number of images of one category, part of function displayImages
     * @param string $gallery The selected gallery to be shown
     * 
     * @return $numberOfImages Returns the number of images belonging to one category
     */
    public static function getImageCountCategory($gallery)
    {
        $connection = DBController::getConnection();
        $query = "SELECT count(*) FROM `tblimage` WHERE fkcategory = '$gallery'";
        $result = $connection->query($query);
        $numberOfImages = $result->fetchColumn();
        if (isset($numberOfImages)) {
            return $numberOfImages;
        }
    }

    /**
     * Display the images for one category and pagination of those images
     * @param string $gallery The selected gallery to be shown
     * @param $page The current page to be shown
     * 
     * @return $UrlGETAttributes Contains the attributes for GET parameters as an array used in the gallery URL
     */
    public static function displayImages($gallery, $page)
    {
        echo '<div class="row">';
        $idCount = 0;
        $imagesPerPage = 9;
        $numberOfImages = ImageController::getImageCountCategory($gallery);
        $numberOfPages = ceil($numberOfImages / $imagesPerPage);
        $startingLimit = ($page - 1) * $imagesPerPage;
        $dbImages = ImageController::getImages($gallery, $startingLimit, $imagesPerPage);
        if (!isset($dbImages, $numberOfImages)) {
            echo '<h1>No images in this gallery :(</h1>';
            $UrlGETAttributes = ["", $gallery];
            return $UrlGETAttributes;
        } else {
            foreach ($dbImages as $image) {
                echo '<div class="column"><img id="' . $idCount . '" class="galleryImg" src="upload/Images/' . $image->getFilename() . '"></div>';
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
    }

    /**
     * Delete selected image in database and unlink it
     * 
     * @param string $filename File name of the image
     * 
     * @return void
     */
    public static function deleteImage($filename)
    {
        $connection = DBController::getConnection();
        $imagePath = "upload/Images/";
        $query = "DELETE FROM tblimage WHERE fldfilename = '$filename'";
        $connection->query($query);
        unlink($imagePath . $filename);
    }
}
