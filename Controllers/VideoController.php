<?php

namespace JvJ\Controllers;

/**
 * Class for handling videos. Interacts with the corresponding model.
 * 
 */

class VideoController
{
    /**
     * Connect to the database to get all the videos stored in there
     * 
     * @return $dbVideos All the videos from the database
     */
    public static function getVideos()
    {
    }
    /**
     * Display the videos and pagination
     * @param int $page Current Page
     * 
     * @return $numberUrl URL including number of pages and 
     */
    public static function displayVideos($page)
    {
    }
    /**
     * Delete selected video in database and unlink it
     * 
     * @param string $filename File name of the image
     * 
     * @return void
     */
    public static function deleteVideo()
    {
    }
}
