  <?php
  $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
  if (!$db)
  {
    die("Connection failed: " . mysqli_connect_error());
}
    $query="SELECT * FROM project ORDER BY RAND() LIMIT 3";
    $result=mysqli_query($db,$query);
    $name=array();
    while($row=mysqli_fetch_array($result))
    {
        $name[]=$row['name'];

    }
    ?>
    <?php print_r($name[1]); ?>