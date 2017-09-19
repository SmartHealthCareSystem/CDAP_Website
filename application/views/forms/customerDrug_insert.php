?php $attributes = array('id' =>'drugPack_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsertcustomerDrug')): ?>
<script> $('#InsertdrugModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertcustomerDrug')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('customerDrug_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('customerDrug_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('drugPack/drugPack_Insert',$attributes);?>


	
            <div class="form-group">
            <label class="control-label col-sm-3" for="Idrugs">drugs:</label>
            <div class="col-sm-9"> 
                <label><input type="checkbox" id="Idrugs" name="Idrugs" value="">drug </label>
                
            </div>
          </div>
            
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>


<?php echo form_close();?>