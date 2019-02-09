<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
</head>
<body>


<?php

/*Written by Vuong December 2- 2019*/

/*Get the file in the folder */
$folder = __DIR__.DIRECTORY_SEPARATOR."fileset3-annotatedsections";

$folderextracted = __DIR__.DIRECTORY_SEPARATOR."extracted";

$FileInTheFolder = scandir($folder);

$filelist = array_diff($FileInTheFolder, ['..', '.']);


$filecount = 0;

foreach ($filelist as $singlefile) {

	$filecount++;
	
	$file = $folder.DIRECTORY_SEPARATOR.$singlefile;
	
	$filename = pathinfo($file)['filename'];

	$content = file_get_contents($file);

		
	#Create the new folder
	$newfolder = $folderextracted.DIRECTORY_SEPARATOR.$filename;

	if(!is_dir($newfolder)){
		mkdir($newfolder, 0700);	
	}
		
	/*Xử lý theo từng loại file*/
	if($filename == "conclusion-annotated"){


		$filecontent = explode("<con-", $content);

		$count = -1;

		foreach ($filecontent as $filewrite) {

			$count++;

			/*Get the name of the file*/
			$pos = strpos($filewrite, ">");
			$subname = substr($filewrite, 0, $pos);
			
			/*Create the file*/
			$general_file = $newfolder.DIRECTORY_SEPARATOR.$count."_".$subname.".txt";

			if(!file_exists($general_file)){

				$fileopen = fopen($general_file, "w+b") OR die();
				
				/*Write the content to the file*/
				if (!empty($filewrite)) {
					fwrite($fileopen, $filewrite);		
					fclose($fileopen);
				}
							
			}
		}
	

	}

	if ($filename == "introduction-annotated"){

		$filecontent = explode("<int-", $content);

		$count = -1;

		foreach ($filecontent as $filewrite) {

			$count++;

			/*Get the name of the file*/
			$pos = strpos($filewrite, ">");
			$subname = substr($filewrite, 0, $pos);
			
			/*Create the file*/
			$general_file = $newfolder.DIRECTORY_SEPARATOR.$count."_".$subname.".txt";

			if(!file_exists($general_file)){

				$fileopen = fopen($general_file, "w+b") OR die();
				
				/*Write the content to the file*/
				if (!empty($filewrite)) {
					fwrite($fileopen, $filewrite);		
					fclose($fileopen);
				}
							
			}
		}

				
	}

	if ($filename == "method-annotated") {

		$filecontent = explode("<met-", $content);

		$count = -1;

		foreach ($filecontent as $filewrite) {

			$count++;

			/*Get the name of the file*/
			$pos = strpos($filewrite, ">");
			$subname = substr($filewrite, 0, $pos);
			
			/*Create the file*/
			$general_file = $newfolder.DIRECTORY_SEPARATOR.$count."_".$subname.".txt";

			if(!file_exists($general_file)){

				$fileopen = fopen($general_file, "w+b") OR die();
				
				/*Write the content to the file*/
				if (!empty($filewrite)) {
					fwrite($fileopen, $filewrite);		
					fclose($fileopen);
				}
							
			}
		}
		
	}

	if ($filename == "results_discussion-annotated") {

		$filecontent = explode("<resdis-", $content);

		$count = -1;

		foreach ($filecontent as $filewrite) {

			$count++;

			/*Get the name of the file*/
			$pos = strpos($filewrite, ">");
			$subname = substr($filewrite, 0, $pos);
			
			/*Create the file*/
			$general_file = $newfolder.DIRECTORY_SEPARATOR.$count."_".$subname.".txt";

			if(!file_exists($general_file)){

				$fileopen = fopen($general_file, "w+b") OR die();
				
				/*Write the content to the file*/
				if (!empty($filewrite)) {
					fwrite($fileopen, $filewrite);		
					fclose($fileopen);
				}
							
			}
		}
		
	}


		
		
}

	echo "Wow, chạy rồi, $filecount file(s) lớn have/has been handled!";
	

	//sleep(5);

	chuyentrang();

	function chuyentrang(){

		header( "refresh:5;url= done.php" ); 
		
	}
	




?>



</body>
</html>
