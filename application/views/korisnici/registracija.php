<div>
<h1> Registracija</h1>
<p>Popunite polja kako biste kreirali korisnički račun</p>
<br>

<body>


<?php echo validation_errors('<p class="text-error">'); ?>
 <?php echo form_open('korisnici/registracija'); ?>
<p>
<?php echo form_label('Ime:'); ?>
<?php
$data = array(
              'name'        => 'ime',
              'value'       => set_value('ime')
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('Prezime:'); ?>
<?php
$data = array(
              'name'        => 'prezime',
              'value'       => set_value('prezime')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Email:'); ?>
<?php
$data = array(
              'name'        => 'email',
              'value'       => set_value('email')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Korisničko ime:'); ?>
<?php
$data = array(
              'name'        => 'username',
              'value'       => set_value('username')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Lozinka:'); ?>
<?php
$data = array(
              'name'        => 'password',
              'value'       => set_value('password')
            );
?>
<?php echo form_password($data); ?>
</p>


<p>
<?php echo form_label('Potvrda lozinke:'); ?>
<?php
$data = array(
              'name'        => 'password2',
              'value'       => set_value('password2')
            );
?>
<?php echo form_password($data); ?>
</p>


<?php $data = array("value" => "Potvrdi",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>

</div>

<?php echo form_close(); ?>

  </body>

