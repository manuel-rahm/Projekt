<?php

namespace JvJ\Controllers;

include('DBController.php');

/**
 * Class controlling the upload functions of images and videos
 */

class UploadController
{
    /**
     * Uploads images to the database and moves the files to the specified directory
     * 
     * @param $files Files that are uploaded via POST
     */
    public static function uploadImages($files)
    {
        $connection = DBController::getConnection();
        $imagePath = "upload/Images/";
        $allowImageTypes = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif');
        if (isset($files)) {
            $totalfileSize = array_sum($_FILES['files']['size']);
            if ($totalfileSize > 200000000) {
                echo '<script>alert("Files are too large, please keep it under 200MB!")</script>';
            } else {
                $fileCount = count($files['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    $extension = $files['type'][$i];
                    if (!in_array($extension, $allowImageTypes)) {
                        echo '<script>alert("Only png, jpg, jpeg and gif files are allowed!")</script>';
                        exit;
                    } else {
                        $data = [
                            'fname' => $files['name'][$i],
                            'fcategory' => $_POST['category'],
                        ];
                        $query = "INSERT INTO tblimage (fldfilename, fkcategory) SELECT :fname, :fcategory FROM dual WHERE NOT EXISTS (SELECT fldfilename FROM tblimage WHERE tblimage.fldfilename = :fname)";
                        $preparedStatement = $connection->prepare($query);
                        $file = $files['name'][$i];
                        $pathFile = $imagePath . $file;
                        move_uploaded_file($files['tmp_name'][$i], $pathFile);
                        $preparedStatement->execute($data);
                    }
                }
                echo '<script>alert("File/s uploaded successfully!")</script>';
            }
        } else {
            echo '<script>alert("No file/s selected!")</script>';
        }
    }

    /**
     * Uploads videos to the database and moves the files to the specified directory
     * 
     * @param $files Files that are uploaded via POST
     * 
     */
    public static function uploadVideos($files)
    {
        $connection = DBController::getConnection();
        $videoPath = "upload/Videos/";
        $allowVideoTypes = array('video/mp4', 'video/webm', 'video/ogg');
        if (isset($files)) {
            $totalfileSize = array_sum($_FILES['files']['size']);
            if ($totalfileSize > 200000000) {
                echo '<script>alert("Files are too large, please keep it under 200MB!")</script>';
            } else {
                $fileCount = count($files['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    $extension = $files['type'][$i];
                    if (!in_array($extension, $allowVideoTypes)) {
                        echo '<script>alert("Only mp4, webm and ogg files are allowed!")</script>';
                        exit;
                    } else {
                        $data = [
                            'fname' => $files['name'][$i],
                        ];
                        $query = "INSERT INTO tblvideos (fldfilename) SELECT :fname WHERE NOT EXISTS (SELECT fldfilename FROM tblvideos WHERE fldfilename = :fname)";
                        $preparedStatement = $connection->prepare($query);;
                        $file = $files['name'][$i];
                        $path_file = $videoPath . $file;
                        move_uploaded_file($files['tmp_name'][$i], $path_file);
                        $preparedStatement->execute($data);
                    }
                }
                echo '<script>alert("File/s uploaded successfully!")</script>';
            }
        } else {
            echo '<script>alert("No file/s selected!")</script>';
        }
    }
}
