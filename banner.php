<?php
   define('BANNER_WIDTH',200);
   define('BANNER_HEIGHT',400);
   #define('BANNER_FILENAME','pic/01_Mars.png');
   define('BANNER_FILENAME','pic/02_ivolga_bird.png');

   header('Content-type: image/png');
   # Invalidate cache. Hope it will work! ;-)
   header("Expires: Mon, 01 Jul 1998 05:00:00 GMT");
   header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");   

   $imgLarge = imagecreatefrompng(BANNER_FILENAME);
   $imgLargeWith = imagesx($imgLarge);
   $imgLargeHeight = imagesy($imgLarge);

   # Experiments ;-)
   /*
   $imgSmall = imagecreate(BANNER_WIDTH, BANNER_HEIGHT);
   $col = imagecolorallocatealpha($imgSmall, 0, 255, 0, 100);
   */

   $imgSmall = imagecreatetruecolor(BANNER_WIDTH, BANNER_HEIGHT);

   $col = imagecolorallocate($imgSmall, 242, 242, 242);
   $col = imagecolorallocate($imgSmall, 204, 204, 204);
   imagefilledrectangle($imgSmall, 0, 0, BANNER_WIDTH-1, BANNER_HEIGHT-1, $col);
   
   $srcNormalizedWidth = $imgLargeWith / $imgLargeHeight; # srcAspectRatio
   $destNormalizedWidth = BANNER_WIDTH / BANNER_HEIGHT; # destAspectRatio

   # Let's do some 2D calculations and fit the dimensions! :-)

   $destDecreaseWidthCoeff = 1;
   $destDecreaseHeightCoeff = 1;

   # There will be horizontal margins!
   if ($destNormalizedWidth >= $srcNormalizedWidth)
      $destDecreaseWidthCoeff = $srcNormalizedWidth / $destNormalizedWidth;
   else {
      # Vertical margins are here! :-) => $destNormalizedHeight
      # Let's find out the nozmalized heights!
      $destNormalizedHeight = 1/$destNormalizedWidth;
      $srcNormalizedHeight = 1/$srcNormalizedWidth;

      $destDecreaseHeightCoeff = $srcNormalizedHeight / $destNormalizedHeight;
   }

   # Parameters for imagecopyresampled()

   $dst_x = 0;
   $dst_y = 0;

   $src_x = 0;
   $src_y = 0;

   $dst_width = BANNER_WIDTH * $destDecreaseWidthCoeff;
   $dst_height = BANNER_HEIGHT * $destDecreaseHeightCoeff;

   $src_width = $imgLargeWith;
   $src_height = $imgLargeHeight;

   # Let's center our wondeful banner! :-)
   $dst_x += (BANNER_WIDTH -$dst_width)/2 - 1;
   $dst_y += (BANNER_HEIGHT -$dst_height)/2 - 1;

   imagecopyresampled($imgSmall, $imgLarge,
         $dst_x, $dst_y, 
         $src_x, $src_y,

         $dst_width, $dst_height,
         $src_width, $src_height
      );

   imagepng($imgSmall);

   imagedestroy($imgLarge);
   imagedestroy($imgSmall);









