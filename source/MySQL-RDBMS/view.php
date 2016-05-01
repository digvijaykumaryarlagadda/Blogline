<?php 
//ini_set('max_execution_time', 300);
set_time_limit(0);
require('includes/config.php'); 

$stmt = $db->prepare('SELECT * FROM blogs JOIN authors ON blogs.authorID = authors.authorID WHERE blogID = :blogID');
$stmt->execute(array(':blogID' => $_GET['id']));
$row = $stmt->fetch();

$stmt2 = $db->prepare('select commentDescription, commentDate, authorName,blogID

FROM 
(SELECT 
    blogs.blogID,
    commentDescription,
    commentDate,
    authorName
FROM
    (SELECT 
        commentDescription, commentDate, authorName, blogID
    FROM
        (SELECT 
        commentDescription, commentDate, authorID, blogID
    FROM
        (SELECT 
        commentID, blogID
    FROM
        (SELECT 
        commentID, blogs.blogID
    FROM
        blogid_commentid
    JOIN blogs ON blogid_commentid.blogID = blogs.blogID) AS temptable1) AS temptable2
    JOIN comments ON temptable2.commentID = comments.commentID) AS temptable3
    JOIN authors ON temptable3.authorID = authors.authorID) AS temptable4
        JOIN
    blogs ON temptable4.blogID = blogs.blogID) as temptable5
	where temptable5.blogID=:blogID');
	$stmt2->execute(array(':blogID' => $_GET['id']));

$row2= $stmt2->fetch();



//if post does not exists redirect user.
if($row['blogID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['blogName'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">


		<p><a href="./">Back to blog index</a></p>
		<hr />

		<?php	
		set_time_limit(0);
			echo '<div>';
				echo '<h1>'.$row['blogName'].'</h1>';
				echo '<p>Written by '.$row['authorName'].' on '.date('jS M Y', strtotime($row['blogdate'])).'</p>';
				echo '<p>'.$row['blogDescription'].'</p>';				
			echo '</div>';
		?>
		
		
		<h3>Comments</h3>
		<?php
		
			echo '<div>';
				echo '<p>comment by '.$row2['authorName'].' on '.date('jS M Y', strtotime($row2['commentDate'])).'</p>';
				echo '<p>'.$row2['commentDescription'].'</p>';				
			echo '</div>';
		?>
		

	</div>

</body>
</html>