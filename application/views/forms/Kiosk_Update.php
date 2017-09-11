<?php $attributes = array('id' =>'kiosk_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdatekiosk')): ?>
<script> $('#UpdatedkioskModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdatekiosk')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Kiosk_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('Kiosk_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('Kiosk/Kiosk_Update',$attributes);?>
   



<div class="form-group">
            <label class="control-label col-sm-3" for="UKioskId">Kiosk Id :</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="UKioskId" name="UKioskId" placeholder="Enter Kiosk Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="ULocation">Location:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="ULocation" name="ULocation" placeholder="Enter Location">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UAddress">Address:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="UAddress" name="UAddress" placeholder="Enter Address">
            </div>
          </div>

<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
          
<?php echo form_close();?>




