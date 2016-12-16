<?php echo $this->Html->css('animate.css') ?>
<?php echo $this->Html->css('jpagestyle.css') ?>

<?php echo $this->Html->script('jPages.min.js') ?>
<?php echo $this->Html->script('Pagination.js') ?>
 
<div class="treatments-prices-banner" style="margin-bottom: 55px">
    <div class="row">
        <div class="col-md-6">
            <div class="treatments-banner-content">
                <h1>Search Page</h1>
            </div>
        </div>
    </div>
</div>

<div class="treatments-body-aarea">
    <div class="row">
        <div class="col-md-12">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="treatment-prices">
                    <div class="row">
                        
                    <?php /* ?>    
                    <!-- <p id="legend2"></p> -->
                    <div class="holder"></div>
                    <!-- item container -->
                    <ul id="itemContainer">
                        <li>gdgdgrgrgrgr</li>
                        <li>gregrgre</li>
                        <li>grgrgre</li>
                        <li>gregegre</li>
                        <li>rgereg</li>
                        <li>grgregre</li>
                        <li>gregregre</li>
                        <li>ggregreg</li>

                    </ul>
                    <!-- navigation holder -->
                    <div class="holder"></div>

                    <!-- Page oriented legend -->
                    <!-- <p id="legend1"> </p> -->
                    <!-- Item oriented legend -->                        
                    <?php  */ ?>    
                        
                        
                        
                        
                        <?php if (!empty($finalArray)) { ?>
                            <?php foreach ($finalArray as $smed) { ?>
                        
                        
                                <?php if($smed['type'] == 'treatment'){ ?>
                                <div class="col-md-12">
                                    <div class="viagra-product">
                                        <!--
                                        <div class="viagra-product-pic">
                                            <?php if ($smed['img'] != '') { ?>
                                                <img src="<?php echo $this->Url->build('/' . $smed['folder'] . '/' . $smed['img']); ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo $this->Url->build('/', true); ?>images/right-img.jpg">
                                            <?php } ?>                                
                                        </div>
                                        -->
                                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $smed['slug'], 'medical-information']); ?>" >
                                            <h3> <?php echo $smed['name'] ?> - Medicinesbymailbox </h3>
                                        </a>
                                        <div class="viagra-product-text"> 
                                            <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $smed['slug'], 'medical-information']); ?>" >
                                            <<?php echo 'http://138.68.18.167:8080/pharma/treatments/treatmentdetail/'. $smed['slug'] . '/medical-information' ; ?>
                                            </a>
                                        </div>
                                        <?php if($smed['desc'] != ""){ ?>
                                        <div class="viagra-product-text">
                                           <?php echo $smed['desc'];?>    
                                        </div>                                        
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <?php } else if($smed['type'] == 'medicine'){ ?>
                                <div class="col-md-12">
                                    <div class="viagra-product">
                                        <!--
                                        <div class="viagra-product-pic">
                                            <?php if ($smed['img'] != "") { ?>
                                                <img src="<?php echo $this->Url->build('/' . $smed['folder'] . '/' . $smed['img']); ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo $this->Url->build('/', true); ?>images/right-img.jpg">
                                            <?php } ?>                                
                                        </div>
                                        -->
                                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $smed['slug']]); ?>" >
                                                <h3> <?php echo $smed['name'] ?> - Medicinesbymailbox </h3>
                                        </a> 
                                        
                                        <div class="viagra-product-text">
                                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $smed['slug']]); ?>" >
                                            <?php echo 'http://138.68.18.167:8080/pharma/treatments/medicinedetail/'. $smed['slug']; ?>
                                        </a>                                            
                                        </div>
                                        <?php if($smed['desc'] != ""){ ?>
                                        <div class="viagra-product-text">
                                           <?php echo $smed['desc'];?>    
                                        </div>                                        
                                        <?php } ?>                                        
                                        
                                    </div>
                                </div>                        
                                <?php } else if($smed['type'] == 'news'){ ?>
                                <div class="col-md-12">
                                    <div class="viagra-product">
                                        <!--
                                        <div class="viagra-product-pic">
                                           <?php if ($smed['img'] != "") { ?>
                                                <img src="<?php echo $this->Url->build('/' . $smed['folder'] . '/' . $smed['img']); ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo $this->Url->build('/', true); ?>images/right-img.jpg">
                                            <?php } ?>                                
                                        </div>
                                        -->
                                        <a href="<?php echo $this->Url->build(["controller" => "Newses", "action" => "detail", $smed['slug']]); ?>" >
                                            <h3> <?php echo $smed['name'] ?> - Medicinesbymailbox </h3>
                                        </a>                                        
                                         <div class="viagra-product-text">
                                        <a href="<?php echo $this->Url->build(["controller" => "Newses", "action" => "detail", $smed['slug']]); ?>" >
                                           <?php echo 'http://138.68.18.167:8080/pharma/newses/detail/'. $smed['slug']; ?>
                                        </a>                                                
                                        </div>
                                        <?php if($smed['desc'] != ""){ ?>
                                        <div class="viagra-product-text">
                                           <?php echo $smed['desc'];?>    
                                        </div>                                        
                                        <?php } ?>                                        
                                        
                                        
                                    </div>
                                </div>                         
                                <?php } ?>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($medicines)) { ?>
    <!--
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="treatment-prices">
                    <div class="row">
                        <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                        <?php echo $this->Paginator->numbers() ?>
                        <?php echo $this->Paginator->next(__('next') . ' >') ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php } ?> 
</div>