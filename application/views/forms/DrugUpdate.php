<?php $attributes = array('id' =>'drug_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdateDrug')): ?>
<script> $('#UpdatedDrugModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdateDrug')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Drug_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('Drug_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('DrugManagement/drugUpdate',$attributes);?>
   



<div class="form-group">
            <label class="control-label col-sm-3" for="UDrugId">Drug Id :</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="UDrugId" name="UDrugId" placeholder="Enter Drug Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UDrugname">Drug Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="UDrugName" name="UDrugName" placeholder="Enter Drug Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UDosage">Dosage:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UDosage" name="UDosage" placeholder="Enter Dosage">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="UPrice">Price:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="UPrice" name="UPrice" placeholder="Enter Price">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UFormulation">Formulation:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="text" id="UFormulation" name="UFormulation" placeholder="Enter Formulation">
                </label>
                </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UManufacturer">Manufacturer:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="UManufacturer" name="UManufacturer" placeholder="Enter Manufacturer" >
            </div>
          </div>
             
             
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>


<?php echo form_close();?>




