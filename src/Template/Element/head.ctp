 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Welcome | Carvis</title>
        <?php echo  $this->Html->css('bootstrap.min.css') ?>
        <?php echo  $this->Html->css('bootstrap-theme.min.css') ?>
       
	<?php echo  $this->Html->css('slider.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif" sizes="36x36" href="<?php echo $this->Url->build('/images/sw.gif');?>">
        <?php echo  $this->Html->css('custom.css') ?>
        <?php echo $this->Html->script('jquery.min.js') ?>
        
    
	<style type="text/css">
	.scrollup{
			width:40px;
			height:40px;			
			text-indent:-9999px;
			opacity:0.8;
			position:fixed;
			bottom:50px;
			right:50px;
			display:none;			
			background: url(<?php echo $this->Url->build('/images/icon_top.png');?>) no-repeat;
		}		
	</style>
        
</head>
<body>