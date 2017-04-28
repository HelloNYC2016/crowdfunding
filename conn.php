<?php   
  
 $conn = mysql_connect("127.0.0.1","root","yuqi00") or die("Failed to connect database.".mysql_error());  
 mysql_select_db("Final",$conn) or die("数据库访问错误".mysql_error());  

?>  