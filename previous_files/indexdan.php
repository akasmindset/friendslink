<?php
require_once("includes/connection.php");

$tablenew = "CREATE TABLE IF NOT EXISTS users(
			id INT(3) AUTO_INCREMENT,
			surname VARCHAR(20) NOT NULL,
			firstname VARCHAR(20) NOT NULL,
			mobile_number VARCHAR(20) NOT NULL UNIQUE,
			email VARCHAR(20) NOT NULL UNIQUE,
			password VARCHAR(20) NOT NULL,
			dob VARCHAR(20) NOT NULL,
			gender VARCHAR(20) NOT NULL,
			PRIMARY KEY (id)
			)";
$resultd=mysqli_query($conn, $tablenew);

/*This block of code down here is grabbing the LOGIN DETAILS on the login input tag on banner,
 (user phone number and password) and it will check to see that the login details has been 
 registered in my database before now,& to checkmate multiple login details) */

	if(isset($_POST['login'])) {
	$userpnum=$_POST['user_phnum'];
	$password=$_POST['pass'];
	$check= "SELECT* FROM users WHERE mobile_number ='$userpnum' AND password='$password' LIMIT 1";
	$result=mysqli_query($conn, $check);
	$num = mysqli_num_rows($result);
	$fetch = mysqli_fetch_row($result);
	$id=$fetch[0];

	if ($num==1){
		$_SESSION['id']=$id;
		$_SESSION['surname']=$fetch[1];
		header("location:home.php");
		header("location:home.php?w=$id");
	}else{
		header("location:index.php?a=1");
	}

     }

    // echo "weag";
/*This block of code down here is grabbing the REG DETAILS details on the Reg div,*/

if (isset($_POST['create_acc'])){
$fname=$_POST['f_name'];
$sname=$_POST['s_name'];
$mnum=$_POST['m_num'];
$email=$_POST['e_mail'];
$npass=$_POST['n_pass'];
$date_d=$_POST['day'];
$date_m=$_POST['month'];
$date_y=$_POST['year'];
$sexMF=$_POST['sex'];
$dateAct="$date_d-$date_m-$date_y";

//echo "$fname $sname $mnum $email $npass $date_d $date_m $date_y $sexMF $dateAct";


$enter = "INSERT INTO users(surname, firstname, mobile_number, email, password, dob, gender) VALUES('$sname', '$fname', '$mnum', '$email', '$npass', '$dateAct', '$sexMF')";
$ww = mysqli_query($conn, $enter);

//$put = "INSERT INTO user_details (surname, firstname, mobile_number, email, password, dob, sex) VALUES('$sname', '$fname', '$mnum', '$email', '$npass', '$dateAct', '$sexMF')";
//$result = mysqli_query($conn, $put);

 /*This block of code INSERT INTO OUR DB*/

//$insert= "INSERT INTO user_details(surname,firstname,mobile_number,email,password,dob,sex)VALUES('$sname','$fname','$mnum','$email','$npass','$dateAct','$sexMF')";
//$resultss =mysqli_query($conn, $insert); 
/*This block of code displays or call out/save the entered details into our db*/


}
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Friends Link -Login | Register
	</title>
	<link rel="stylesheet" type= "text/css" href= "css/main.css" />
	</head>
	<body>
		<h2> FRIENDS LINK</h2>
		<div id = "bodyWrrapper">
		   <div id= "banner">
			 <div id= "login">
				<table>
					<tr>
						<td>Phone Number</td>
						<td colspan= "2">Password</td>
					</tr>

					<tr>
						<form method="post" action="index.php">
						<td><input type ="text" name= "user_phnum" placeholder="PhoneNumber" required=""></td>
						<td><input type ="password" name= "pass" placeholder= "Password" required=""></td>
						<td><input type ="submit" name= "login" value="Login"></td>
					</form>
					</tr>
					<tr>
						<!--non breaking space- to give a space-->
						<td>&nbsp;</td>
						<td colspan= "2" style="font-size:13px"> Forgotten account?</td>
					</tr>
                </table>

			  </div>
			</div>
			   <div id= "content">
				<div id= "advert"> 
					<p title="About FriendsLink"> <b>
			Friendslink help you, link and share with friends
			and keep them connected always.</b>
        </P><br/>
        <img type= "image/img" style="width:250px;height:340px"/>

				</div>
				<div id= "registerForm">
					<h1><b>Create an account</b></h1>
					<h3><b>It's free and always will be.</b></h3>
					<form method= "post" action= "index.php">
					<input type ="text" name= "f_name" size ="20" placeholder= "First Name" required=""/>
					<input type ="text" name= "s_name" size ="25" placeholder ="Surname" required=""> <br />

				 <P><input type ="text" name= "m_num" size ="51" placeholder ="Mobile number" reqired= ""></p>
						
				 <p><input type ="text" name= "e_mail"  size ="51" placeholder ="E-mail address"></p>
					   
                 <P><input type ="password" name= "n_pass" size ="51" placeholder ="New password" required =""><p/>
					    
					    <td>
					    <tr>
					    	<h3>Birthday</h3>
					    </tr>
					    <td>
					    	<tr>
					    	<select name="day">
					    		<option value= "">Day</option>
					    		<?php
					    		for($d=1; $d<=31; $d++ ){
					    			echo"<option value ='$d'>$d</option>";
					    		}
					    		?>
					        </select>
					        <select name="month">
					        	<option value="">Months</option>
					        	<?php
					        	$months= array('Jan', 'feb', 'mar','Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
					        	for($m=0; $m<=11; $m++ ){
					        		echo "<option value='$months[$m]'>$months[$m] </option>";
					        	}
					        	?>
					        </select>

					        <select name="year">
					        	<option value="">Year</option>
					        	<?php
					        	$up=date('Y')-10;
					        	$down=date('Y')-100;
					        	for($y=$down; $y<=$up; $y++){
					        		echo"<option value='$y'>$y</option>";
					        	}

					        	?>
                            </select>
                            <color ="darkblue" style="font-size:10px">Why do I need to provide my date of birth?

					    </tr>
					</td> <br/>

					<td>
					    <tr>
					    	<input type="radio" name="sex" value="male">Male
					    	<input type="radio" name="sex" value="female">Female
					    	
					    </tr>
					    <p color ="darkblue" style="font-size:10px"> By clicking create an account you agree to our Terms and that<br/>
					     you have read our data policy, including our cookies use</p> 
					     <tr>
					    <td><input type="submit" name="create_acc" value="Create an account" size="45" color ="green"></td>
					   
					    </tr>
					</td>
					</form>

					</table>


			   </div>

             </div>
		</div>

	</body>
</html>