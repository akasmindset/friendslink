<?php 
session_start();
require_once("includes/connection.php");

if(!isset($_SESSION['id'])){
	header("location:index.php?a=1");
	exit;
}
/* Disblok of code is Making available the details of this user*/
$id=$_SESSION['id'];
$query= "SELECT* FROM users where id= $id";
$result= mysqli_query($conn, $query);
$fetch=mysqli_fetch_row($result);

$myNumber= $fetch[3];


$tablename="post_$fetch[3]";
$postTable="CREATE TABLE IF NOT EXISTS $tablename(
	id INT(3) AUTO_INCREMENT, 
	post TEXT(1000)NOT NULL,
	img VARCHAR(100) NOT NULL,
	PRIMARY KEY(id))";
$result1=mysqli_query($conn, $postTable);

$friend= "friend_$fetch[3]";
$friendTable="CREATE TABLE IF NOT EXISTS $friend(
	id INT(3) AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	status INT(2) NOT NULL,
	status1 INT(2) NOT NULL,
	img VARCHAR (100) NOT NULL,
	mobile VARCHAR(20) NOT NULL UNIQUE,
	PRIMARY KEY(id))";
$resilts= mysqli_query($conn, $friendTable);

if(isset($_POST['post'])){
	$newPost=$_POST['newPost'];
	if (!empty($newPost)) {
		$insert="INSERT INTO $tablename(post) VALUES('$newPost')";
		$result2=mysqli_query($conn,$insert);
	}
}

if (isset($_GET['con'])) {
	$fr = $_GET['con'];
	$frId = $_GET['s'];

	$getFriendDetails = "SELECT* FROM $friend WHERE id='$frId'";
	$result_gfd = mysqli_query($conn, $getFriendDetails);
	$getDataInArray = mysqli_fetch_row($result_gfd);


	$friendListTable = "friend_$getDataInArray[5]";
	$getDataMobile = $getDataInArray[5];



	//Accepting request means changing status from 2 to 1
	$updatingFriendStatus = "UPDATE $friendListTable SET
	                         status= 1
	                         WHERE mobile = '$myNumber'";
	$result_ufs = mysqli_query($conn, $updatingFriendStatus);

	$updatingMyStatus = "UPDATE $friend SET
	                     status = 1
	                     WHERE mobile= '$getDataMobile'";
	$result_ums = mysqli_query($conn, $updatingMyStatus);

}


include("includes/top.php");

?>
				

				<?php
				//checks and displays available friends requests
				$quer ="SELECT* FROM $friend WHERE status=2 AND status1=0";
				$resultsc3 = mysqli_query($conn, $quer);
				$no_rows = mysqli_num_rows($resultsc3);
				if ($no_rows>0){
					echo "<div id='postsPosts'>";
					while($packs=mysqli_fetch_assoc($resultsc3)){
						extract($packs);
						$_SESSION['mobile']= $mobile;
						echo "<img src='img/person.png' width='50px' height='50px'>";
						echo "$name <a id= 'linkButton' href='home.php?s=$id&con=1'>Accept Request</a><br/>";
					}
					echo "</div>";
				} 

				?>

				<?php
				$query1="SELECT* FROM $tablename ORDER BY id DESC";
				$result4= mysqli_query($conn, $query1);
				$no_row= mysqli_num_rows($result4);
				if ($no_row>0){
					while($nest=mysqli_fetch_assoc($result4)){
						extract($nest);
						echo "<div id='postsPosts'>";
						echo "<img src= 'img/person.png' width='50px' height='50px'>";
						echo "$fetch[1] $fetch[2] <br/>";
						echo "$post";
						echo "</div>";
					}
				}
				?>
				<div id="postsPosts">
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
