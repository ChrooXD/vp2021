<?php
	$author_name = "6una s66mise leht"; 
	//echo $author_name; //print
	//vaatan praegust ajahetke
	$full_time_now = date ("d.m.Y H:i:s");
	//vaatan nädalapäeva
	$weekday_now = date("N");
	//echo $weekday_now;
	$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"]; 
	echo $weekday_names_et[$weekday_now - 1];
	//küsime ainult tunde
	$hour_now = date("H");
	if($weekday_now <= 5) {
		$day_category = "6una t66p2ev"; 
	} else {
		
		$day_category = "vaba 6una s66mise p2ev";
	}
	if($hour_now <8 || $hour_now >=23) {
		$hour_category = "uneaeg";
	} elseif($hour_now >=8 && $hour_now <=18 && $day_category = "6una t66p2ev") {
		$hour_category = "tundide aeg";
	} else {
		$hour_category = "vaba 6una s66mise aeg";
	}		
	$day_category = "6una s66mise p2ev"; 
	$month_category = "6una s66mise kuu";
	$year_category = "6una s66mise aasta";
	
	
                    											// <  > <=   >= == ===  != v2iksem, suurem v2iksem v6rdne, kontrollib, super kontrollib, ei ole v6rdne
																
																//lisan lehele juhusliku foto
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
	
	//if($hour_now >=8 and $hour_now <= 18) 
	//if($hour_now <=7 and $hour_now > 23)
	
	?>

<!DOCTYPE html>
<html lang="sa">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?> veebiprogrammeerimine</title
</head>
<body>
	<h1><?php echo $author_name; ?></h1>
	<p>See veebileht on valminud 6una s66mise raames ning on pyhendatud 6una s66jatele : D</p>
	<p>Õppetöö toimub <a href="https://azerbajancar.com/">Tallinna Ülikooli DTI instituudis</a>.</p>
	<img src="apple-man-eating.gif" alt="Tallinna Ülikooli Mare õppehoone peauks" width="600">
	<p>6una s66mise hetk <span><?php echo $weekday_names_et[$weekday_now - 1]. ", " . $full_time_now ." on " .$day_category; ?></span> .</p>
	<p>praegu on: <span><?php echo $hour_category ?></span> .</p>
	<?php echo $photo_html; ?>
</body>
</html>