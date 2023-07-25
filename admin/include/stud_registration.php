<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    	
<form id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
	  <table width="35%" border="0" align="center">
		
	   <tr>
		 <td colspan="2" align="center"><strong><h3>Student Registration</h3></strong></td>
		</tr>
		<tr>
		 <td colspan="2" align="center">&nbsp;</td>
		</tr>
		<tr>
		  <td width="37%" align="justify"><span class="style6" >Name</td>
		  <td width="63%">
		  <input name="name" type="text" id="name" onChange="return name ()"/></td>
		</tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		 <tr>
		  <td align="justify">  Register Number</td>
		  <td>
			<input name="reg" type="text" id="reg" required/>
		  </td>
		</tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td align="justify">  Gender</td>
		  <td><input name="gender" type="radio" value="male"  required/>
			Male
			  <input name="gender" type="radio" value="female" /> 
			  Female</td>
		</tr>
		 <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td align="justify">  Age</td>
		  <td><input name="age" type="text" id="age"  /></td>
		</tr>
		
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td align="justify">  Email Id </td>
		  <td><input name="email" type="email" id="email"  required/></td>
		</tr>
			  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
		  <tr>
		  <td align="justify">  Contact Number </td>
		  <td><input name="phone" type="text" id="phone"  /></td>
		  </tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
			  <tr>
		  <td align="justify">  Department </td>
		  <td><input name="dept" type="text" id="dept"  /></td>
		   </tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		  <tr>
		  <td align="justify">  Class </td>
		  <td><input name="cls" type="text" id="cls"  /></td>
		 
		</tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
			 <tr>
		 
		  <td align="justify">  Year Of Passing </td>
		  <td><input name="year" type="text" id="year"  /></td>
		 
		</tr>
		  <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		 <tr>
		  <td align="justify">  Hostal Name</td>
		  <td><select name="hn">
		  <option value="">Select Hostel</option>
		  <?php
		  $qry=mysqli_query($connect,"select hname from hostel");
		  while($rw=mysqli_fetch_assoc($qry))
		  {
		  ?>
		  <option value="<?php echo $rw['hname'];?>"> <?php echo $rw['hname'];?></option>
		  <?php
		  } 
		  ?>
		  </select>
		  </td>
		 
		</tr>
		 <tr>
		 <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		 <tr>
		 
		  <td align="justify">  Room No</td>
		  <td><input name="room" type="text" id="room"/></td>
		</tr>
			<td>&nbsp;</td>
		  <td><input name="btn" type="submit" id="btn" value="Submit" />
			<input type="reset" name="Submit2" value="Reset" /></td>
		</tr>
	  </table>
</form>
	
</body>
</html>