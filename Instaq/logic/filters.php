<?php
require_once "util.php";
$blur = fromPost("blur_eff");
$grayscale = fromPost("gray_eff");
$constrast = fromPost("contrast_eff");
$path = fromPost("path");

$im = imagecreatefrompng("".$path."");
if($im && imagefilter($im, IMG_FILTER_CONTRAST, $constrast))
{
    echo 'Image converted to grayscale.';

    imagepng($im, "".$path."");
}
?>
<img src="<?php echo($path);?>" alt="test">
