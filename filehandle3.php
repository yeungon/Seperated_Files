<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
</head>
<body>


<?php

/*Written by Vuong December 2018*/

/*Get the file in the folder */
$folder = __DIR__.DIRECTORY_SEPARATOR."articlesmarkupwithheadings&articlenames";

$FileInTheFolder = scandir($folder);

//echo "<pre>";

$filelist = array_diff($FileInTheFolder, ['..', '.']);


/*Tách lấy tên file name trong string*/
function getName($string){
    
		    $start = strpos($string, "<articlename>");

		    $position = strpos($string, "</articlename>");
		    
		    $getstring =  substr($string, $start, $position);
		    $getstring = str_replace("<articlename>", "", $getstring);
		    		    
		    return $getstring;
 }


$filecount = 0;

foreach ($filelist as $singlefile) {

	$filecount++;
	
	$file = $folder.DIRECTORY_SEPARATOR.$singlefile;

	$filename = pathinfo($file)['filename'];

	$content = file_get_contents($file);
	
		
	/*Chuyển đổi format sang utf-8 nếu cần*/
	//$content = iconv('UTF-16LE', 'UTF-8', $content);
	
	//$content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
	
	/*Get the name of the file*/
	$nameofarticle =  getName($content);

	/*Get the abstraction and information*/
	$abs_tag =  strpos($content, "</abs>");
	$general =  substr($content, 0, $abs_tag);

	/*Get the introduction*/
	$int_tag =  strpos($content, "</int>");

	$introduction = substr($content, 0, $int_tag);

	$introduction = substr($introduction, $abs_tag, $int_tag);

	/*Get the methodology*/
	$met_tag =  strpos($content, "</met>");

	$methodology = substr($content, 0, $met_tag);

	$methodology = substr($methodology, $int_tag, $met_tag);

	/*Get the Results-Discussion*/
	$resdis_tag =  strpos($content, "</resdis>");

	$result_discuss = substr($content, 0, $resdis_tag);
	$result_discuss = substr($result_discuss, $met_tag, $resdis_tag);

	/*Get the conclusion*/
	$cont_tag =  strpos($content, "</con>");

	$conclusion = substr($content, $resdis_tag, $cont_tag);

	
	/*File trong thư mục chung --------------------------------------------*/

	$dir_file = "extractedfiles";
	$extension = ".txt";

	/*File name*/
	$general_file = "articleinfo_abs-".$nameofarticle.$extension;
	$introduction_file = "int-".$nameofarticle.$extension;
	$methodology_file = "met-".$nameofarticle.$extension;
	$result_discuss_file = "resdis-".$nameofarticle.$extension;
	$conclusion_file = "con-".$nameofarticle.$extension;

	/*Write the general txt*/
	$general_file = $dir_file.DIRECTORY_SEPARATOR.$general_file;
	if(!file_exists($general_file)){

		$fileopen = fopen($general_file, "w+b") OR die();
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $general);		
		fclose($fileopen);
					
	}
	
	/*Write the introduction_file txt*/
	$introduction_file = $dir_file.DIRECTORY_SEPARATOR.$introduction_file;
	if(!file_exists($introduction_file)){

		$fileopen = fopen($introduction_file, "w+b") OR die();
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $introduction);		
		fclose($fileopen);
					
	}

	/*Write the methodology_file txt*/
	$methodology_file = $dir_file.DIRECTORY_SEPARATOR.$methodology_file;
	if(!file_exists($methodology_file)){

		$fileopen = fopen($methodology_file, "w+b") OR die();
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $methodology);		
		fclose($fileopen);
					
	}

	/*Write the result_discuss_file txt*/
	$result_discuss_file = $dir_file.DIRECTORY_SEPARATOR.$result_discuss_file;
	if(!file_exists($result_discuss_file)){

		$fileopen = fopen($result_discuss_file, "w+b") OR die();
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $result_discuss);		
		fclose($fileopen);
					
	}

	/*Write the conclusion_file txt*/
	$conclusion_file = $dir_file.DIRECTORY_SEPARATOR.$conclusion_file;
	if(!file_exists($conclusion_file)){

		$fileopen = fopen($conclusion_file, "w+b") OR die();
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $conclusion);		
		fclose($fileopen);
					
	}
		
	die();
	
}

	$thongbao2 = "Wow, chạy rồi, $filecount file(s) lớn have/has been handled!";
	
	echo $thongbao2;

	//sleep(5);

	chuyentrang();

	function chuyentrang(){

		header( "refresh:5;url= done.php" ); 
		
	}
	





?>



</body>
</html>
