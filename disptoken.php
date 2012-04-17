<?php
$con = pg_connect("host=localhost port=5432 dbname=ritesh user=ritesh password=.");
		if (!$con)
		{
		die('Could not connect: ' . pg_last_error($con));
		}
$query=pg_query("select * from facebook");
	echo "<table border='1'><tr>
    <th>name</th>
    <th>email</th>
    <th>comment</th>
  </tr>";
		while($myrow = pg_fetch_row($query))
             		{
			
         		 $cont=count($myrow);
         		 echo "<tr>";
                         for($i=0;$i<$cont;$i++)
                         {
                         echo "<td>".$myrow[$i]."</td>";
                         }
                         echo "</tr>";
                          }
?>
