<html>
        <head>
                <title>Reg-log</title>

                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
                <style>
                  .jumbotron{
                    height: 100%;
                  }
                table {
                border-collapse: collapse;
                }

                th,td {
                border: 1px solid black;
                }
                </style>
        </head>
        <body>
 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('/home')?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php

          if($loggedin) {
            ?> <p style="color: white;"><?php echo $_SESSION['email'];?></p>
          <li class="nav-item">
              <a class="nav-link" href="<?= site_url('/users/logout')?>">logout</a>
          </li>
          <?php
            }
          

          else {

          ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/users/register_view')?>">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/users/login_view')?>">Login</a>
          </li>

          <?php
            }
        ?>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>