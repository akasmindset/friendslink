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

$idd=$fetch[0];
if(isset($_POST['upload_pix'])){
$pix= $_FILES['pp']['tmp_name'];
$pix_name="$fetch[3].jpg";
$pixDirectory="c:/wamp/www/friendslink/img/$pix_name";
$uploadImage= move_uploaded_file($pix, $pixDirectory);
if($uploadImage==1){
	$update ="UPDATE users SET
	          img='$pix_name'
	          WHERE id ='$idd'";
	          $resulte= mysqli_query($conn, $update);
}
					}


include("includes/top.php");

?>


				<div id="postsPosts">
					<?php
						echo "<table id='pTable'>";
						echo "<tr><td class='fName'>";
						echo "Name:</td><td> $fetch[1] $fetch[2]<br/>";
						echo "</td></tr>";
						echo "<tr><td class='fName'>";
						echo "Mobile:</td><td> $fetch[3]<br/>";
						echo "</td></tr>";
						echo "<tr><td class='fName'>";
						echo "Email:</td><td> $fetch[4]<br/>";
						echo "</td></tr>";
						echo "<tr><td class='fName'>";
						echo "Birthday:</td><td> $fetch[6]<br/>";
						echo "</td></tr>";
						echo "</table>";

			?>


				<form method='post' action='#' enctype='multipart/form-data'>
					<h2> Upload profile picture </h2><br/>
					<input type='file' name='pp'/>
					<input type= 'submit' name='upload_pix' value="Upload"/>
				</form>

		
					
				</div>
			</div>
			<div id="online">
				<div id="onlineText">
					Online Friends
					<ul>
						<li>friday fresh Amarachi</li>
						<li>ksdsoids fdlkfdofd fdkfdk</li>
						<li>stansley gurus fumilayo</li>
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
