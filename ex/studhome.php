<?php
include("dbconnect.php");
extract($_POST);
session_start();
$reg=$_SESSION['reg'];
?>

<html>
<head>
  <title>Hostel</title>
  <meta name="description" content="website description" />
  
  <link rel="stylesheet" href="indexstyle.css">
  <link rel="stylesheet" href="font.css">
  <link rel="stylesheet" href="gradient.css">
</head>
<body>
  <div id="grad2"> 
  <table width="100%" border="0">
    <tr>
      <th scope="col"><a href="studhome.php" class="button pulse">StudentHome</a></th>
      <th scope="col"><a href="pay.php" class="button pulse">payment</a></th>
       <th scope="col"><a href="viewp.php" class="button pulse">Paid Details</a></th>
      <th scope="col"><a href="suggest.php" class="button pulse">Suggestions</a></th>
       <th scope="col"><a href="index.php" class="button pulse">Logout</a></th>
    </tr>
  </table>
  

  
  
  <p>&nbsp;</p>
  <div id="content">
   <img src="images\sjc.jpeg" width="1350" height="400">

	


 <h2 align="center">Hostel Details</h2>
	<?php
	$qry=mysqli_query($connect,"select * from stud where reg='$reg'");
	$row=mysqli_fetch_assoc($qry);
	?>
  <table width="40%" height="167" border="0" align="center">
	 <tr>
      <td width="41%" height="42" align="justify">Student Name </td>
      <td width="59%">
       <?php echo $row['name'];?>      </td>
    </tr>
	     <tr>
      <td height="42" align="justify">Register Number</td>
      <td>  <?php echo $row['reg'];?></td>
    </tr>
	 <tr>
      <td height="36" align="justify">Hostel Name</td>
      <td> <?php echo $row['hname'];?></td>
      
    </tr>
	 <tr>
      <td align="justify">Room No</td>
      <td> <?php echo $row['room'];?></td>
    </tr>
	 </table>
</div>



	  
<?php
	
	 if(isset($_POST['btn1']))
		  {
	$max_qry = mysqli_query($connect,"select max(id) from paid");
		$max_row = mysqli_fetch_array($max_qry); 
		$id=$max_row['max(id)']+1;
		$date=date('y-m-d');
		$qt=mysqli_query($connect,"insert into paid values('$id','$reg','$total','$date','$month')");
		if($qt)
		{
		
		echo "<script>alert('payment Suceess')</script>";
	}
	
	else
	{
	echo "<script>alert('payment failure')</script>";
	
	}
	}
	?>
