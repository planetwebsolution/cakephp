<div class="container">
    <div class="row">



<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('Profile',array('novalidate'=>'true', 'type' => 'file')); ?>
        <div class="col-sm-3"></div>
        <div class="col-lg-6">

            <div class="form-group">
                <div class="col-xs-13">                        

<?php
$categorieslist=array('Male','Female');
echo $this->Form->input('email', array('label' => array('class' => '', 'text' => 'Enter Email'), 'class' => 'form-control'));
echo $this->Form->input('password', array('label' => array('class' => '', 'text' => 'Enter Password'), 'class' => 'form-control'));
echo $this->Form->input('name', array('label' => array('class' => '', 'text' => 'Enter Name'), 'class' => 'form-control'));
echo $this->Form->input('gender', array('label' => array('class' => '', 'text' => 'Select gender'),'class' => "form-control", 'options' => $categorieslist));
echo $this->Form->input('phone', array('label' => array('class' => '', 'text' => 'Enter Phone No'), 'class' => 'form-control'));
echo $this->Form->input('postal_code', array('label' => array('class' => '', 'text' => 'Enter Postal code'), 'class' => 'form-control'));
echo $this->Form->input('address', array('label' => array('class' => '', 'text' => 'Enter Address'), 'class' => 'form-control'));
?>

                    <label class="" for="Profileimage">Profile image</label>
                    <br>
                    <img id="img" src="/abhishek/registration/img/dummy.png" width="100px" height="100px"/>  
<?php                    
echo $this->Form->file('image', array('type' => 'file', 'class' => 'm-wrap large'));
?>

                </div>
            </div>



            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            

        </div>
        <?php $this->end(); ?>


    </div>
</div>

