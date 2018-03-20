
<div class="edit-profil-leftdiv">
    <ul class="nav nav-pills nav-stacked">
        
        <?php  if($user_details['utype'] == 1){ ?>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'dashboard'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editprofile'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>" ><i class="fa fa-user-o"></i> My Profile</a></li>
        
        <?php }else{ ?>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'servicedashboard'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceeditprofile'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>" ><i class="fa fa-user-o"></i> My Profile</a></li>
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addservice'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "addservice"]);?>"><i class="fa fa-plus"></i> Add Service</a></li>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'servicelist'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicelist"]);?>" ><i class="fa fa-list-ul"></i> List Service</a></li>
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'reviews'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "reviews"]);?>"><i class="fa fa-eye"></i> Reviews</a></li>
                        
        <?php } ?>
        
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'favouritelist'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "favouritelist"]);?>"><i class="fa fa-heart-o"></i> My Favourite</a></li>
        
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="actv" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>"><i class="fa fa-lock"></i> Change Password</a></li>
    </ul>
</div>
