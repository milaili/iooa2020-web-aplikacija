<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sportske aktivnosti</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="https://i.ibb.co/NNNTKDr/logo.png" width="30" height="30" class="d-inline-block align-top" alt=" LOGO "></a>
                    </div>

                    <ul class="nav navbar-nav">
                        <li ><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span> Početna</a></li>
                        <?php if ($this->session->userdata('logged_in')) : ?>

                            <li><a  href="<?php echo base_url(); ?>aktivnosti2">Moje aktivnosti</a> </li>
                            <li ><a href="<?php echo base_url(); ?>vrste">Vrste aktivnosti </a>	  </li>
                        </ul>



                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
                                    <?php echo $this->session->userdata('username'); ?> <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                    <li><?= anchor('korisnici/index', 'Profil') ?></li>
                                    <li class="divider"></li>
                                    <li><?= anchor('korisnici/logout', 'Odjava') ?> </li>
                                </ul>

                            <?php else : ?>  



                            <li><a href="<?php echo base_url(); ?>korisnici/login"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>
                            <li><a href="<?php echo base_url(); ?>korisnici/registracija"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>

                        </ul>


                    <?php endif; ?>



                </div>


            </nav>
        </header>
        <main>     
            <div class="container-fluid text-center">    
                <div class="row content">
                    <div class="col-md-12 text-left"> 

                        <?php $this->load->view($main_content); ?>

                    </div>
                </div>
            </div>

        </main>

        <footer class="page-footer text-center blue">
            <p>&copy; Copyright 2020  Mila Ilijević </p>
        </footer>

    </body>
</html>


<style>

    body{
        background-image: url('https://i.ibb.co/svhJb5B/back.png'); 
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position:  bottom; 
        background-size: cover;
    }

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
        margin-bottom: 0;
        border-radius: 5;
        background-color: #555;
        color: white;
        width: 100%;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 30px;
        background-color: #f1f1f1;
        height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: blue;
        padding: 7px;
        bottom: 0;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        z-index: 20;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }
        .row.content {height:auto;} 
    }
</style>
