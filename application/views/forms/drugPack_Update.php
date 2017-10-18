<?php $attributes = array('id' =>'drugPack_update_form' , 'class' =>'form-horizontal'); ?>



<?php if($this->session->flashdata('errorsUpdatedrugPack')): ?>
<script> $('#UpdateddrugPackModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsUpdatedrugPack')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('drugPack_update_unsuccess')): ?>
<?php echo ($this->session->flashdata('drugPack_update_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('DrugPack/drugPack_Update',$attributes);?>
   



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
                <input class="form-control" type="file" name="filename" accept="image/gif, image/jpeg, image/png" placeholder="Upload Image">
                </div>
          </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Drug Items:</label>
            <div class="col-sm-9">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#UpdatedrugModal">Drugs</button>

            </div>
        </div>

<div class="form-group text-center"> 
              
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
<div id="UpdatedrugModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">


            <div class="modal-body">
                <?php
                $data['drugPackNames']=$drugPackNames;
                $data['drugPackItems']=$drugPackItems;
                $this->load->view('forms/CustomerDrug_update',$data);

                ?>
            </div>


        </div>

    </div>
</div>
          
<?php echo form_close();?>




