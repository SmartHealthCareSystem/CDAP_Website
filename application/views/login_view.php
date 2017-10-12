<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Health Care System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/inStyle.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/loginbg.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/f79d16d09e.js"></script>

</head>
<body>
<div class="row-login">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        	<img src="<?php echo base_url();?>assets/img/cross.png" class="img-login">  
      </div>
      <div class="panel-body">


        <?php $this->load->view('users/Login_view');?>

         
      </div>
    </div>
<!--    <i class="fa fa-caret-square-o-right img-round fa-5x" aria-hidden="true"></i>-->
</div>
</body>
    
</html>