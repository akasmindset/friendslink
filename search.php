<?php 
session_start();

require_once("includes/connection.php");

if (!isset($_SESSION['id'])) {
	header("location:index.php?a=2");
}

$id = $_SESSION['id'];
$_SESSION['id'] = $id;
$select = "SELECT* FROM users WHERE id=$id";
$result = mysqli_query($conn, $select);
$fetch = mysqli_fetch_row($result);

$mobile=$fetch[3];
$surname=$fetch[1];

$userFrindTable = "friend_$fetch[3]";

if (!isset($_POST['search'])&& !isset($_GET['con'])){
	header("location:home.php");
}

if(isset($_SESSION['mobile']) && isset($_GET['con'])){
	
	if($_GET['con']==1){
		$id2 = $_GET['s'];


		//getting the details of friend to be added
		$get = "SELECT* FROM users WHERE id = $id2";
		$confirm = mysqli_query($conn, $get);
		$frData = mysqli_fetch_row($confirm);
		$frName = "$frData[1] $frData[2]";
		$frMobile = $frData[3];
		
		$name = "$fetch[1] $fetch[2]";
		$mobiles = $_SESSION['mobile'];
		$frTable = "friend_$mobiles";
		
		//Adding friend table if doesnt exists for the person to be added 
		$frindTab = "CREATE TABLE IF NOT EXISTS $frTable(
				id INT(3) AUTO_INCREMENT,
				name VARCHAR(100) NOT NULL,
				status INT(2) NOT NULL,
				status1 INT(2) NOT NULL,
				mobile VARCHAR(20) NOT NULL UNIQUE,
				img VARCHAR(100) NOT NULL,
				PRIMARY KEY(id))";
		$result6 = mysqli_query($conn, $frindTab);
		$query2 = "INSERT INTO $userFrindTable(name, status, mobile)VALUES('$frName', 2, '$frMobile')";
		$result3 = mysqli_query($conn, $query2);
		
		$query21 = "INSERT INTO $frTable(name, status, mobile)VALUES('$name', 2, '$mobile')";
		$result31 = mysqli_query($conn, $query21);
	}
	
}


include("includes/top.php");
if (isset($_POST['search'])) {
	$search = $_POST['search'];
	$_SESSION['search'] = $search;
}else {
	$search = $_SESSION['search'];
}
/*$dem = "SELECT * FROM users WHERE mobile_number !='$mobile' AND surname!='$surname' AND 'surname' LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `mobile_number` LIKE '%$search%' ";
$results = mysqli_query($conn, $dem);*/

$dem = "SELECT* FROM users WHERE mobile_number!='$mobile' AND surname!='$surname' AND `surname` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `mobile_number` LIKE '%$search%' ";
$results = mysqli_query($conn, $dem);


?>


				<div id="postsPosts">
					<?php
					$no_row = mysqli_num_rows($results);
					if ($no_row>0) {
						while($pack=mysqli_fetch_assoc($results)){
							extract($pack);
							//$_SESSION['mobile'] = $mobile;
							echo "<img src='img/person.png' width='50px' height='50px'>";
							echo "$surname $firstname ";
							$_SESSION['mobile'] = $mobile_number;
							$check = "SELECT status FROM $userFrindTable WHERE mobile='$mobile_number' LIMIT 1";
							$result1 = mysqli_query($conn, $check);
							$statuss= mysqli_fetch_row($result1);
							$status= $statuss[0];
							$num_row = mysqli_num_rows($result1);
							if ($num_row==0) {
								echo"<a href='search.php?s=$id&con=1'>Add Friend</a>";
							}elseif($status==1){
								//do nothing
							}elseif($status==2){
								echo "<span class='friendRequest'>Friend Request Sent</span> <a href='search.php?con=2'>Cancel Request</a>";
							}
							
							echo"<br/>";
						}
					}else{
							echo "No Record Found!";
						}
					?>
					<ul>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
					</ul>
					
				</div>
			</div>
			<div id="online">
				<div id="onlineText">
					Online Friends
					<ul>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>
</body>
</html>
