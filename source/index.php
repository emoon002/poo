<!DOCTYPE html>
<html>
<head>
<title>Score Board</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://scores.whospoop.in/rainbow.js"></script>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
	<script>
	
		$(function() {
		
		
			$('#foo').rainbow({animate:true,animateInterval:100,colors:['#FF0000','#f26522','#fff200','#00a651','#28abe2','#2e3192','#6868ff']});
		
		});
	$('#rainbow').rainbow({
    colors: [
        '#FF0000',
        '#f26522',
        '#fff200',
        '#00a651',
        '#28abe2',
        '#2e3192',
        '#6868ff'
    ],
    animate: true,
    animateInterval: 100,
    pad: false,
    pauseLength: 100
});
function startShit(){
var delay = 50;
var mydiv = document.getElementById('poo').innerHTML;
var myVar = setInterval(myTimer, delay);
var poocount = 0;
function myTimer() {
    if (poocount>=mydiv.length){
         poocount = 0;
    }
    var newText = mydiv.substring(0, poocount) + "💩" + mydiv.substring(poocount+1, mydiv.length);
    document.getElementById("poo").innerHTML = newText;
    poocount++;
}
};
	</script>
</head>

<body>

	<?php
		include "gosql.php";
		$scores = array(array("user","score","date","verified","verifier","verification"));
		$players = array();
		$playerlist = array("players");
		$newsore = array();
		$counter = 0;
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
			$row_cnt = $result->num_rows;
			while ($row = $result->fetch_assoc()){
				$newscore = array($row['user'],$row['score'],$row['date'],$row['verified'],$row['verifier'],$row['verification']);
				array_push($players,$row['user']);
				array_push($scores, $newscore);
			} 

		for ($i = 1;$i <= $row_cnt; $i++) {
			$target = array_search($scores[$i][0], $playerlist);
			if ($target===false){
				$counter++;
				array_push($playerlist,$scores[$i][0]);
			echo '<tr><td>';
			echo $counter;
			echo '</td><td>';
			if ($scores[$i][0] == "Noah Wilson"){
				echo '<div id="foo">'.$scores[$i][0].'</div>';
			}elseif ($counter==2){
				echo '<div id="poo">'.$scores[$i][0].'</div>';
				echo '<script type="text/javascript">',
     'startShit();',
     '</script>'
;
			}else{
				echo $scores[$i][0];
			}
			echo '</td><td>';
			echo $scores[$i][1];
			echo '</td><td>';
			echo $scores[$i][2];
			echo '</td><td class="centered">';
			#echo '<div class="score" id="score_'. $i .'">';
			echo '<div class="tooltip">';
			if ($scores[$i][3] == -1){
				$verification = $scores[$i][5];
				$verified = '<a href="verifications/'.$verification.'">🏠</a><span class="tooltiptext">Home Score';
			}elseif ($scores[$i][3] == 1){
				$verified = '🤘<span class="tooltiptext">Verified';
			}else{
				$verified = '🤔<span class="tooltiptext">Unverified';
			}
			echo $verified;
			echo '</span></div></td></tr>';
			}
		}
		echo '</table>';
		#echo '<img src="images/skeleton01.gif"><img src="images/noah.gif">';
	}
	echo '<br><br>For classic scoreboard, <a href="classic.php">click here</a>';
	mysqli_free_result($result);
	mysqli_close($db);
	?>
</body>
</html>