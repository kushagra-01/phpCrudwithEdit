<!DOCTYPE html>  
 <html>  
      <head>  
	  <title>Welcome</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      
<body>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM test2_table ORDER BY id DESC"); // using mysqli_query instead
?>
<div class="container">  
                

    <a href="add.html">Add New Data</a><br/><br/>
	<div class="table-responsive">  
 <table id="users" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                   
                                <td>Name</td>
								<td>Age</td>
								<td>Email</td>
								<td>Update</td>
									
                               </tr>  
                          </thead>
	
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";  
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td>";       
        }
        ?>
		 </table> 
		</div>
		</div>
		<script>  
 $(document).ready(function(){  
      $('#users').DataTable();  
 });  
 </script>
    
</body>
</html>