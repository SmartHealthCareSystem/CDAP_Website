
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-address-book"></i> Kiosk </h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Information Management</a></li>
      <li class="active">Kiosk</li> 
    </ul>
<div class="well well-style">
<form action="Kiosk/delete_Kiosk" method="post">
<div class="btn-group col-lg-9 col-md-9">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertKioskModal">Insert</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdatetModal">Update</button>
  <button type="submit" class="btn btn-danger">Delete</button>
</div>
    
<?php if($this->session->flashdata('errorsDeleteKiosk')): ?>
<h5 style="color:red;">    
<?php echo ($this->session->flashdata('errorsDeleteKiosk')); ?>
</h5> 
<?php endif; ?>
     
     
<input type="text" id="deleteKiosk" name="deleteKiosk" style="display:none"  >
 </form>
    
<div class="input-group col-lg-3 col-md-3">
    <input type="text" class="form-control" id="myInput" name="myInput" onkeyup="myFunction()" placeholder="Search ...">
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
        <th>KioskId</th>
        <th>Location</th>
        <th>Address</th>
        
      </tr>
    </thead>
    <tbody>
      <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/KioskTable',$data);
          
        ?>
    </tbody>
  </table>
  </div>
 </div>
</div>
<!--Insert Kiosk Model start-->
<div id="InsertKioskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Kiosk</h4>
      </div>
      <div class="modal-body">
        <?php
          
            $this->load->view('forms/Kiosk_Insert');
          
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Insert Kiosk Model end-->
<!--Update Kiosk Model start-->
<div id="UpdatetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Kiosk</h4>
      </div>
      <div class="modal-body">
        <?php
          
            $this->load->view('forms/Kiosk_Update');
          
          ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Update Kiosk Model end-->

<!--Script for search start-->
<script>
function myFunction() {
  // Declare variables 
 var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
 filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
$("#myTable tr").click(function(){
   $(this).addClass('selected_row').siblings().removeClass('selected_row');  
     $("#deleteKiosk").val($(this).find('td:eq(0)').html());
   $("#UKioskId").val($(this).find('td:eq(0)').html());
   $("#ULocation").val($(this).find('td:eq(1)').html());
    $("#UAddress").val($(this).find('td:eq(2)').html());
   
});


</script>
<!--Script for search end-->
