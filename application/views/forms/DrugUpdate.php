<?php $attributes = array('id' =>'drug_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdateDrug')): ?>
<script> $('#UpdatetDrugModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdateDrug')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Drug_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('Drug_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('DrugManagement/drugUpdate',$attributes);?>
   



<div class="form-group">
            <label class="control-label col-sm-3" for="Ufname">First Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ufname" name="Ufname" placeholder="Enter First Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ulname">Last Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ulname" name="Ulname" placeholder="Enter Last Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Uemail">Email:</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="Uemail" name="Uemail" placeholder="Enter email" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="Upwd">Password:</label>
            <div class="col-sm-9"> 
              <input type="password" class="form-control" id="Upwd" name="Upwd" placeholder="Enter password">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UgenradioM">Gender:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="radio" id="UgenradioM" name="Ugenradio" value="Male">Male</label>
                <label class="radio-inline"><input type="radio" name="Ugenradio" id="UgenradioF" value="Female">Female</label>
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Uage">Age:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="Uage" name="Uage" placeholder="Enter Age" min="5">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="UtelCustomer">Contact No:</label>
            <div class="col-sm-9"> 
              <input type="tel" class="form-control" id="UtelCustomer" name="UtelCustomer" placeholder="Enter Contact No." min="5">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="UaddCustomer">Address:</label>
            <div class="col-sm-9"> 
                <textarea class="form-control" id="UaddCustomer"name="UaddCustomer" placeholder="Enter Address" min="5" cols="12" rows="4">hi</textarea>
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="Urfid">RFID code:</label>
            <div class="col-sm-9"> 
              <input type="text" class="form-control" id="Urfid" name="Urfid" placeholder="Enter RFID code">
            </div>
          </div>
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
    <?php echo form_close();?>





