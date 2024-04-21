<?php

    class ImageModule {
        
        public function Load_Image($imagePath) {
            $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
            $imageData = file_get_contents($imagePath);
        
            $base64Image = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);
        
            echo '<img src="' . $base64Image . '">';
        }
    }

?>