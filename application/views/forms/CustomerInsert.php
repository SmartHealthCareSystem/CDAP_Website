<?php $attributes = array('id' =>'customer_insert_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsInsert')): ?>
<script> $('#InsertModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsert')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('Customer_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('Customer_insert_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('CustomerManagement/customerInsert',$attributes);?>


	<div class="form-group">
            <label class="control-label col-sm-3" for="Ifname">First Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ifname" name="Ifname" placeholder="Enter First Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Ilname">Last Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Ilname" name="Ilname" placeholder="Enter Last Name">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Iemail">Email:</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="Iemail" name="Iemail" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="Ipwd">Password:</label>
            <div class="col-sm-9"> 
              <input type="password" class="form-control" id="Ipwd" name="Ipwd" placeholder="Enter password">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IgenradioM">Gender:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline"><input type="radio" id="IgenradioM" name="Igenradio" value="Male">Male</label>
                <label class="radio-inline"><input type="radio" name="Igenradio" id="IgenradioF" value="Female">Female</label>
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="Iage">Age:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="Iage" name="Iage" placeholder="Enter Age" min="5">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="ItelCustomer">Contact No:</label>
            <div class="col-sm-9"> 
              <input type="tel" class="form-control" id="ItelCustomer" name="ItelCustomer" placeholder="Enter Contact No." min="5">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3" for="IaddCustomer">Address:</label>
            <div class="col-sm-9"> 
                <textarea class="form-control" id="IaddCustomer" name="IaddCustomer" placeholder="Enter Address" min="5" cols="12" rows="4"></textarea>
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="Irfid">RFID code:</label>
            <div class="col-sm-9"> 
              <input type="number" class="form-control" id="Irfid" name="Irfid" placeholder="Enter RFID code">
            </div>
          </div>
          
          <div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>


<?php echo form_close();?>