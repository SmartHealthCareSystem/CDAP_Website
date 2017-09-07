<?php $attributes = array('id' =>'kiosk_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdatekiosk')): ?>
<script> $('#UpdatedkioskModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdatekiosk')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Kiosk_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('Kiosk_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('KioskStock/KioskUpdate',$attributes);?>
   



<div class="form-group">
            <label class="control-label col-sm-3" for="UKioskId">Kiosk Id :</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UKioskId" name="UKioskId" placeholder="Enter Kiosk Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UDrugPackId">Drug Pack Id:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UDrugPackId" name="UDrugPackId" placeholder="Enter Drug Pack Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UAvailQuantity">Available Quantity:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UAvailQuantity" name="UAvailQuantity" placeholder="Enter Drug Pack Id">
            </div>
          </div>

<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
          
<?php echo form_close();?>




