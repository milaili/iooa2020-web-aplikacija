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
        <div class="col-xs-2 sidenav">
            <?php $this->load->view('korisnici/login'); ?>
        </div>
        <div class="col-sm-8 text-left"> 
            <h1>Dobrodošli!</h1>
            <p>Aplikacija za praćenje sportskih aktivnosti</p>

        </div>
    </div>
</div>


