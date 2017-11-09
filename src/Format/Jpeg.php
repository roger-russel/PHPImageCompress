<?php

 namespace PhpMultiImageCompress\Format;

 class Jpeg implements iFormat {

   const GUETZLI_QUALITY = 84;

   public static function compress($full_image_path){

     $compress_command = GUETZLI . " --quality " . self::GUETZLI_QUALITY . " $full_image_path $full_image_path.compressed";
     exec($compress_command);

     if(!is_file($full_image_path .'.compressed'))
       $recompress= JPEGRECOMPRESS . " --quiet --accurate --quality high --min 80 -m ms-ssim $full_image_path $full_image_path.compressed";
       exec($recompress);

     if(is_file($full_image_path .'.compressed'))
       rename($full_image_path .'.compressed', $full_image_path);

   }

 }
