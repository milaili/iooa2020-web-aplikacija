<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

<style>

a { display: inline-block;
  padding: 10px 15px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #2bbc48;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;}
</style>
</head>
<body>
    <div class="container">
        <h1>Download dokumenata</h1>
<div class="row">
<?php if(!empty($datoteke)){ foreach($datoteke as $frow){ ?>
<div class="file-box">
        <div class="preview">
            <embed src="<?php echo base_url().'uploads/datoteke/'.$frow['naziv_datoteke']; ?>">
        </div>
        <a href="<?php echo base_url().'datoteke/download/'.$frow['idDatoteke']; ?>" class="dwn">Download</a>
    </div>
</div>
<?php } } ?>
    </div>
</body>
</html>