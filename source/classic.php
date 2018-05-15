<!DOCTYPE html>
<html>
<head>
<title>Score Board</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
</head>
 
<body>
	<?php
		include "gosql.php";
		$i = 0;
		echo '<div class="body_Column">';
		echo '<div class="header">';
		if($result = $db->query("SELECT * FROM `highscores` LIMIT 1")){
			$row = $result->fetch_assoc();
			echo "<h1>" . $row["game"] . ' on ' . $row["platform"] . "</h1>";
		} else {
			echo '<h1>game on platform</h1>';
		}
		echo '</div>';
		echo '<div class="content_Area">';
		echo '<table style="width:550px"><tr>';
		echo '<th>Rank</th>';
		echo '<th>Player</th>';
		echo '<th>Score</th>';
		echo '<th>Date</th>';
		echo '<th>Verified</th></tr>';
		if($result = $db->query("SELECT * FROM  `highscores` ORDER BY score DESC")){
		while ($row = $result->fetch_assoc()) {
			$i++;
			echo '<tr><td>';
			echo $i;
			echo '</td><td>';
			echo $row['user'];
			echo '</td><td>';
			echo $row['score'];
			echo '</td><td>';
			echo $row['date'];
			echo '</td><td class="centered">';
			#echo '<div class="score" id="score_'. $i .'">';
			if ($row['verified'] == -1){
				$verified = '🤔';
			}elseif ($row['verified'] == 1){
				$verified = '🤘';
			}else{
				$verified = '🔥';
			}
			echo $verified;
			echo '</td></tr>';
		}
		echo '</table>';
		echo '<img src="images/skeleton01.gif"><img src="https://media.giphy.com/media/1lkF5OJeezodO/giphy.gif">';
	}
	mysqli_free_result($result);
	mysqli_close($db);
	?>
</body>
</html>