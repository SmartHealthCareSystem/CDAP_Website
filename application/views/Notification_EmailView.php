<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Heading of Notification here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/f79d16d09e.js"></script>
    <style>
        .wrapper{
            height: 100%;
        }
        .well_custm{
            background-color: white;
            box-shadow: 0px 0px 15px #B5B2B2;
            width: 74%;
            margin-left: 13%;
            height: 60%;
            height: 60%;
            position: absolute;
            margin-top: 7%
        }
        img{
            height: 30%;
            width: 30%;
            margin-left: 40px;
        }
        .logo{
            margin: 0px 0px 10px 15px;
            color: darkred;
            font-size: medium;
            font-weight: 600;
        }
        .invoice_head{
            text-align: center;
            font-size: x-large;
            font-weight: 600;
            margin-bottom: -10px;
            color: #5F5E5E;
        }
        .Patient_address{
            padding-left: 50%;
            padding-top: 10%;
        }
        .logo_full{
            padding-left: 5%;
        }
        .head_box{
            border: 2px solid #AD3F3F;
            margin: 1px;
            min-height: 50px;
            border-radius: 15px;
            text-align: center;
            padding: 10px;
        }
        .heading{
            background-color: #FBD3D3;
            width: 100%;
            margin-left: 0%;
            padding: 5px;
            font-weight: 600;
        }
        .content{
            background-color: #DEDCDC;
            width: 100%;
            margin-left: 0%;
            margin-top: 2px;
            padding: 5px;
            /*font-weight: 600;*/
        }
    </style>
</head>
<body>

</body>
<div class="wrapper">
    <div class="well well_custm">
        <div class="row">
            <p class="invoice_head">Invoice</p>
        </div>
        <div class="row">
            <div class="col-lg-6 logo_full">
                <img src="<?php echo base_url();?>assets/img/cross.png">
                <p class="logo">Smart Health Care System</p>
            </div>
            <div class="col-lg-6">
                <p class="Patient_address"><?php echo $FirstName." ".$LastName ?><br>
                    <?php echo $Address."."?>
                </p>

            </div>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="col-lg-1"></div>
            <div class="col-lg-2 head_box">
                <b>Invoice Date</b><br><?php echo $Date?>
            </div>
            <div class="col-lg-2 head_box">
                <b>Invoice Id</b><br><?php echo $InvoiceNo?>
            </div>
            <div class="col-lg-2 head_box">
                <b>Order Date</b><br><?php echo $UpdatedDate?>
            </div>
            <div class="col-lg-2 head_box">
                <b>Order Id</b><br><?php echo $OrderNo?>
            </div>
            <div class="col-lg-2 head_box">
                <b>Kiosk Id</b><br><?php echo $kioskId?>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <div style="border-bottom: 2px solid #8F8F8F;border-top: 2px solid #8F8F8F;width: 90%;margin-left: 6%;margin-top: 20px;">
            <div class="row heading">
                <div class="col-lg-3" style="text-align: center;color: darkred"> Item</div>
                <div class="col-lg-3" style="text-align: center;color: darkred"> Unit Price</div>
                <div class="col-lg-3" style="text-align: center;color: darkred"> Quantity</div>
                <div class="col-lg-3" style="text-align: center;color: darkred"> Total Price</div>

            </div>
            <div class="row content">
                <div class="col-lg-3" style="text-align: center;color: #302F2F"> <?php echo $DrugPackName?></div>
                <div class="col-lg-3" style="text-align: center;color: #302F2F"> <?php echo $UnitPrice?></div>
                <div class="col-lg-3" style="text-align: center;color: #302F2F"> <?php echo $Quantity?></div>
                <div class="col-lg-3" style="text-align: center;color: #302F2F"> <?php echo $TotalAmount?></div>

            </div>
        </div>
    </div>
</div>
</html>