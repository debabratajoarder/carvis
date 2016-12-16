<script type="text/javascript">
$(document).ready(function(){
    $('#headsearch').bind('keyup', function() { 
        alert("ok");
        $('#search_validate').delay(200).submit();
    });
});

function submitHeaderSearch(val){
    //alert("oks");
    //$('#'+val).submit();
    $('form#'+val).submit();
}

</script> 

<?php
$medicinListVal = '';
foreach($medicineList as $k=>$v){
    if($medicinListVal == ""){ 
        $medicinListVal = '"'.$v.'"'; 
    } else { 
        $medicinListVal = $medicinListVal.",".'"'.$v.'"';
    }
}
?>
<!--<script>-->
<!--  $( function() {
    var availableTags = [ <?php echo $medicinListVal ?> ];
    $( "#searchheadw" ).autocomplete({
      source: availableTags 
    });
  } );-->
  <!--</script>-->

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
       
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>-->
            <!-- <a class="navbar-brand" href="javascript:void(0)"><img src="<?php echo $this->Url->build('/', true);?>images/logo.png" alt="" /></a> -->
            <?php $filePathlo = WWW_ROOT . 'logo' . DS . $SiteSettings['site_logo']; ?>
            <?php if ($SiteSettings['site_logo'] != "" && file_exists($filePathlo)) { ?>
                <a class="navbar-brand" href="<?php echo $this->Url->build('/'); ?>"> <img src="<?php echo $this->Url->build('/logo/' . $SiteSettings['site_logo']); ?>" /></a>
            <?php } else { ?> 
                <a class="navbar-brand" href="javascript:void(0)"></a>
            <?php } ?>                    
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <ul class="nav navbar-nav navbar-right">
        <li class="searchbar">
            <?php echo $this->Form->create('', ['url' => ['controller' => 'Medicines', 'action' => 'search'], 'id' => 'search_validate']); ?>
            
                <div class="search">
                    <?php if(!empty($searcData)){ ?>
                    <input type="text" name="searchhead" id="searchhead" value="<?php echo $searcData;?>" placeholder="Search"/>
                    <?php } else { ?>
                    <input type="text" name="searchhead" id="searchhead" placeholder="Search"/>
                    <?php } ?>
                    <a href="javascript:void(0)" onclick="submitHeaderSearch('search_validate')" id="headsearch" ><i class="fa fa-search"></i></a>
                </div>
            </li>
            <?php echo $this->Form->end();?>
            <li>
                <div class="cart">
                    <?php if($countCart != 0){ ?>
                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "cart"]); ?>" >
                        <span><i class="fa fa-cart-plus"></i></span>
                        <span id="cartcounttop"> <?php echo $countCart;?> </span>
                        </a>                    
                    <?php } else { ?>
                        <span><i class="fa fa-cart-plus"></i></span>
                        <span id="cartcounttop"> <?php echo $countCart;?> </span>
                    <?php } ?>
                </div>
            </li>
            <li class="account">
                        <a href=""><i class="fa fa-user"></i> Account</a>
                        <div class="account-holder">
                            <ul>

                                    
                                <?php if ($this->request->session()->check('Auth.User')) { ?>
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "dashboard"]); ?>">My Account</a></li>                              
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">Sign Out</a></li>
                                <?php } else if ($this->request->session()->check('Auth.Doctor')) { ?>
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "newprescription"]); ?>">My Account</a></li>                              
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "logout"]); ?>">Sign Out</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signin"]); ?>">Login</a></li>
                                    <li><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signup"]); ?>">Register</a></li>
                                <?php } ?>                                    
                                    
                                    

                            </ul>
                        </div>
                    </li>
            <li class="toggle-icon toggle-menu-box"> <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button></li>
        </ul>
    </div>
</nav>