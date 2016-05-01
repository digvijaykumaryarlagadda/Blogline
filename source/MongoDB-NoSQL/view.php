<?php 
//ini_set('max_execution_time', 300);
set_time_limit(0);
$m = new MongoClient();
   $db = $m->database2;
   $collection = $db->rthree;
    $cursor = $collection->find();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php 
				foreach ($cursor as $document) {

				echo $document['blogName'];
				break;}?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">


		<p><a href="./">Back to blog index</a></p>
		<hr />

		<?php	
		$m = new MongoClient();
   $db = $m->database2;
   $collection = $db->rthree;
    $cursor = $collection->find();
		set_time_limit(0);
			foreach ($cursor as $document) {

			echo '<div>';
				echo '<h1>'.$document['blogName'].'</h1>';
				echo '<p>Written by '.$document['authorName'].' on '.date('jS M Y', strtotime($document['blogdate'])).'</p>';
				echo '<p>'.$document['blogDescription'].'</p>';				
			echo '</div>';
			break;
			}
		?>
		
		
		<h3>Comments</h3>
		<?php
		$m = new MongoClient();
   $db = $m->database2;
   $collection = $db->rthree;
    $cursor = $collection->find();

	foreach ($cursor as $document) {
			
			echo '<div>';
				echo '<p>comment by '.$document['commentAuthor'].' on '.date('jS M Y', strtotime($document['commentDate'])).'</p>';
				echo '<p>'.$document['commentDescription'].'</p>';				
			echo '</div>';
			break;
			}
		?>
		

	</div>

</body>
</html>