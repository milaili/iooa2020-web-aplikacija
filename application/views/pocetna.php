
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="<?php echo base_url() . 'assets/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <!--Display Messages-->
        <?php if ($this->session->flashdata('registracija')) : ?>
            <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('registracija'); ?></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('login_success')) : ?>
            <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('login_success'); ?></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('logged_out')) : ?>
            <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('logged_out'); ?></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('need_login')) : ?>
            <p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('need_login'); ?></p>
        <?php endif; ?>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-md-2 sidenav">
                    <?php $this->load->view('korisnici/login'); ?>
                </div>
                <div class="col-md-8 text-center"> 
                    <h1>Dobrodošli!</h1>
                    <p>Aplikacija za praćenje sportskih aktivnosti</p>

                </div>
            </div>

        </div>
    </body>
</html>
