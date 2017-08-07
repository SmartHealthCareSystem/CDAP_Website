

<?php $attributes = array('id' =>'login_form' , 'class' =>'form-group'); ?>



<?php if($this->session->flashdata('errors')): ?>
<?php echo ($this->session->flashdata('errors')); ?>
<?php endif; ?>


<?php if($this->session->flashdata('login_unsuccess')): ?>
<?php echo ($this->session->flashdata('login_unsuccess')); ?>
<?php endif; ?>


<?php echo form_open('users/login',$attributes);?>


	<fieldset>
                 <label class="panel-login">
                       <div class="login_result"></div>
        </label>
                      <input class="form-control" placeholder="Username" id="username" name="username" type="text">
                 <br>
                      <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                     <br>
                       <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
    </fieldset>


<?php echo form_close();?>
