<body>
    <?php if ($this->session->userdata('logged_in')) : ?>
        <br>
        <p>Prijavljeni ste kao <?php echo $this->session->userdata('username'); ?></p>

        <?php
        $attributes = array('id' => 'logout_form',
            'class' => 'form-horizontal');
        ?>
        <?php echo form_open('korisnici/logout', $attributes); ?>

        <?php
        $data = array("value" => "Odjava",
            "name" => "submit",
            "class" => "btn btn-primary");
        ?>
        <?php echo form_submit($data); ?>
    <?php echo form_close(); ?>


<?php else : ?>

        <h2>Prijava</h2>
        <hr/>  

        <?php $attributes = array('id' => 'login_form');
        ?>

    <?php echo form_open('korisnici/login', $attributes); ?>

        <div class="form-group", style = "width:90%"> 
            <?php echo form_label('Korisničko ime'); ?>
            <?php
            $data = array(
                'name' => 'username',
                'placeholder' => 'Unesite korisničko ime',
                'value' => set_value('username'),
                "class" => "form-control"
            );
            ?>
    <?php echo form_input($data); ?>
        </div>


        <div class="form-group", style = "width:90%">
            <?php echo form_label('Lozinka'); ?>
            <?php
            $data = array(
                'name' => 'password',
                'placeholder' => 'Unesite lozinku',
                'value' => set_value('password'),
                "class" => "form-control"
            );
            ?>
    <?php echo form_password($data); ?>
        </div>
        <br /> 
        <p>

            <?php
            $data = array(
                "name" => "submit",
                "class" => "btn btn-primary",
                "value" => "Prijava"
            );
            ?>
        <?php echo form_submit($data); ?>
        </p>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php echo form_close(); ?>

<?php endif; ?>
</body>