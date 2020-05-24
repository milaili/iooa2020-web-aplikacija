
<?php if ($this->session->userdata('logged_in')) : ?>
    <p>Prijavljeni ste kao <?php echo $this->session->userdata('username'); ?></p>

    <?php $attributes = array('id' => 'logout_form',
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

    <h3>Prijava</h3>

    <?php $attributes = array('id' => 'login_form',
        'class' => 'form-horizontal');
    ?>
        <?php echo form_open('korisnici/login', $attributes); ?>

    <p>
        <?php echo form_label('Korisničko ime'); ?>
        <?php
        $data = array(
            'name' => 'username',
            'placeholder' => 'Unesite korisničko ime',
            'style' => 'width:90%',
            'value' => set_value('username')
        );
        ?>
        <?php echo form_input($data); ?>
    </p>


    <p>
        <?php echo form_label('Lozinka'); ?>
        <?php
        $data = array(
            'name' => 'password',
            'placeholder' => 'Unesite lozinku',
            'style' => 'width:90%',
            'value' => set_value('password')
        );
        ?>
        <?php echo form_password($data); ?>
    </p>
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
