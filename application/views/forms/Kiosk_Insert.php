<?php $attributes = array('id' =>'Kiosk_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsertKiosk')): ?>
<script> $('#InsertKioskModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertKiosk')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Kiosk_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('Kiosk_insert_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('Kiosk/Kiosk_Insert',$attributes);?>


	<div class="form-group">
            <label class="control-label col-sm-3" for="IKioskId">Kiosk Id:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IKioskId" name="IKioskId" placeholder="Enter Kiosk Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="ILocation">Location:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="ILocation" name="ILocation" placeholder="Enter Location">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IAddress">Address:</label>
            <div class="col-sm-9">
              <input type="Text" class="form-control" id="IAddress" name="IAddress" placeholder="Enter Address">
            </div>
          </div>
            

<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
         

<?php echo form_close();?>