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
        $connection = DBController::getConnection();
        $preparedStatement = $connection->prepare('SELECT fldfilename FROM tblvideos');
        $preparedStatement->execute();
        $dbVideos = $preparedStatement->fetch();
        return $dbVideos;
    }

    public static function getVideoCount()
    {
        $connection = DBController::getConnection();
        $query = "SELECT count(*) FROM `tblvideos`";
        $result = $connection->query($query);
        $numberOfVideos = $result->fetchColumn();
        return $numberOfVideos;
    }

    /**
     * Display the videos and pagination
     * @param int $page Current Page
     * 
     * @return $UrlGETAttributes Contains the attributes for GET parameters used in the video gallery URL
     */
    public static function displayVideos($page)
    {
        $connection = DBController::getConnection();
        echo '<div class="row">';
        $idCount = 0;
        $videosPerPage = 9;
        $numberOfVideos = VideoController::getVideoCount();
        $numberOfPages = ceil($numberOfVideos / $videosPerPage);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $startingLimit = ($page - 1) * $videosPerPage;
        $videos = "SELECT fldfilename AS 'FileName' FROM tblvideos order by fldfilename asc LIMIT " . $startingLimit . "," . $videosPerPage;
        $dbVideos = $connection->query($videos)->fetchAll();
        foreach ($dbVideos as $video) {
            echo '<div class="column"><video id="' . $idCount . '" class="galleryVid" src="upload/Videos/' . $video['FileName'] . '"></video></div>';
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
        $UrlGETAttributes = [$numberOfPages];
        return $UrlGETAttributes;
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
