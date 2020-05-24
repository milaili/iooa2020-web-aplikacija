<body>

    <?php echo validation_errors('<p class="text-error">'); ?>
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col col-lg-8">


                <h3>Vaši podaci</h3>
                <hr/>

                <?php if ($this->session->flashdata('korisnik_izmijenjen')) : ?>
                    <?php echo '<p class="text-success">' . $this->session->flashdata('korisnik_izmijenjen') . '</p>'; ?>
                <?php endif; ?>



                <?php foreach ($korisnici as $korisnik): ?>

                    <?php echo form_open('korisnici/izmjena/' . $korisnik->id_korisnika . ''); ?>

                    <div class="form-group">
                        <?php echo form_label('Ime'); ?>
                        <br>
                        <?php
                        $data = array(
                            'name' => 'ime_korisnika',
                            'value' => $korisnik->ime_korisnika,
                            'type' => 'text'
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>


                    <div class="form-group">
                        <?php echo form_label('Prezime'); ?>
                        <br>
                        <?php
                        $data = array(
                            'name' => 'prezime_korisnika',
                            'value' => $korisnik->prezime_korisnika
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>

                    <div class="form-group">
                        <?php echo form_label('E-mail'); ?>
                        <br>
                        <?php
                        $data = array(
                            'name' => 'email_korisnika',
                            'value' => $korisnik->email_korisnika
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>

                    <div class="form-group">
                        <?php echo form_label('Korisničko ime'); ?>
                        <br>
                        <?php
                        $data = array(
                            'name' => 'korisnicko_ime',
                            'value' => $korisnik->korisnicko_ime
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>

                    <?php
                    $data = array("value" => "Izmijeni",
                        "name" => "submit",
                        "class" => "btn btn-primary");
                    ?>
                    <p>
                    <?php echo form_submit($data); ?>
                    </p>
    <?php echo form_close(); ?>
<?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
<!-- <a onclick="return confirm('Da li ste sigurni?')" href="<?php echo base_url(); ?>korisnici/brisanje/<?php echo $ovaj_korisnik->korisnik_id; ?>">Obriši svoj profil</a> 




