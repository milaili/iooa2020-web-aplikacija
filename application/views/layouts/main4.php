<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="index.php"><title>Praćenje sportskih aktivnosti</title></a>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="<?php echo base_url(); ?>">LOGO</a>
          <div class="nav-collapse collapse">
					<ul class="nav">
            <div style="position:absolute; left:1500px; top:5px;"><p class="navbar-text pull-right">

              <?php if($this->session->userdata('logged_in')) : ?>
							 <li><?php echo $this->session->userdata('username');  ?></li>
							 <li><a href="<?php echo base_url(); ?>korisnici/logout">Odjava </a></li>
						 
							 <?php else : ?>
								<a href="<?php echo base_url(); ?>korisnici/registracija">Registracija</a>
            
             <?php endif; ?>
            </p>
						</div>
						
         
              <li><a href="<?php echo base_url(); ?>">Početna</a></li>
              <?php if($this->session->userdata('logged_in')) : ?>
								<li><a href="<?php echo base_url(); ?>vrste/index">Moje aktivnosti</a></li>  
								<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vrste aktivnosti
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>vrste/index">Vrste aktivnosti</a></li> 
          <li><a href="#">Unos vrste aktivnosti</a></li>
          
        </ul>
      </li> 
               <?php endif; ?>
							 
							</ul>
          </div>
        </div>
      </div>
    </div>



        <div class="span9">
  
			<?php $this->load->view($main_content); ?>
        </div>
		</div>
      

     
    </div>
</body>
</html>
