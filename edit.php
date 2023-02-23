<!DOCTYPE html>  
 <html>  
      <head>  
	  <title>Edit</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      

<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email']; 
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {          
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }       
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE test2_table SET name='$name',age='$age',email='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM test2_table WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>
<html>
<head>  
    <title>Edit Data</title>
</head>

<body>
<div class="container">
<div class="row">
   <div class="col-md-2"></div>
<div class="col-md-8"><br/><br/>
 <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        
            <div class="form-group">
             <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
             <label for="age">Age</label>
                <input type="text" class="form-control" name="age" value="<?php echo $age;?>">
            </div>
           <div class="form-group">
             <label for="email">Email</label>
               <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
            </div>
           <div class="form-group">
               <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			   </div>
			   <div class="form-group">
               <input type="submit" class="btn btn-primary" name="update" value="Update">
			   </div>
            
        
    </form>
	</div>
	</div>
	</div>
</body>
</html>