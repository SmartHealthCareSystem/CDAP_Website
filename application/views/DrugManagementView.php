
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-address-book"></i> Drugs</h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Information Management</a></li>
      <li class="active">Drugs</li> 
    </ul>
<div class="well well-style">
<form action="DrugManagement/drugDelete" method="post">
<div class="btn-group col-lg-9 col-md-9">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertDrugModal">Insert</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdatetModal">Update</button>
  <button type="submit" class="btn btn-danger">Delete</button>
</div>
    
<?php if($this->session->flashdata('errorsDeleteDrug')): ?>
<h5 style="color:red;">    
<?php echo ($this->session->flashdata('errorsDeleteDrug')); ?>
</h5> 
<?php endif; ?>
     
     
<input type="text" id="deleteDrug" name="deleteDrug" style="display:none"  >
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
        <th>DrugId</th>
        <th>Drugname</th>
        <th>Dosage</th>
        <th>Price</th>
        <th>Formulation</th>
        <th>Manufacturer</th>
        
      </tr>
    </thead>
    <tbody>
      <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/DrugTable',$data);
          
        ?>
    </tbody>
  </table>
  </div>
 </div>
</div>
<!--Insert Drug Model start-->
<div id="InsertDrugModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Drug</h4>
      </div>
      <div class="modal-body">
        <?php
          
            $this->load->view('forms/Drug_Insert');
          
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Insert Drug Model end-->
<!--Update Drug Model start-->
<div id="UpdatetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Drug</h4>
      </div>
      <div class="modal-body">
        <?php
          
            $this->load->view('forms/DrugUpdate');
          
          ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Update Drug Model end-->

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
    $("#deleteDrug").val($(this).find('td:eq(0)').html());
   $("#UDrugId").val($(this).find('td:eq(0)').html());
   $("#UDrugName").val($(this).find('td:eq(1)').html());
   
    $("#UDosage").val($(this).find('td:eq(2)').html());
    $("#UPrice").val($(this).find('td:eq(3)').html());
      
    
    $("#UFormulation").val($(this).find('td:eq(4)').html());
 $("#UManufacturer").val($(this).find('td:eq(5)').html());
    
   //alert(value);    
});


</script>
<!--Script for search end-->
