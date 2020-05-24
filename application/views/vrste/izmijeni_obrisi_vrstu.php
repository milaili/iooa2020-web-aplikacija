<body>

    <?php echo validation_errors('<p class="text-error">'); ?>
    <div class="container">

<div class="row justify-content-md-center">
<div class="col col-lg-6">
<h1>Izmijeni vrstu aktivnosti</h1>
<hr/>
<?php echo validation_errors('<p class="text-error">'); ?>
 <?php echo form_open('vrste/izmjena/'.$ova_vrsta->id_vrste_aktivnosti.''); ?>

<div class="form-group">
<label>Naziv:  </label>
<?php
$data = array(
              'name'        => 'naziv_vrste_aktivnosti',
              'value'       => $ova_vrsta->naziv_vrste_aktivnosti,
              'type'         => 'text'
            ); 
?>
<?php echo form_input($data); ?>


<?php $data = array("value" => "Izmijeni",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
  
    <?php echo form_submit($data); ?>
    
    </div>
<hr/>
<a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>vrste/brisanje/<?php echo $ova_vrsta->id_vrste_aktivnosti; ?>">Obriši ovu vrstu aktivnosti</a>
<?php echo form_close(); ?>
</div>
</div>
</div>
</body>