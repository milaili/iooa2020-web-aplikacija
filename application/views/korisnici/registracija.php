<div class="row">
    <div class="col-sm-4">
        <h1> Registracija</h1>
        <p>Popunite polja kako biste kreirali korisnički račun</p>
        <br>

        <body>

            <?php echo validation_errors('<p class="text-error">'); ?>
            <?php echo form_open('korisnici/registracija'); ?>

            <div class="form-group">
                <?php echo form_label('Ime'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'ime',
                    'value' => set_value('ime'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_input($data); ?>
            </div>

            <div class="form-group">
                <?php echo form_label('Prezime'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'prezime',
                    'value' => set_value('prezime'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_input($data); ?>
            </div>


            <div class="form-group">
                <?php echo form_label('Email'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'email',
                    'value' => set_value('email'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_input($data); ?>
            </div>


            <div class="form-group">
                <?php echo form_label('Korisničko ime'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'username',
                    'value' => set_value('username'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_input($data); ?>
            </div>


            <div class="form-group">
                <?php echo form_label('Lozinka'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'password',
                    'value' => set_value('password'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_password($data); ?>
            </div>


            <div class="form-group">
                <?php echo form_label('Potvrda lozinke'); ?>
                <br>
                <?php
                $data = array(
                    'name' => 'password2',
                    'value' => set_value('password2'),
                    "class" => "form-control"
                );
                ?>
                <?php echo form_password($data); ?>
            </div>


            <?php
            $data = array("value" => "Potvrdi",
                "name" => "submit",
                "class" => "btn btn-primary");
            ?>

            <?php echo form_submit($data); ?>


    </div>

    <?php echo form_close(); ?>


</body>

</div>


</div>

