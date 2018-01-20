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

$frindTable = "friend_$fetch[3]";
$myNumber= "$fetch[3]";

if (isset($_GET['con'])) {
	$fr = $_GET['con'];
	$frId = $_GET['s'];

	$getFriendDetails = "SELECT* FROM $frindTable WHERE id='$frId'";
	$result_gfd = mysqli_query($conn, $getFriendDetails);
	$getDataInArray = mysqli_fetch_row($result_gfd);


	$friendListTable = "friend_$getDataInArray[5]";
	$getDataMobile = $getDataInArray[5];



	//Accepting request means changing status from 2 to 1
	$updatingFriendStatus = "UPDATE $friendListTable SET
	                         status= 1
	                         WHERE mobile = '$myNumber'";
	$result_ufs = mysqli_query($conn, $updatingFriendStatus);

	$updatingMyStatus = "UPDATE $frindTable SET
	                     status = 1
	                     WHERE mobile= '$getDataMobile'";
	$result_ums = mysqli_query($conn, $updatingMyStatus);

}




include("includes/top.php");

?>


  <?php
				//checks and displays available friends requests
				$quer ="SELECT* FROM $frindTable WHERE status=2 AND status1=0";
				$resultsc3 = mysqli_query($conn, $quer);
				$no_rows = mysqli_num_rows($resultsc3);
				if ($no_rows>0){
					echo "<div id='postsPosts'>";
					while($packs=mysqli_fetch_assoc($resultsc3)){
						extract($packs);
						$_SESSION['mobile']= $mobile;
						echo "<img src='img/person.png' width='50px' height='50px'>";
						echo "$name <a id= 'linkButton' href='friend.php?s=$id&con=1'>Accept Request</a><br/>";
					}
					echo "</div>";
				} 

				?>

				<div id="postsPosts">
					<?php
					$query = "SELECT* FROM $frindTable WHERE status = 1";
					$result3 = mysqli_query($conn, $query);
					$no_row = mysqli_num_rows($result3);
					if ($no_row>0) {
						while($pack=mysqli_fetch_assoc($result3)){
							extract($pack);
							echo "<img src='img/person.png' width='50px' height='50px'>";
							echo "$name<br/>";
						}
					}
					else{
						"You have no firends yet";
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
<?php include("footer.php");
//session_unset($_SESSION['mobile']);
?>
</body>
</html>
