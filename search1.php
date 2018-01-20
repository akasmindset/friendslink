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
$name = "$fetch[1] $fetch[2]";

$frindTable = "friend_$fetch[3]";

if (!isset($_POST['search'])){
	header("location:home.php");
}

if (isset($_GET['k'])) {
	$inn = $_GET['k'];
	$mobile = $_SESSION['mobile'];
	$table = "friend_$mobile";
	$addRequest = "INSERT INTO $table(name, status, mobile)VALUES('$name', 2, '$mobile')";
	$resultr = mysqli_query($conn, $addRequest);
}

include("includes/top.php");

$search = $_POST['search'];
$dem = "SELECT * FROM users WHERE  `surname` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `mobile_number` LIKE '%$search%' ";
$results = mysqli_query($conn, $dem);

?>


				<div id="postsPosts">
					<?php
					$no_row = mysqli_num_rows($results);
					if ($no_row>0) {
						while($pack=mysqli_fetch_assoc($results)){
							extract($pack);
							$_SESSION['mobile'] = $mobile_no;
							echo "<img src='img/person.png' width='50px' height='50px'>";
							echo "$surname $firstname <a href='search.php?y=1&k=$id'>Add Friend<a/><br/>";
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

</body>
</html>
