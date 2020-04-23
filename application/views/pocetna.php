<!--Display Messages-->
<?php if($this->session->flashdata('registracija')) : ?>
<p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('registracija'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('login_success')) : ?>
<p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('login_success'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
<p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('logged_out'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('need_login')) : ?>
<p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('need_login'); ?></p>
<?php endif; ?>




    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
          <div style="margin:10 10 3px 3px;">

			<?php $this->load->view('korisnici/login'); ?>
          </div>
          </div>
				</div>

<div class="offset4">
	<h1>Dobrodošli!</h1>
	<p>Aplikacija za praćenje sportskih aktivnosti</p>
</div>
</div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Copyright 2020</p>
      </footer>
    </div><!--/.fluid-container-->
</body>
</html>
