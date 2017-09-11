<?php $attributes = array('id' =>'drugPack_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdatedrugPack')): ?>
<script> $('#UpdateddrugPackModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdatedrugPack')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('drugPack_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('drugPack_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('drugPack/drugPack_Update',$attributes);?>
   



<div class="form-group">
            <label class="control-label col-sm-3" for="UDrugPackId">DrugPackId :</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="UDrugPackId" name="UDrugPackId" placeholder="Enter DrugPack Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UDrugPackName">DrugPack Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="UDrugPackName" name="UDrugPackName" placeholder="Enter DrugPack Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UUnitPrice">UnitPrice:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UUnitPrice" name="UUnitPrice" placeholder="Enter UnitPrice">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="UInstruction">Instruction:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="UInstruction" name="UInstruction" placeholder="Enter Instruction">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UImage">Image:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="file" name="filename" accept="image/gif, image/jpeg, image/png" placeholder="Upload Image">
                </label>
                </div>
          </div>
            
<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
          
<?php echo form_close();?>




