<?php
	$uploadDir = "./image/phong";
	$error = array();
	$allowedExts= array("jpg","png", "gif", "jpeg", "svg");
	if(isset($_POST["upload"]))
	{
		$file = $_FILES["myfile"];
		$fileName = $file["name"];
		$tmpFile = $file["tmp_name"];
		$size = $file["size"];

		$arr = explode(".", $fileName);
		$ext = strtolower(end($arr));

		if(!in_array($ext, $allowedExts))
		{
			$error[]= "File extension .$ext is not allowed";
		}

		if($size > 4096000)
		{
			$error[] = "File size must smaller than 4MB";
		}
		if(empty($error))
		{
			move_uploaded_file($tmpFile, "$uploadDir/$fileName");
		}
		else
		{
			unlink($tmpFile);
		}
	}
	
?>

<h2><?= implode("<br/>", $error)?></h2>
<form method="POST" enctype="multipart/form-data">
	<input type="file" name="myfile" id="">
	<input type="submit" name="upload" value="Upload">
</form>

<?php
	$files = scandir($uploadDir);
	$files = array_diff($files, array(".", ".."));
	foreach ($files as $file) {
		echo "<img src='$uploadDir/$file' style='max-height: 128px; max-width:128px; padding: 10px;' onclick='selectImage(this);'/>";
	}
?>

<script type="text/javascript">
	function selectImage(elm)
	{
		window.opener.showImage(elm.src);
		close();
	}
</script>