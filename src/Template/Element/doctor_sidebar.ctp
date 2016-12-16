<div class="order-side-bar">
    <h4> Profile Image </h4>
    <?php echo $this->Form->create('', ['url' => ['controller' => 'Doctors', 'action' => 'updateprofileimage'], 'class' => 'form-horizontal', 'id' => 'proimg-validate', 'enctype' => 'multipart/form-data']); ?>   
    <?php if($this->request->params['action'] == 'newprescriptiondetail'){ ?>
        <input type="hidden" name="returl" value="<?php echo $this->request->params['controller']."/".$this->request->params['action']."/".$this->request->pass[0]; ?>" >
        <!-- <input type="hidden" name="returl1" value="<?php echo $this->request->pass[0]."/".$this->request->params['pass'][0]; ?>" > -->
    <?php } else { ?>
        <input type="hidden" name="returl" value="<?php echo $this->request->params['controller']."/".$this->request->params['action']; ?>" >
    <?php } ?>
    
    
    
    <div class="order-side-list">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-preview thumbnail" style="width: 240px; height: 140px; margin: 10px 10px 10px 10px">
                <?php $filePath = WWW_ROOT . 'user_img' .DS.$user->pimg; ?>
                <?php if ($user->pimg != "" && file_exists($filePath)) { ?>
                    <img src="<?php echo $this->Url->build('/user_img/'.$user->pimg); ?>" width="240px" height="140px" />
                <?php } ?>
            </div>
          <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
            <input type="file" id="image" name="image" />
            </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
          <div style="margin-top: 5px"> 
              <span class="">
                  <span class=""><input type="submit" name="submit" value="Change Profile Image" class="btn btn-primary" /></span>
              </span> 
          </div>  
        </div>
    </div>
    <?php echo $this->Form->end();?>
    <div class="col-lg-8" style="text-align:left;">  
        
    </div>
</div> 

<div class="order-side-bar">
    <h4> My Account </h4>
    <div class="order-side-list">
        <ul>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "editprofile"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> My Profile </a></li>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "newprescription"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Prescription For Approval </a></li>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "dashboard"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Approved Prescription </a></li>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "rejectprescription"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Rejected Prescription </a></li>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "mypatients"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Patients </a></li>
            <li> <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "mymessagelist"]); ?>"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Inbox </a></li>
            <!--
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Unknown printer took galley</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Lorem Ipsum</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Ipsum is simply text</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Unknown printer took galley</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Lorem Ipsum</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Ipsum is simply text</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Unknown printer took galley</a></li>
            -->
        </ul>
    </div>
</div>