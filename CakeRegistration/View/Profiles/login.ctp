<div class="container">
    <div class="row">



<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('Profile',array('novalidate'=>'true')); ?>
        <div class="col-sm-3"></div>
        <div class="col-lg-6">

            <div class="form-group">
                <div class="col-xs-13">                        

<?php
echo $this->Form->input('email', array('label' => array('class' => '', 'text' => 'Enter Email'), 'class' => 'form-control'));
echo $this->Form->input('password', array('label' => array('class' => '', 'text' => 'Enter Password'), 'class' => 'form-control'));
?>

                </div>
            </div>


            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
        </div>
        <?php $this->end(); ?>


    </div>
</div>

