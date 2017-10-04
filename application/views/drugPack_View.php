
<div class="col-lg-9 col-md-9">
    <h2><i class="fa fa-address-book"></i> Drug Pack </h2>
    <hr>
    <ul class="breadcrumb">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Information Management</a></li>
      <li class="active">drugPack</li> 
    </ul>
<div class="well well-style">
<form action="DrugPack/drugPackDelete" method="post">
<div class="btn-group col-lg-9 col-md-9">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertdrugPackModal">Insert</button>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdateModal">Update</button>
  <button type="submit" class="btn btn-danger">Delete</button>
</div>
    
<?php if($this->session->flashdata('errorsDeletedrugPack')): ?>
<h5 style="color:red;">    
<?php echo ($this->session->flashdata('errorsDeletedrugPack')); ?>
</h5> 
<?php endif; ?>
     
     
<input type="text" id="deletedrugPack" name="deletedrugPack" style="display:none" >
 </form>
    
<div class="input-group col-lg-3 col-md-3">
    <input type="text" class="form-control" id="myInput" name="myInput" onkeyup="myFunction()" placeholder="Search ..." >
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
        <th>DrugPackId</th>
        <th>DrugPackName</th>
        <th>UnitPrice</th>
          <th>Instruction</th>
          <th>Image</th>
        
      </tr>
    </thead>
    <tbody>
      <?php          
          
           
            $data['tabledata']=$result;
          
            $this->load->view('tables/DrugPackTable',$data);
          
        ?>
    </tbody>
  </table>
  </div>
 </div>
</div>
<!--Insert drugPack Model start-->
<div id="InsertdrugPackModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
        
      <div class="modal-body">
        <?php
            $data['drugPackNames']=$drugPackNames;
            $this->load->view('forms/DrugPack_Insert',$data);
          
          ?>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Insert drugPack Model end-->
<!--Update drugPack Model start-->
<div id="UpdatetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update drugPack</h4>
      </div>
      <div class="modal-body">
        <?php
            $data['drugPackNames']=$drugPackNames;
            $this->load->view('forms/DrugPack_Update',$data);
          
          ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Update drugPack Model end-->

<!--Script for search start-->
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
 
  table = document.getElementById("myTable");
  tr = table.getElementById("tr");

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
     $("#deletedrugPack").val($(this).find('td:eq(0)').html());
   $("#UDrugPackId").val($(this).find('td:eq(0)').html());
   $("#UDrugPackName").val($(this).find('td:eq(1)').html());
    $("#UUnitPrice").val($(this).find('td:eq(2)').html());
    
    $("#UInstruction").val($(this).find('td:eq(3)').html());
    
    $("#UImage").val($(this).find('td:eq(4)').html());
   
});


</script>
<!--Script for search end-->
