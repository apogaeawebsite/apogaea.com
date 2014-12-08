<?php

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

  echo "<p>testing</p>";
  $con = mysql_connect("mysql.apogaea.com","apogaeacom","gnt3U9j2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

  echo "<p>successfully coonnected</p>";

  mysql_select_db("apogaea_com");

  echo "<p>Database Selected</p>";

$res = mysql_query('
  SELECT * FROM `wp_z4xsr5_posts` WHERE 1 LIMIT 20
');

echo "<blockquote>";
while($row = mysql_fetch_assoc($res)) {
  echo ".";
}
echo "</blockquote>";


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';

 ?>
