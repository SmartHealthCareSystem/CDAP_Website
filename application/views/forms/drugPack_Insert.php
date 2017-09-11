<?php $attributes = array('id' =>'drugPack_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsertdrugPack')): ?>
<script> $('#InsertdrugPackModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertdrugPack')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('drugPack_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('drugPack_insert_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('drugPack/drugPack_Insert',$attributes);?>


	<div class="form-group">
            <label class="control-label col-sm-3" for="IDrugPackId">DrugPackId :</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="IDrugPackId" name="IDrugPackId" placeholder="Enter DrugPack Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IDrugPackName">DrugPack Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="IDrugPackName" name="IDrugPackName" placeholder="Enter DrugPack Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IUnitPrice">UnitPrice:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IUnitPrice" name="IUnitPrice" placeholder="Enter UnitPrice">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="IInstruction">Instruction:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="IInstruction" name="IInstruction" placeholder="Enter Instruction">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IImage">Image:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="file" name="filename" accept="image/gif, image/jpeg, image/png" placeholder="Upload Image">
                </label>
                </div>
          </div>
 <div >
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InsertdrugModal">Drugs</button>
</div>  
         <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

<div id="InsertdrugModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
        
      <div class="modal-body">
        <?php
          
            $this->load->view('forms/customerDrug_insert');
          
          ?>
      </div>
        
     
    </div>

  </div>
</div>


<?php echo form_close();?>