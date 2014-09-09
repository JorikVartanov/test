<?php
Header("Content-Type: image/png;");
session_start();

    //Image
    $image = imagecreatetruecolor(120, 30);
    
        //Colors
        $red = imagecolorallocate($image, 255, 0, 0);
        $black = imagecolorallocate($image, 0, 0, 0);
        $w = imagecolorallocate($image, 255, 255, 255);
        
            imagefill($image, 0, 0, $red);
            $code = "";
            $array = array("a", "b", "c", "d", "e", "f", "g", "h", "j", "k", "m", "n", "p", "w", "x", "z", "2", "3", "4", "5", "6", "7", "8", "9");
                for($i=0; $i<=4; $i++){
                    $code .= $array[rand(0, count($array) -1)];
                }
                    $_SESSION['code'] = $code;
                    
                imagestring($image, 5, 20, 5, $code, $w);
                imagepng($image);
                
                imagedestroy($image);
                