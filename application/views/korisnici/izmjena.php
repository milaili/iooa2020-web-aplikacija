<h1>Vaši podaci:</h1>
<hr/>
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('korisnik/izmjena/' . $ovaj_korisnik->korisnik_id . ''); ?>

<p>
    <?php echo form_label('Ime:'); ?>
    <?php
    $data = array(
        'name' => 'ime_korisnika',
        'value' => $ovaj_korisnik->ime
    );
    ?>


    <?php echo form_input($data); ?>
</p>
<?php
$data = array("value" => "Izmijeni",
    "name" => "submit",
    "class" => "btn btn-primary");
?>
<p>
<?php echo form_submit($data); ?>
</p>
<hr/>
/* <a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>korisnici/brisanje/<?php echo $ovaj_korisnik->korisnik_id; ?>">Obriši svoj profil</a>*/
<?php echo form_close(); ?>

