<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_USER_NOTICE);
ini_set('display_errors','On');
ini_set('display_startup_errors', true);

require_once "../canvas.php";
$file = "test_image.jpg";

$img = new canvas($file);
$img->resize(300, 500, "crop")->set_quality(50)->save("example_crop.png");
$img->resize(500, 500, "fill")->set_quality(5)->show();