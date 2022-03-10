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
     * 
     * @param string $category The category (person) for a specific gallery
     * 
     * @return 
     */
    public static function getImages($category)
    {
    }

    /**
     * Display the images for one category and pagination of those images
     * 
     * @return void
     */
    public static function displayImages($gallery, $page)
    {
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
    }
}
