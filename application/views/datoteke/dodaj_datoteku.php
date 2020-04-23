<!DOCTYPE html>
<html>
<head>
	<title>Upload datoteke</title>
</head>
<body>
<?php
	//$fcl=array('class'=>'form-control','id'=>'form');
	echo form_open_multipart('datoteke/upload_datoteke/'.$this->uri->segment(3).'');
?>

    <input type="file" name="naziv_datoteke"/><br/>
	<input type="submit" name="upload" value="Upload">
<?php echo form_close(); ?>
</body>
</html>