<?php
$con = pg_connect("host=localhost port=5432 dbname=ritesh user=ritesh password=.");
		if (!$con)
		{
		die('Could not connect: ' . pg_last_error($con));
		}
$query=pg_query("select * from facebook");
	echo "<table border='1'><tr>
	<th>count</th>
    <th>ID</th>
    <th>Name</th>
    <th>token</th>
    <th>email</th>
    <th>time</th>
    
  </tr>";
  $count=0;
		while($myrow = pg_fetch_row($query))
             		{
			
         		 $cont=count($myrow);
         		 echo "<tr>";
         		 echo "<td>".$count++."</td>";
                         for($i=0;$i<$cont;$i++)
                         {
                         echo "<td>".$myrow[$i]."</td>";
                         }
                         echo "</tr>";
                          }
?>
