
<?php 
//ini_set('max_execution_time', 300);
set_time_limit(0);
require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
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

	<div class="container-1">
		<input id="blogName" type="checkbox" value="1" name="blogName"/> Blog title      
		<input id="blogDescription" type="checkbox" value="2" name="blogDescription"/> Blog content   
		<input id="tags" type="checkbox" value="3" name="tags"/> Tags    
		<input id="authors" type="checkbox" value="4" name="authors"/> Authors 
	</div>
</div>
	</form>

<div id="wrapper">

		<h1>Blog posts</h1>
		<hr />

		<?php
		//ini_set('max_execution_time', 300); 
			set_time_limit(0);
			try {

				$stmt = $db->query('SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID ORDER BY blogID LIMIT 25');
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
		?>

	</div>


</body>
</html>