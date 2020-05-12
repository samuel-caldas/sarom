<?php header('Content-type:text/css'); ?>
@charset "utf-8";
.pag{
	min-height: <?php echo($_GET['h']-101) ?>px;
}
.maxw{
	width: <?php echo($_GET['w']) ?>px;
}
.maxh{
	height: <?php echo($_GET['h']-1) ?>px;
}