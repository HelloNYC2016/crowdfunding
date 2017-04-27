1.
chose uid as surrogate key, 不含业务含义的键
How to generate unique uid
or auto_increment
<?php
  do {
    $uid = rand(9999,99999999);
    $sql = "SELECT * FROM `table` WHERE `uid`=$uid";
    $result = mysql_query($sql);
  while (mysql_num_rows($result) > 0);
    // have $uid

?>

2.
open event
1.SHOW VARIABLES LIKE 'event_scheduler'
2.set GLOBAL event_scheduler = ON; 
