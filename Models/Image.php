<?php

namespace JvJ\Models;

/**
 * Class for images, used to temporarily save the attributes of an image. Interacts with the corresponding controller
 * @param int $imageID id of the image
 * @param string $filename the file name of the image
 * @param string $category the category the image is assigned to
 */

class Image
{
    private $imageID;
    private $filename;
    private $category;

    function __construct($imageID, $filename, $category)
    {
        $this->imageID = $imageID;
        $this->filename = $filename;
        $this->category = $category;
    }

    /**
     * Get the id of the image
     * 
     * @return int The id of the image
     */
    public function getimageID()
    {
        return $this->imageID;
    }

    /**
     * Set the id of the image
     * 
     * @param string $imageID id of the image
     */
    public function setimageID($imageID)
    {
        $this->imageID = $imageID;
    }

    /**
     * Set the file name of the image
     * 
     * @param string $filename file name of the image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get the file name of the image
     * 
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Get the category of the image
     * 
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the category of the image
     * 
     * @param string $category Category of the image 
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
}
