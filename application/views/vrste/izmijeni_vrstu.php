<h1>Izmijeni vrstu aktivnosti</h1>
<hr/>
<?php echo validation_errors('<p class="text-error">'); ?>
 <?php echo form_open('vrste/izmjena/'.$ova_vrsta->id_vrste_aktivnosti.''); ?>

<p>
<?php echo form_label('Naziv:'); ?>
<?php
$data = array(
              'name'        => 'naziv_vrste_aktivnosti',
              'value'       => $ova_vrsta->naziv_vrste_aktivnosti
            );
?>
<?php echo form_input($data); ?>
</p>
<?php $data = array("value" => "Izmijeni",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<hr/>
<a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>vrste/brisanje/<?php echo $ova_vrsta->id_vrste_aktivnosti; ?>">Obriši ovu vrstu aktivnosti</a>
<?php echo form_close(); ?>
