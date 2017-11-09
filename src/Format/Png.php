<?php

namespace PhpMultiImageCompress\Format;

class Png implements iFormat {

  public static function compress($full_image_path){

    $compress_command = GIFSICLE . " -O3 --lossy=80 $full_image_path -o $full_image_path.compressed";
    exec($compress_command);

    if(is_file($full_image_path .'.compressed'))
      echo rename($full_image_path .'.compressed', $full_image_path);

  }

}
