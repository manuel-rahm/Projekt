<?php

namespace JvJ\Controllers;

include('./Models/Video.php');

/**
 * Class for handling videos. Interacts with the corresponding model.
 * 
 */

class VideoController
{
    /**
     * Connect to the database to get all the videos stored in there, part of displayVideos
     * 
     * @return $dbVideos All the videos from the database, if there are no videos, nothing will be returned
     */
    public static function getVideos($startingLimit, $videosPerPage)
    {
        $connection = DBController::getConnection();
        $videos = "SELECT fldfilename AS 'FileName' FROM tblvideos order by fldfilename asc LIMIT " . $startingLimit . "," . $videosPerPage;
        $allVideos = $connection->query($videos)->fetchAll();
        foreach ($allVideos as $video) {
            $video = new \JvJ\Models\Video("", $video['FileName']);
            $dbVideos[] = $video;
        }
        if (isset($dbVideos)) {
            return $dbVideos;
        }
    }

    /**
     * Counts the number of videos, part of displayVideos
     * 
     * @return $numberOfVideos Returns the number of videos
     */
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
        echo '<div class="row">';
        $idCount = 0;
        $videosPerPage = 9;
        $numberOfVideos = VideoController::getVideoCount();
        $numberOfPages = ceil($numberOfVideos / $videosPerPage);
        $startingLimit = ($page - 1) * $videosPerPage;
        $dbVideos = VideoController::getVideos($startingLimit, $videosPerPage);
        if (!isset($dbVideos, $numberOfVideos)) {
            echo '<h1>No videos here :(</h1>';
            $UrlGETAttributes = [""];
            return $UrlGETAttributes;
        } else {
            foreach ($dbVideos as $video) {
                echo '<div class="column"><video id="' . $idCount . '" class="galleryVid" src="upload/Videos/' . $video->getFilename() . '"></video></div>';
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
    }

    /**
     * Delete selected video in database and unlink it
     * 
     * @param string $filename File name of the image
     * 
     * @return void
     */
    public static function deleteVideo($filename)
    {
        $connection = DBController::getConnection();
        $videoPath = "upload/Videos/";
        $query = "DELETE FROM tblvideos WHERE fldfilename = '$filename'";
        $connection->query($query);
        if (unlink($videoPath . $filename)) {
            echo '<script>alert("Video deleted successfully!")</script>';
        }
    }
}
