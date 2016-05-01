<?php 
$time_start = microtime(true);
set_time_limit(0);
?>
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
	$safe_value = $_GET['search'];
	$m = new MongoClient();
	$db = $m->database2;
	$collection = $db->rthree;

if(isset($_GET['blogName']) and isset($_GET['blogDescription']) and isset($_GET['tags']) and isset($_GET['authors'])) 
{ 
		try {	
				$i=0;
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));
				foreach ($cursor1 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				
				$safe_value2=(string)$safe_value;
					//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));
				$i=0;
				foreach ($cursor2 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$i=0;
				$cursor3 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor3 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$i=0;
				$cursor4 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor4 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}}

				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['blogDescription']) and isset($_GET['tags'])) 
{ 
		try {	$i=0;		
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));

				foreach ($cursor1 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$safe_value2=(string)$safe_value;
									//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));
$i=0;
				foreach ($cursor2 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$i=0;
				$cursor4 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor4 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}

			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['blogDescription'])) 
{ 
		try {	$i=0;		
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));

				foreach ($cursor1 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}

				$safe_value2=(string)$safe_value;
								//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));
$i=0;
				foreach ($cursor2 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 


else if(isset($_GET['blogName'])) 
{ 
	$safe_value = $_GET['search'];
	$m = new MongoClient();
	$db = $m->database2;
	$collection = $db->rthree;
	$cursor = $collection->find(array("blogName" => "$safe_value"));

	try{$i=0;
				foreach ($cursor as $document){
					$i=$i+1;
					if ($i<10){
					
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

} 
else if (isset($_GET['blogDescription']))
{ 
	$safe_value = $_GET['search'];
	$m = new MongoClient();
	$db = $m->database2;
	$collection = $db->rthree;
	$safe_value2=(string)$safe_value;
	//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor = $collection->find(array('blogDescription' => $where));
	

	try{		$i=0;
				foreach ($cursor as $document){
					
					$i=$i+1;
					if ($i<10){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}
else if (isset($_GET['tags']))
{ 
	$safe_value = $_GET['search'];
	$m = new MongoClient();
	$db = $m->database2;
	$collection = $db->rthree;
	$cursor = $collection->find(array("tagDescription" => "$safe_value"));

	try{$i=0;
				foreach ($cursor as $document){
					$i=$i+1;
					if ($i<10){
					
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}
else if (isset($_GET['authors']))
{ 

	$cursor = $collection->find(array("authorName" => "$safe_value"));

	try{$i=0;
				foreach ($cursor as $document){
					
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

}

else if(isset($_GET['blogName']) and isset($_GET['blogDescription']) and isset($_GET['authors'])) 
{ 
		try {			
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				$safe_value2=(string)$safe_value;
									//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				$cursor4 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor4 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['authors']) and isset($_GET['blogDescription']) and isset($_GET['tags'])) 
{ 
		try {			
				$cursor1 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				$safe_value2=(string)$safe_value;
								//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));
	
				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				$cursor4 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor4 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['tags'])) 
{ 
		try {			
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$cursor2 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogName']) and isset($_GET['authors'])) 
{ 
		try {			
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$cursor2 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['blogDescription']) and isset($_GET['tags'])) 
{ 
		try {			
				$safe_value2=(string)$safe_value;
								//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor1 = $collection->find(array('blogDescription' => $where));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$cursor2 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 


else if(isset($_GET['blogDescription']) and isset($_GET['authors'])) 
{ 
		try {			
				$safe_value2=(string)$safe_value;
								//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor1 = $collection->find(array('blogDescription' => $where));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$cursor2 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 

else if(isset($_GET['authors']) and isset($_GET['tags'])) 
{ 
		try {			
				$cursor1 = $collection->find(array("authorName" => "$safe_value"));

				foreach ($cursor1 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}

				$cursor2 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor2 as $document){
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}
				
				
			}
	catch(PDOException $e) {
		    echo $e->getMessage();
			}
} 


else
{ 
		try {	$i=0;
				$cursor1 = $collection->find(array("blogName" => "$safe_value"));
				foreach ($cursor1 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';

				}}
				
				$safe_value2=(string)$safe_value;
									//$where=array('blogDescription' => array('$regex' => new MongoRegex("/^$safe_value2/i")));
	 //$where= new MongoRegex("/^$safe_value2/i");
	 $where= new MongoRegex("/.*$safe_value2.*/");
	//$cursor = $collection->find($where);
	$cursor2 = $collection->find(array('blogDescription' => $where));
$i=0;
				foreach ($cursor2 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$cursor3 = $collection->find(array("authorName" => "$safe_value"));
$i=0;
				foreach ($cursor3 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}
				$i=0;
				$cursor4 = $collection->find(array("tagDescription" => "$safe_value"));

				foreach ($cursor4 as $document){
					$i=$i+1;
					if ($i<10){
					
					echo '<div>';
						echo '<h1><a href="view.php?id='.$document['blogID'].'">'.$document['blogName'].'</a></h1>';
						echo '<p>Posted by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
						echo '<p>'.$document['blogDescription'].'</p>';				
						echo '<p><a href="view.php?id='.$document['blogID'].'">Read More</a></p>';				
					echo '</div>';
					}
				}

				
			}
	catch(PDOException $e) {
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
echo '<b>Total Execution Time:</b> '.$execution_time.' Seconds';

?>