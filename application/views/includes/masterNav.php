<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Health Care System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/inStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/f79d16d09e.js"></script>
</head>
<body>
<nav class="navbar navbar-red">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><i class="fa fa-cart-plus fa-2x"></i>  Smart Health Care System</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#"><i class="fa fa-envelope fa-lg"><span class="badge badge-style">5</span></i></a></li>
      <li><a>|</a></li>


      <?php if($this->session->userdata('logged_in')): ?>
      <?php echo ($this->session->flashdata('login_unsuccess')); ?>
      



      <li class="active"><a href="#"><?php echo ($this->session->userdata('username')); ?></a></li>
      <li><a>|</a></li>
      
      <li class="active"><a href="<?php echo base_url();?>users/logout">Logout</a></li>
      
      <?php endif; ?>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-lg-3 col-md-3" style="height: 95vh;">
<div class="nav-side-menu">
    
    
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>Kiosk_Location">
                  <i class="fa fa-map fa-lg"></i> Kiosk Location
                  </a>
                  </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> Information management </a><i class="fa fa-chevron-down drop_icon" aria-hidden="true"></i>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="<?php echo base_url();?>DrugManagement">Drugs</a></li>
                    <li><a href="<?php echo base_url();?>drugPack">Drug Packs</a></li>
                    <li><a href="<?php echo base_url();?>Kiosk">Kiosk</a></li>
                    <li><a href="<?php echo base_url();?>CustomerManagement">Patients</a></li>
                    
                   
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Stock </a><i style="text-align:right" class="fa fa-chevron-down drop_icon" aria-hidden="true"></i>
                </li>  
                <ul class="sub-menu collapse" id="service">
                    <li><a href="#">Ware House</a></li>
                    <li><a href="<?php echo base_url();?>KioskStock">Kiosk Stock</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Reports</a><i style="text-align:right" class="fa fa-chevron-down drop_icon" aria-hidden="true"></i>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li><a href="#">Sales</a></li>
                    <li><a href="#">Trasaction</a></li>
                </ul>


                 <li>
                  <a href="<?php echo base_url();?>AboutApp">
                  <i class="fa fa-user fa-lg"></i> About App
                  </a>
                  </li>

            </ul>
     </div>
    </div>
</div>  


  <?php 


      $this->view($masterNav_view);


  ?>


</div>
<footer class="container-fluid text-center footer-bg">
  <p>@Smart Health Care System by <a href="https://www.SmartHealthCareSystem.com">www.SmartHealthCareSystem.com</a></p> 
</footer>
</body>
</html>
 