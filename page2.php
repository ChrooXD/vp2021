<?php
	$author_name = "6una s66mise leht"; 
	//echo $author_name; //print
	//vaatan praegust ajahetke 
	//vaatan 
	//var_dump($_POST);
                    											// <  > <=   >= == ===  != v2iksem, suurem v2iksem v6rdne, kontrollib, super kontrollib, ei ole v6rdne
	$today_html = null;	//$today_html = "";		//lisan lehele juhusliku foto
	$adjective_error = null;
	$todays_adjective = null;
	//kontrollin kas inimene on submitti vajutanud 
	if(isset($_POST["submit_todays_adjective"])){
		//echo "klikiti nupule";
		$today_html = "<p>t2nane p2ev on " .$_POST["todays_adjective_input"] ." .</p>";
		if(!empty($_POST["todays_adjective_input"])){
			$today_html = "<p>t2nane p2ev on " .$_POST["todays_adjective_input"] . ".</p>";
		} else { 
		$todays_adjective_error = "palun s66ge 6una";
	}
	}
	$photo_dir = "photos/";
	// loen kataloogi sisu
	//$all_files = scandir($photo_dir);
	$all_files = array_slice(scandir($photo_dir), 2);
	//echo $all_files;
	$all_photos = [];
	$allowed_photo_types = ["image/jpeg", "image/png", "image/gif"];
	foreach($all_files as $file){
		$file_info = getimagesize($photo_dir .$file);
		if(isset($file_info["mime"])) {
			if(in_array($file_info["mime"], $allowed_photo_types)) {
				array_push($all_photos, $file);
			} //if in array lõppeb
		} //if isset lõppeb
	} //foreach lõppeb
	
	//kontrollin ja võtan ainult fotod
	
	$file_count = count($all_photos);
	$photo_num = mt_rand(0, $file_count - 1);
	//echo $photo_num; 
	//<img src="photos/oadkella.jpg" alt="Tallinna Ülikool">
	$photo_html = '<img src="' .$photo_dir .$all_photos[$photo_num] . '"alt="Tallinna Ülikool">';
	$photo_list_html = "\n </ul> \n";
	//if($hour_now >=8 and $hour_now <= 18) 
	//if($hour_now <=7 and $hour_now > 23)
	//tsükkel 
	//for($i=algväärtus; $i < piirväärtus; $i muutumine) {...}
	
	//<ul>
	//<li>pilt.jpg</li>
	//... <li>pildifail.png</li>
	//</ul>
	
	for($i = 0; $i < $file_count; $i ++) {
	$photo_list_html .= "<li>" .all_photos[$i] ."</li>";	
	}
	$photo_list_html .= "<ul>";
	
	
	$photo_select_html = '<select name="photo_select">' .</n>;
	for($i = 0; $i < $file_count; $i ++) {
	$photo_select_html .= '<option value="' .$i .'">' .$all_photos[$i] ."</option> /n";
	}
	$photo_select_html .= "</select>"
	?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?> veebiprogrammeerimine</title
</head>
<body>
	<h1><?php echo $author_name; ?></h1>
	<p>See veebileht on valminud 6una s66mise raames ning on pyhendatud 6una s66jatele : D</p>
	<p>Õppetöö toimub <a href="https://azerbajancar.com/">Tallinna Ülikooli DTI instituudis</a>.</p>
	<img src="apple-man-eating.gif" alt="Tallinna Ülikooli Mare õppehoone peauks" width="600">
	<!ekraanivorm-->
	<form method="POST">
	<input type="text" name="todays_adjective_input" placeholder="kirjuta siia et syya 6una" value="<?php echo $todays_adjective; ?>">
	<input type="submit" name="todays_adjective_input" value="s66 6una">
	<span><?php echo $todays_adjective_error; ?></span>
	</form>
	<?php echo $today_html; ?>
	<hr>
	
	<form mehtod="POST">
		<?php echo $photo_select_html; ?>
	</form>
	<?php 
	echo $photo_html;
	echo $photo_list_html;
	?>
</body>
</html>