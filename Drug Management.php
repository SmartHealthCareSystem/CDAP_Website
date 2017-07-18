<?php
    include 'includes/masterNav.php';
?>

<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-address-book"></i> Cutomers</h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Information Management</a></li>
      <li class="active">Drug</li> 
    </ul>
<div class="well well-style">
    
<div class="btn-group col-lg-9 col-md-9">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertModal">Insert</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdatetModal">Update</button>
  <button type="button" class="btn btn-danger">Delete</button>
</div>
<div class="input-group col-lg-3 col-md-3">
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search By  Drug name...">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
<div class="table-responsive">          
  <table class="table table-hover" id="myTable">
    <thead class="thead-default">
      <tr>
        <th>Drug ID</th>
        <th>Drug Name</th>
        <th>Dosage</th>
        <th>Price</th>
        <th>Formulation</th>
        <th>Manufacturer</th>
        <th>Manufacture Date</th>
        <th>Expiry Date</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Pitt</td>
        <td>Anna</td>
        <td>Pitt@gmail.com</td>
        <td>355</td>
        <td>Male</td>
        <td>21</td>
        <td>35,hi,str</td>
        <td>0771234567</td>
         
      </tr>
      <tr>
        <td>Patt</td>
        <td>Anna</td>
        <td>Pitt@gmail.com</td>
        <td>355</td>
        <td>Female</td>
        <td>21</td>
        <td>35,hi,str</td>
        <td>0771234567</td>
       
      </tr>
      <tr>
        <td>Putt</td>
        <td>Anna</td>
        <td>Pitt@gmail.com</td>
        <td>355</td>
        <td>Female</td>
        <td>21</td>
        <td>35,hi,str</td>
        <td>0771234567</td>
        
      </tr>
    </tbody>
  </table>
  </div>
 </div>
</div>
<!--Insert customer Model start-->
<div id="InsertModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Drug</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-3" for="Ifdid">Drug ID:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="Ifdid" placeholder="Enter Drug ID">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ifdname">Drug Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ifdname" placeholder="Enter Drug Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ifdosage">Dosage:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="Ifdosage" placeholder="Enter Dosage">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="Ifprc">Price:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="Ifprc" placeholder="Enter Price">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ifml">Formulation:</label>
            <div class="col-sm-9"> 
               <input type="text" class="form-control" id="Ifml" placeholder="Enter Formulation">
            </div>
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ifmanf">manufacturer:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="Ifmanf" placeholder="Enter manufacturer" min="5">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="Ifmnfdate">manufacture date:</label>
            <div class="col-sm-9"> 
              <input type="date" class="form-control" id="Ifmnfdate" placeholder="Enter manufacturer date" min="5">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ifexpdate">Expiry Date:</label>
            <div class="col-sm-9"> 
                <input type="date" class="form-control" id="Ifexpdate" placeholder="Enter Expiry Date" min="5" cols="12" rows="4">
            </div>
          </div>
             
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Insert customer Model end-->
<!--Update customer Model start-->
<div id="UpdatetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Customer</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-3" for="Ufname">First Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ufname" placeholder="Enter First Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ulname">Last Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ulname" placeholder="Enter Last Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Uemail">Email:</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="Uemail" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="Upwd">Password:</label>
            <div class="col-sm-9"> 
              <input type="password" class="form-control" id="Upwd" placeholder="Enter password">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UgenradioM">Gender:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="radio" id="UgenradioM" name="Ugenradio">Male</label>
                <label class="radio-inline"><input type="radio" name="Ugenradio" id="UgenradioF">Female</label>
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Uage">Age:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="Uage" placeholder="Enter Age" min="5">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="UtelCustomer">Contact No:</label>
            <div class="col-sm-9"> 
              <input type="tel" class="form-control" id="UtelCustomer" placeholder="Enter Contact No." min="5">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UaddCustomer">Address:</label>
            <div class="col-sm-9"> 
                <textarea class="form-control" id="UaddCustomer" placeholder="Enter Address" min="5" cols="12" rows="4">hi</textarea>
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="Urfid">RFID code:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="Urfid" placeholder="Enter RFID code">
            </div>
          </div>
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Update customer Model end-->

<!--Script for search start-->
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
$("#myTable tr").click(function(){
   $(this).addClass('selected_row').siblings().removeClass('selected_row');    
   $("#Ufname").val($(this).find('td:eq(0)').html());
   $("#Ulname").val($(this).find('td:eq(1)').html());
    $("#Uemail").val($(this).find('td:eq(2)').html());
    $("#Upwd").val($(this).find('td:eq(3)').html());
    
    if($(this).find('td:eq(4)').html()=="Female")
        $("#UgenradioF").attr('checked',true);
        //alert(this).find('td:eq(4)').html()=="Male");
    else
        $("#UgenradioM").attr('checked',true);  
    
    $("#Uage").val($(this).find('td:eq(5)').html());
    $("#UaddCustomer").text($(this).find('td:eq(6)').html());
    $("#UtelCustomer").val($(this).find('td:eq(7)').html());
    $("#Urfid").val($(this).find('td:eq(8)').html());
   //alert(value);    
});


</script>
<!--Script for search end-->

<?php
    include 'includes/masterFoot.php';
?>