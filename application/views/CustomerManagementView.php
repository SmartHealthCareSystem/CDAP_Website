
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-address-book"></i> Customers</h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Information Management</a></li>
      <li class="active">Customers</li> 
    </ul>
<div class="well well-style">
 <form action="CustomerManagement/customerDelete" method="post">    
<div class="btn-group col-lg-9 col-md-9">
   
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertModal">Insert</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdatetModal">Update</button>
<!--  <button type="button" class="btn btn-danger">Delete</button>-->
   <button type="submit" class="btn btn-danger">Delete</button>
    
</div>
     
<?php if($this->session->flashdata('errorsDelete')): ?>
<h5 style="color:red;">    
<?php echo ($this->session->flashdata('errorsDelete')); ?>
</h5> 
<?php endif; ?>
     
     
<input type="text" id="deleteEmail" name="deleteEmail" style="display:none">
 </form>
<div class="input-group col-lg-3 col-md-3">
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search ...">
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
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Address</th>
        <th>Contact No.</th>
        <th>Rfid Code</th>
      </tr>
    </thead>
    <tbody>
       <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/costomerTable',$data);
          
        ?>
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
        <h4 class="modal-title">Insert Customer</h4>
      </div>
      <div class="modal-body">          
       
        <?php
          
            $this->load->view('forms/CustomerInsert');
          
          ?>
          
          
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
           
       
        <?php
          
            $this->load->view('forms/CustomerUpdate');
          
          ?>
          
          
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
    $("#deleteEmail").val($(this).find('td:eq(2)').html());
    deleteEmail
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

