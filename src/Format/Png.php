<?php

namespace PhpMultiImageCompress\Format;

class Png implements iFormat {

  const PNGQUANT_QUALITY = 84;

  public static function compress($full_image_path){

    $compress_command = __OPT__ . "/pngquant --quality=50-" . self::PNGQUANT_QUALITY . " $full_image_path -o $full_image_path.compressed";
    exec($compress_command);

    if(is_file($full_image_path .'.compressed'))
      rename($full_image_path .'.compressed', $full_image_path);
  }

}
