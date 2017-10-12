<?php if($this->session->flashdata('errorsInsertcustomerDrug')): ?>
<script> $('#InsertdrugModal').modal('show');</script>
<?php echo ($this->session->flashdata('errorsInsertcustomerDrug')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('customerDrug_insert_unsuccess')): ?>
<?php echo ($this->session->flashdata('customerDrug_unsuccess')); ?>
<?php endif; ?>



<?php if($tabledata!='No Drugs'):?>
    <?php foreach($drugPackNames  as $r): ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="Idrugs"><?php echo $r->DrugName?></label>
            <div class="col-sm-9">
                <input type="checkbox" id="drugnames" name="drugnames[]" value="<?php echo $r->DrugName?>">

            </div>
        </div>

    <?php endforeach; ?>
<?php else: ?>

            <?php echo $drugPackNames ?>


<?php endif; ?>
<div class="form-group text-center">

    <div class="col-sm-offset-2 col-sm-10">
<!--        <button type="submit" class="btn btn-success">Submit</button>-->
        <button type="button" class="btn btn-success" onclick="closeDrugInsertModal()">Submit</button>
        <script>
            function closeDrugInsertModal() {
                $('#InsertdrugModal').modal('hide');
            }
        </script>
    </div>
</div>
<!--<script>-->
<!--    $('#customer_drug_insert_form').on('submit', function(event) {-->
<!--    event.preventDefault();-->
<!--    $.ajax({-->
<!--    type: "POST",-->
<!--    url: "drugPack/drugPack_Insert",-->
<!--    data: $('#drugPack_insert_form').serialize()-->
<!--    }).then(this.submit.bind(this));-->
<!--    });-->
<!--</script>-->

