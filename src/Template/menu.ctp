<div class="mega-menu-part">
    <nav class="navbar  navbar-inverse">
        <div class="container">
         <!--   <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>-->
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav nav-partt">                   
                    <!-- <li><a href="javascript:void(0)">Men</a></li> -->
                    <li> <?php echo $this->Html->link('Men', ['controller' => 'Categories', 'action' => 'detail', $appCategoryList[0]['slug']]); ?> </li>
                    <li><?php echo $this->Html->link('Women', ['controller' => 'Categories', 'action' => 'detail', $appCategoryList[1]['slug']]); ?></li>
                    <li><?php echo $this->Html->link('Sexual', ['controller' => 'Categories', 'action' => 'detail', $appCategoryList[2]['slug']]); ?></li>
                    <li><?php echo $this->Html->link('Travel', ['controller' => 'Categories', 'action' => 'detail', $appCategoryList[3]['slug']]); ?></li>                    
                    <li class="dropdown mega-dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Treatments & prices <b class="caret"></b></a>
                        <ul class="dropdown-menu mega-dropdown-menu row">
                            <li class="col-sm-12">
                                <h3>
                                    Treatments & prices
                                </h3>
                            </li>                            
                            <?php foreach ($appTreatmentList as $menuTreatList) { ?>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $menuTreatList['slug']]); ?>"> <?php echo $menuTreatList['name'] ?> </a>  </li>
                                        <?php foreach ($menuTreatList['Medicines'] as $menuMedList) { ?>
                                            <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $menuMedList['slug']]); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $menuMedList['title'] ?> </a></li>
                                        <?php } ?>
                                    </ul>
                                </li> 
                            <?php } ?>
                            <div class="health-list">
                                <ul>
                                    <li><a href="#">Mens health</a></li>
                                    <li><a href="#">Womens health</a></li>
                                    <li><a href="#">Sexual health</a></li>
                                    <li><a href="#">Travel health</a></li>
                                    <li><a href="#">General health</a></li>
                                    <li><a href="#">Skin health</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div class="blueback">
                                <p class="closer"><a href="#">Close <i class="fa fa-chevron-up" aria-hidden="true"></i></a>
                                </p>
                            </div>
                        </ul>
                    </li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index", "reviews"]); ?>">Reviews</a></li>
                    <li><?php echo $this->Html->link('Regulated', ['controller' => 'Contents', 'action' => 'index', "regulated"]); ?></li>
                    <li><?php echo $this->Html->link('FAQs', ['controller' => 'Faqs', 'action' => 'index']); ?></li>
                    <li><?php echo $this->Html->link('Delivery', ['controller' => 'Contents', 'action' => 'index', "delivery"]); ?></li>
                    <li><?php echo $this->Html->link('Refunds', ['controller' => 'Contents', 'action' => 'index', "return-and-refunds"]); ?></li>
                    <li><?php echo $this->Html->link('How it works', ['controller' => 'Contents', 'action' => 'index', "how-it-works"]); ?></li>
                    <li><?php echo $this->Html->link('About us', ['controller' => 'Contents', 'action' => 'index', "about-us"]); ?></li>

                    <li class="account">
                        <a href="">More</a>
                        <div class="account-holder">
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">All Prices</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
    </nav>
</div>