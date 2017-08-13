<?php $attributes = array('id' =>'drug_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsertDrug')): ?>
<script> $('#InsertDrugModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertDrug')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Drug_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('Drug_insert_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('DrugManagement/drugInsert',$attributes);?>


	<div class="form-group">
            <label class="control-label col-sm-3" for="IDrugId">Drug Id :</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="IDrugId" name="IDrugId" placeholder="Enter Drug Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IDrugName">Drug Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="IDrugName" name="IDrugName" placeholder="Enter Drug Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IDosage">Dosage:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IDosage" name="IDosage" placeholder="Enter Dosage">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="IPrice">Price:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="IPrice" name="IPrice" placeholder="Enter Price">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IFormulation">Formulation:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="text" id="IFormulation" name="IFormulation" placeholder="Enter Formulation">
                </label>
                </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IManufacturer">Manufacturer:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="IManufacturer" name="IManufacturer" placeholder="Enter Manufacturer" min="5">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="IManufactureDate">ManufactureDate:</label>
            <div class="col-sm-9"> 
              <input type="date" class="form-control" id="IManufactureDate" name="ItelCustomer" placeholder="Enter Manufacture Date." min="5">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IExpiryDate">Expiry Date:</label>
            <div class="col-sm-9"> 
                 <input type="date" class="form-control" id="IExpiryDate" name="IExpiryDate" placeholder="Enter Expiry Date" min="5">
            </div>
          </div>
             
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>


<?php echo form_close();?>