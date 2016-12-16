<?php if ($this->request->params['controller'] == "Treatments" && $this->request->params['action'] == "treatmentdetail") { ?>
    <div class="side-menu-area side-menu-part">
        <h4> <?php echo $treatment['name'] ?> </h4>
        <div class="side-menu-list">
            <ul>               
                <!--<li class="active"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $treatment['slug']]); ?>">
                         <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $treatment['name'] ?> </a></li> -->
                <?php if (!empty($treatment['Medicines'])) {
                    foreach ($treatment['Medicines'] as $sideBarMedicineMenu) {
                        ?>
                        <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $sideBarMedicineMenu['slug']]); ?>">
                                <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $sideBarMedicineMenu['title'] ?> </a></li>        
                    <?php }
                }
                ?>
            </ul>            
        </div>
    </div>
<?php } else if ($this->request->params['controller'] == "Treatments" && $this->request->params['action'] == "medicinedetail") { ?>
    <div class="side-menu-area side-menu-part">
        <h4> <?php echo $treatmentdata['name'] ?></h4>
        <div class="side-menu-list">
            <ul>               
                <!--<li class="active"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $treatmentdata['slug']]); ?>">
                         <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $treatmentdata['name'] ?> </a></li> -->

    <?php if (!empty($treatmentdata['Medicines'])) {
        foreach ($treatmentdata['Medicines'] as $sideBarMedicineMenu) {
            ?>
                        <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $sideBarMedicineMenu['slug']]); ?>">
                                <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $sideBarMedicineMenu['title'] ?> </a></li>        
        <?php }
    }
    ?>
            </ul>            
        </div>
    </div>
<?php } else if ($this->request->params['controller'] == "Treatments" && $this->request->params['action'] == "treatmentprice") { ?>
    <div class="side-menu-area">
        <h4> Selected</h4>
        <div class="side-menu-list">
            <ul>
                <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $treatment['slug']]); ?>">
                        <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $treatment['name'] ?> </a></li>
                <?php if (!empty($treatment['Medicines'])) {
                    foreach ($treatment['Medicines'] as $sideBarMedicineMenu) {
                ?>
                    <li>
                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $sideBarMedicineMenu['slug']]); ?>">
                            <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $sideBarMedicineMenu['title'] ?> 
                        </a>
                    </li>        
                <?php } } ?>
            </ul>            
        </div>
    </div>
<?php } ?>

<div class="side-menu-area">
    <h4>Treatments</h4>
    <div class="side-menu-list">
        <ul>
            <?php foreach ($appTreatmentList as $menuTreatList) { ?>
                <li> <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $menuTreatList['slug']]); ?>">
                        <span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> <?php echo $menuTreatList['name'] ?> 
                    </a>
                </li>
            <?php } ?>   
        </ul>
    </div>
</div>

<div class="side-menu-area">
    <h4 style="color: whitesmoke"><a href="javascript:void(0)">In the press</a></h4>
    <div class="side-menu-list">
        <ul>
            <li> 
                <a class="gallery_item" href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "allprices"]); ?>">
                    <img src="https://www.doctorfox.co.uk/assets/images/online-medicines-ethical.jpg" alt="Online medicines the ethical way headline">
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="side-menu-area">
    <h4 style="color: whitesmoke"><a href="javascript:void(0)">Your guarantee</a></h4>
    <div class="side-menu-list">
        <ul>
            <li>
                <img src="https://www.doctorfox.co.uk/assets/images/logo-trusted-shops.svg" alt="Trusted Shops logo" width="89">
            </li> 
            <li>
                Buying drugs via the internet is risky, but not for people using this GP web clinic.
                 <a class="gallery_item" href="https://www.doctorfox.co.uk/assets/images/logo-trusted-shops.svg">GP magazine.</a>
            </li>            
        </ul>
    </div>
</div>


<!--
<div class="side-menu-area">
    <h4>Treatments & prices</h4>
    div class="side-menu-list">
        <ul>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
            <li> <a href="#"><span class="span"><i class="fa fa-caret-right" aria-hidden="true"></i></span> Anti-malaria tablets</a></li>
        </ul>
    </div>
</div>
-->
