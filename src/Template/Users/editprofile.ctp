<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {
        $(".datepicker").datepicker({maxDate: -6570, dateFormat: 'yy-mm-dd'}).val();
    });
</script>
<?php echo $this->element('usermenu'); ?>
<div class="my-order-tab">
    <header class="main-content-header">
        <h2>Edit my details</h2>
    </header>
    <!-- <form class="registration_form"> -->
    <?php echo $this->Form->create($user, ['class' => 'registration_form', 'id' => 'useredit-validate']); ?>
        <div class="edit-info-area">
            <!--
            <div class="form-block">
                <label class="required" for="title">
                    Gender
                    <span class="required" title="Required">*</span>
                </label>
                <div class="inline-until-mobile">
                    <?php if($user->gender != ''){ ?>
                        <?php if($user->gender == 'Male'){ ?>
                            <label class="male-btn active" for="gender-male">Male</label>
                        <?php } else { ?>
                            <label class="male-btn active" for="gender-male">Femle</label>
                        <?php } ?>
                    <?php } else { ?>
                        <label class="male-btn active" for="gender-male">Not Defined</label>
                    <?php } ?>
                </div>
            </div>
            -->
            
            <div class="form-block">
                <label class="required requiredlabel" for="title">Gender</label>
                <?php 
                $options = ['Male' => 'Male', 'Female' => 'Female'];
                $attributes = ['legend' => true, 'value' => $user->gender];
                echo $this->Form->radio('gender', $options, $attributes);
                ?>
            </div>            
            <div class="form-block">
                <?php echo $this->Form->input('first_name', array('label' => 'First Name', 'div' => false, 'class' => '', 'value' => $user->first_name)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('last_name', array('label' => 'Last Name', 'div' => false, 'class' => '', 'value' => $user->last_name)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('email', array('label' => 'Email', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->email)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('password', array('label' => 'Password', 'div' => false, 'class' => '', 'type'=>'text', 'value' => '')); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('phone', array('label' => 'Telephone', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->phone)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('dob', array('label' => 'Date of Birth', 'div' => false, 'class' => 'datepicker', 'type'=>'text', 'value' => date('Y-m-d', strtotime($user->dob)))); ?>
            </div>
        </div>
        <div class="edit-info-area">
            <div class="deliveryaddress">
                <h3>Delivery Address</h3>
                <p> Enter address below for shipping address </p>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('address', array('label' => 'Street Address', 'div' => false, 'class' => 'textareapart', 'type'=>'textarea', 'value' => $user->address)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('city', array('label' => 'City', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->city)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('region', array('label' => 'County/region', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->region)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('postcode', array('label' => 'Post Code', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->postcode)); ?>
            </div>
            <div class="form-block">
                <?php echo $this->Form->input('country', array('label' => 'Country', 'div' => false, 'class' => '', 'type'=>'text', 'value' => $user->country)); ?>
            </div>
            <div class="form-block">
                <label class="required requiredlabel" for="title">
                </label>
                <button class="btn btn-default accountbutton" type="submit">Update Details</button>
            </div>
        </div>
    <?php echo $this->Form->end();?>

    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
        <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
    </a>

</div>