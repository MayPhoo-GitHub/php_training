<?php
setcookie("name","Bob",time()+3600);
setcookie("theme","light");
setcookie("path","cookie",time()+3600,"/form/");
echo "See view-cookie.php";