<?php
header("Content-Type:text/html;charset=utf8");

$str='©'; 
echo htmlentities($str)."\n";
echo htmlspecialchars($str)."\n";

$str = "<p>a文本b</p><?php php的标志?>";
echo strip_tags($str);

?>
