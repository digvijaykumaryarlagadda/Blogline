 

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
 
  <div{ background-image: url(<?php echo $imageURL = 'D:\img.jpg'?>); }/>
</style>
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
				echo '<pre>';
   $m = new MongoClient();
   $db = $m->database2;
   $collection = $db->rthree;
    $cursor = $collection->find();
	set_time_limit(0);
	$i=0;

	foreach ($cursor as $document) {
			
			if ($i<50){
		echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
			echo '</div>';
			$i++;}
			else{break;}
  }
	?>
	</div>
</body>
</html>