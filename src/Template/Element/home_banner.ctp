<div class="home-banner" style="width:100%; position: relative; background: url('<?php echo $this->Url->build('/', true); ?>images/banner2.jpg') no-repeat top center; background-size: cover; min-height: 525px">
    <?php echo $this->element('menu');?>
    <div class="banner-content">
        <h1>Your Online Doctor and Pharmacy</h1>
        <span class="thin">Safer, easier, faster.</span>
        <ul>
            <li><span><i class="fa fa-check-circle"></i></span> No appointment – get your prescription online now</li>
            <li><span><i class="fa fa-check-circle"></i></span> Discreet delivery by post</li>
            <li><span><i class="fa fa-check-circle"></i></span> Safe, regulated care</li>
        </ul>
        
        <?php if ($this->request->session()->check('Auth.User')) { ?>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "dashboard"]); ?>"><button type="button" class="button">My Dashboard</button></a>                              
        <?php } else if ($this->request->session()->check('Auth.Doctor')) { ?>
            <a href="<?php echo $this->Url->build(["controller" => "Doctors", "action" => "dashboard"]); ?>"><button type="button" class="button">My Dashboard</button></a>                              
        <?php } else { ?>
            
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signup"]); ?>">
                <button type="button" class="button">Open Your Account</button>
            </a>
        <?php } ?>        
        
            <button type="button" id="bapsi" class="button2 " >Choose Your Treatment</button>
        
        
        
    </div>
</div>

<script>
	$('#bapsi').on('click', function() {
		$('ul.dropdown-menu').css('display','block');
		
	});
</script>

<script>
	$('.cros').on('click', function() {
		$('ul.dropdown-menu').css('display','none');
	});
</script>