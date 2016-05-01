<?php 
$time_start = microtime(true);
//ini_set('max_execution_time', 300);
set_time_limit(0);
require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search results</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<div class="boxh">
<h1>Welcome to Blogline  </h1>
<h2>Create. Comment. Explore </h2>
</div>


<body>
<form action="search.php" method="GET">
<div class="box">
	<div class="container-1">
		<span class="icon"><i class="fa fa-search"></i></span>
		<input id="search" name="search" type="text" placeholder="Search the blog">
		
	</div>
</div>
	<div class="box2">
	<div class="container-2">
		<input id="blogName" type="checkbox" value="1" name="blogName"/> Blog title      
		<input id="blogDescription" type="checkbox" value="2" name="blogDescription"/> Blog content   
		<input id="tags" type="checkbox" value="3" name="tags"/> Tags    
		<input id="authors" type="checkbox" value="4" name="authors"/> Authors 
	</div>
</div>
	</form>

<div id="wrapper">
		<h1>Search results</h1>
		<hr />
<?php

if(isset($_GET['blogName']) and isset($_GET['blogDescription']) and isset($_GET['tags']) and isset($_GET['authors'])) 
{ 
		try {			
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogName LIKE '%".$safe_value."%'");
				while($row = $stmt->fetch()){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';
				}

				$stmt2 = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogDescription LIKE '%".$safe_value."%'");
				while($row2 = $stmt2->fetch()){
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row2['blogID'].'">'.$row2['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row2['authorName'].' on '.date('jS M Y', strtotime($row2['blogdate'])).'</p>';
						echo '<p>'.$row2['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row2['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$stmt3 = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE authorName LIKE '%".$safe_value."%'");
				while($row3 = $stmt3->fetch()){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row3['blogID'].'">'.$row3['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row3['authorName'].' on '.date('jS M Y', strtotime($row3['blogdate'])).'</p>';
						echo '<p>'.$row3['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row3['blogID'].'">Read More</a></p>';				
					echo '</div>';
				}
				
				
				$stmt4 = $db->query("SELECT 
										blogName,
									blogDescription,
									blogdate,
									temptable2.blogID,
									authors.authorID,
									temptable2.tagID,
									authorName,
									tagDescription
						FROM
							(SELECT 
								blogName,
									blogDescription,
									blogdate,
									temptable1.blogID,
									authorID,
									tags.tagDescription,
									tags.tagID
							FROM
								(SELECT 
								blogName,
									blogDescription,
									blogdate,
									authorID,
									blogid_tagid.tagID,
									blogs.blogID
							FROM
								blogs
							JOIN blogid_tagid ON blogs.blogID = blogid_tagid.blogID) AS temptable1
							JOIN tags ON temptable1.tagID = tags.tagID) AS temptable2
								JOIN
							authors ON temptable2.authorID = authors.authorID where tagDescription like '%".$safe_value."%' ");
				while($row4 = $stmt4->fetch()){
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row4['blogID'].'">'.$row4['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row4['authorName'].' on '.date('jS M Y', strtotime($row4['blogdate'])).'</p>';
						echo '<p>'.$row4['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row4['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['blogDescription']) and isset($_GET['tags'])) 
{ 
		try {			
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogName LIKE '%".$safe_value."%'");
				while($row = $stmt->fetch()){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';
				}

				$stmt2 = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogDescription LIKE '%".$safe_value."%'");
				while($row2 = $stmt2->fetch()){
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row2['blogID'].'">'.$row2['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row2['authorName'].' on '.date('jS M Y', strtotime($row2['blogdate'])).'</p>';
						echo '<p>'.$row2['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row2['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				
				$stmt4 = $db->query("SELECT 
										blogName,
									blogDescription,
									blogdate,
									temptable2.blogID,
									authors.authorID,
									temptable2.tagID,
									authorName,
									tagDescription
						FROM
							(SELECT 
								blogName,
									blogDescription,
									blogdate,
									temptable1.blogID,
									authorID,
									tags.tagDescription,
									tags.tagID
							FROM
								(SELECT 
								blogName,
									blogDescription,
									blogdate,
									authorID,
									blogid_tagid.tagID,
									blogs.blogID
							FROM
								blogs
							JOIN blogid_tagid ON blogs.blogID = blogid_tagid.blogID) AS temptable1
							JOIN tags ON temptable1.tagID = tags.tagID) AS temptable2
								JOIN
							authors ON temptable2.authorID = authors.authorID where tagDescription like '%".$safe_value."%' ");
				while($row4 = $stmt4->fetch()){
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row4['blogID'].'">'.$row4['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row4['authorName'].' on '.date('jS M Y', strtotime($row4['blogdate'])).'</p>';
						echo '<p>'.$row4['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row4['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['blogDescription'])) 
{ 
		try {			
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogName LIKE '%".$safe_value."%'");
				while($row = $stmt->fetch()){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';
				}

				$stmt2 = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogDescription LIKE '%".$safe_value."%'");
				while($row2 = $stmt2->fetch()){
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row2['blogID'].'">'.$row2['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row2['authorName'].' on '.date('jS M Y', strtotime($row2['blogdate'])).'</p>';
						echo '<p>'.$row2['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row2['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 


else if(isset($_GET['blogName'])) 
{ 
try {
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogName LIKE '%".$safe_value."%'");
				while($row = $stmt->fetch()){
					
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
} 
else if (isset($_GET['blogDescription']))
{ 
	try {
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogDescription LIKE '%".$safe_value."%' ");
				while($row = $stmt->fetch()){
					
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}
else if (isset($_GET['tags']))
{ 
	try {
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT 
    blogName,
            blogDescription,
            blogdate,
            temptable2.blogID,
            authors.authorID,
            temptable2.tagID,
            authorName,
            tagDescription
FROM
    (SELECT 
        blogName,
            blogDescription,
            blogdate,
            temptable1.blogID,
            authorID,
            tags.tagDescription,
            tags.tagID
    FROM
        (SELECT 
        blogName,
            blogDescription,
            blogdate,
            authorID,
            blogid_tagid.tagID,
            blogs.blogID
    FROM
        blogs
    JOIN blogid_tagid ON blogs.blogID = blogid_tagid.blogID) AS temptable1
    JOIN tags ON temptable1.tagID = tags.tagID) AS temptable2
        JOIN
    authors ON temptable2.authorID = authors.authorID where tagDescription like '%".$safe_value."%' ");
				while($row = $stmt->fetch()){
					
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}
else if (isset($_GET['authors']))
{ 
	try {
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE authorName LIKE '%".$safe_value."%' ");
				while($row = $stmt->fetch()){
					
						echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}

else
{ try {
				$safe_value = $_GET['search'];

				$stmt = $db->query("SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogName LIKE '%".$safe_value."%' ");
				while($row = $stmt->fetch()){
					
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$row['blogID'].'">'.$row['blogName'].'</a></h1>';
						echo '<p>Posted by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
						echo '<p>'.$row['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$row['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
} 

		?>

	</div>


</body>
</html>
<?php 
$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start);

//execution time of the script
echo '<b>Database Responce Time:</b> '.$execution_time.' Seconds';

?>