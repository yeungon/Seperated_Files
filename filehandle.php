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
$folder = __DIR__.DIRECTORY_SEPARATOR."originaldata";

$FileInTheFolder = scandir($folder);

//echo "<pre>";

$filelist = array_diff($FileInTheFolder, ['..', '.']);

$filecount = 0;

foreach ($filelist as $singlefile) {

	$filecount++;
	
	$file = $folder.DIRECTORY_SEPARATOR.$singlefile;

	$filename = pathinfo($file)['filename'];

	$content = file_get_contents($file);

		
		
	/*Chuyển đổi format sang utf-8*/
	$content = iconv('UTF-16LE', 'UTF-8', $content);
	
	//$content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));

	
	$mainfile = explode('<', $content);
	
	/*Create a directory*/
	$dir_file = "seperateddata".DIRECTORY_SEPARATOR.$filename;

	if (!is_dir($dir_file)) {
	    mkdir($dir_file);         
	}


	$count = 0;

	foreach ($mainfile as $smallfile) {

		$count++;

		$text = $smallfile;

		/*Tạo file nằm trong từng thư mục*/
		$file_name_created = $count."_".$filename;

		/*File trong thư mục chung*/
		$file_in_shared_folder = $filename."-".$count;

		$file_in_shared_folder = "shareddata".DIRECTORY_SEPARATOR.$file_in_shared_folder;

		if(!file_exists($file_in_shared_folder)){

			$file_tao = $file_in_shared_folder.".txt";

			$fileopen = fopen($file_tao, "wb");
						
		}
		

 			
		/*Ghi nội dung vào file*/
		fwrite($fileopen, "$text");	
		
		fclose($fileopen);

		//https://oskararenasen.blogspot.com/2014/08/php-fwrite-with-utf-8-encoding.html


		/*File trong thư mục riêng*/		
		$file_created = $dir_file.DIRECTORY_SEPARATOR.$file_name_created;

		if(!file_exists($file_created)){

			$fileopen = fopen($file_created.".txt", "w+b");
						
		}
		
		/*Ghi nội dung vào file*/
		fwrite($fileopen, $text);	
		
		fclose($fileopen);
		
	}

	$thongbao = "Wow, $count file(s) have/has been created! <br>";

	echo $thongbao;

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