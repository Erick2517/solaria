<?php

class ImagesController {
    public function ver($imageName) {
        $imagePath = VIEWS_PATH . 'images/' . $imageName;

        if (file_exists($imagePath)) {
            $imageInfo = getimagesize($imagePath);
            header("Content-Type: " . $imageInfo['mime']);
            readfile($imagePath);
            exit;
        } else {
            // Manejar el error si la imagen no existe
            header("HTTP/1.0 404 Not Found");
            exit;
        }
    }
}