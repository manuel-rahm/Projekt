<?php

namespace JvJ\Models;

/**
 * Class for videos, used to temporarily save the attributes of a video. Interacts with the corresponding controller.
 * @param int $videoID id of the video
 * @param string $filename the file name of the video
 */

class Video
{
    private $videoID;
    private $filename;

    function __construct($videoID, $filename)
    {
        $this->videoID = $videoID;
        $this->filename = $filename;
    }

    /**
     * Get the id of the video
     * 
     * @return string The id of the video
     */
    public function getvideoID()
    {
        return $this->videoID;
    }

    /**
     * Set the id of the video
     * 
     * @param string $videoID id of the video
     */
    public function setvideoID($videoID)
    {
        $this->videoID = $videoID;
    }

    /**
     * Set the file name of the video
     * 
     * @param string $filename file name of the video
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get the file name of the video
     * 
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
}
