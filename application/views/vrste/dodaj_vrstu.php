<h1>Dodaj vrstu aktivnosti</h1>
<p>Popunite sva polja kako bi kreirali novu vrstu aktivnosti</p>
<?php echo validation_errors('<p class="text-error">'); ?>
 <?php echo form_open('vrste/unos'); ?>
<p>
<?php echo form_label('Naziv:'); ?>
<?php
$data = array(
              'name'        => 'naziv',
              'value'       => set_value('naziv')
            );
?>
<?php echo form_input($data); ?>
</p>

<?php $data = array("value" => "Dodaj vrstu",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
