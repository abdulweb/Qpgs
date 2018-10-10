<?php 

  session_start();

  include ('connection.php');
  $sql = mysqli_query($con, "Select * from staff_tb WHERE StaffID = '".$_SESSION['username']."'");
  $fectch = mysqli_fetch_assoc($sql);
  if(isset($_POST['update'])) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middle'];
    $ctk = $_POST['coursetaken'];
    $cunt = $_POST['courseUnit'];

    $query = "UPDATE staff_tb SET First_Name = '$fname', Last_Name = '$lname', Middle_Name = '$mname', CourseAllocate = '$ctk', CourseUnit = '$cunt'
    WHERE StaffID='".$_SESSION['username']."'";

    if($result = mysqli_query($con, $query)) {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:user_home.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['username'])) {

?>

<!DOCTYPE html>
<html>
<head>

 <title>QPGS</title>
  <!-- css styleing -->
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <!-- js linking -->
  <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
  <link rel="stylesheet" type="text/css" href="js/jquery-2.1.3.min.js">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
</head>

<style type="text/css">
  #footer p{
    text-align: center; color:  maroon; font-weight: bold; margin-top: 60px;
  }
  .title {
  font-size: 28px; margin-left: 80px;
}

.box-left {
  background: #f8f8f8;
    border: 1px solid #e7e7e7;
    border-left: none;
    font-size: 14px;
    padding: 45px;
    width: 75%;
    margin-left: 180px; margin-top: 10px;
}

.box-left .info {
  display: inline-block;
    margin: 0 0 0 13%; margin-top: 5px;
}

.box-left .alert {
  margin: 0 13% 30px;
}

.options {
  margin: 40px 0;
    text-align: center;
}

.options .btn {
  margin: 0 6px;
    padding: 15px 40px;
}

.box-left form {
  margin: 0 13%;
}

.box-left .form-control {
  max-width: 450px;
  width: 100%;
}

.box-left .form-footer {
  float: right;
  margin: 40px 0;
}

.box-left .form-footer a {
  margin-right: 25px;
}

.box-left.result-box {
  margin-bottom: 75px;
}
</style>

<body>
<div>
  <?php 

 include('header.php');?>
 </div>
 
 <div class="nav_class">
  <?php include('menubar.php');?>
 </div>
 <div style="clear: both;"></div>

<!-- main body -->
  <section>
    
    <div class="container">
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="form-group">
          <label>Student No:</label>
          <input type="text" class="form-control" name="staffid" readonly value="<?=$_SESSION['username']?>">
        </div>


        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?=$fectch['First_Name']?>" required>
        </div>


        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?=$fectch['Last_Name']?>" required>
        </div>

        <div class="form-group">
          <label for="lastname">Middle Name</label>
          <input type="text" class="form-control" name="middlename" placeholder="middle Name" value="<?=$fectch['Middle_Name']?>">
        </div>

        <div class="form-group">
          <label for="coursetaken">Course Take</label>
          <input type="text" class="form-control" name="coursetaken" placeholder="Course taken" value="<?=$fectch['CourseAllocate']?>" required>
        </div>

        <div class="form-group">
          <label for="courseUnit">Course Unit</label>
          <input type="text" class="form-control" name="courseUnit" placeholder="Course Unit" value="<?=$fectch['CourseUnit']?>" required>
        </div>

        
        
        <div class="form-footer">
          <a href="user_home.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
        </div>
        

      </form>
    </div>

  </section>
<div id="footer">
<?php
  include('footer.php');
?>
</div>

	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:user_home.php");
  }

  mysqli_close($con);

?>