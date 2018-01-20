<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FriendsLink</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="previous_files/css/main.css" />

</head>

<body>
	<div id="bodyWrapper">
		<div id="bannerWrapper">
			<div id="searchMenu">
				<form method="post" action="search.php" >
				&nbsp;<input type="text" id="searchBox" name="search" size="50" placeholder="Search Friendslink" />
				</form>
			</div>
			<div id="logout">
				<div id="imgWrapper">
					<img src="img/<?php echo $fetch[8];?>" width="50" id="imgSpc" height="50" border="0" />	
				</div>
				<div id="menuText">
					<a href="profile.php"><?php echo $fetch[1]; ?></a> &nbsp;&nbsp;&nbsp;&nbsp;   |  &nbsp;<a href="home.php"> Home </a>  &nbsp;| &nbsp; <a href='friend.php'>Friends <a/> &nbsp;| &nbsp;  <a href="logout.php">Log out</a>
				</div>		
			</div>
		</div>
		<div id="content">
			<div id="posts">
				<div id="postsBox">
					Post Updates<br/>
					<form method="post" action="#">
					<table id="postTable">
						<tr>
							<td><img src="img/<?php echo $fetch[8];?>" width="50" id="imgSpc" height="50" border="0" /></td>
							<td><textarea name="newPost" id="newPost" placeholder="What's on your mind?"></textarea></td>
						</tr>
					</table><br/>
					<input type="submit" name="post" value="Post" />
					</form>
					
				</div>
