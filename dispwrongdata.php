<?php
  $count=0;
$con = pg_connect("host=localhost port=5432 dbname=ritesh user=ritesh password=.");
		if (!$con)
		{
		die('Could not connect: ' . pg_last_error($con));
		}
$query=pg_query("select * from invalidjsondata");
	echo "<table border='1'><tr>
	<th>count</th>
	<th>ID</th>
	<th>time</th>

	<th>data</th>
	<th>email</th>
	
    
  </tr>";

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
