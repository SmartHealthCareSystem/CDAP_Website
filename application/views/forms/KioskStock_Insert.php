<?php $attributes = array('id' =>'kioskStock_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsertKiosk')): ?>
<script> $('#InsertKioskModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertKiosk')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Kiosk_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('Kiosk_insert_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('KioskStock/KioskStockInsert',$attributes);?>


	<div class="form-group">
            <label class="control-label col-sm-3" for="IKioskId">Kiosk Id:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IKioskId" name="IKioskId" placeholder="Enter Kiosk Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IDrugPackId">Drug pack Id:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IDrugPackId" name="IDrugPackId" placeholder="Enter Drug Pack Id">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IAvailQuantity">Available Quantity:</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="IAvailQuantity" name="IAvailQuantity" placeholder="Enter Available Drug ">
            </div>
          </div>
            

<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
         

<?php echo form_close();?>