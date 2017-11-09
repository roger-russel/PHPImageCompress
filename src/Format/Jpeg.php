<?php

 namespace PhpMultiImageCompress\Format;

 class Jpeg implements iFormat {

   const GUETZLI_QUALITY = 84;
   const JPEGE_RECOMPRESS_MIN = 80;

   public static function compress($full_image_path){

     $compress_command = __OPT__ . "/guetzli --quality " . self::GUETZLI_QUALITY . " $full_image_path $full_image_path.compressed";
     exec($compress_command);

     if(!is_file($full_image_path .'.compressed')){
       $recompress = __OPT__ . "/jpeg-recompress --quiet --accurate --quality high --min " . self::JPEGE_RECOMPRESS_MIN . " -m ms-ssim $full_image_path $full_image_path.compressed";
       exec($recompress);
     }

     if(is_file($full_image_path .'.compressed'))
       rename($full_image_path .'.compressed', $full_image_path);

   }

 }
