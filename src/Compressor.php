<?php

require __DIR__ . '/bootstrap.php';

namespace PhpMultiImageCompress;

use PhpMultiImageCompress\Format;

Class Compressor {

  public function it($full_image_path){

    switch(exif_imagetype($full_image_path)){
      case IMAGETYPE_JPEG:
        Jpeg::compress($full_image_path);
        break;
      case IMAGETYPE_PNG:

        break;
      case IMAGETYPE_GIF:

        break;
    }
  }

}
