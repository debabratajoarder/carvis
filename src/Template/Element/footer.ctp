<section class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h4>Popular Treatments</h4>
                <ul class="footer-links">
                    <?php if(!empty($popularTreatments)){ ?>
                        <?php foreach($popularTreatments as $fpopTr){ ?>
                        <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $fpopTr->slug]); ?>"> <?php echo $fpopTr->name ?></a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <li><a href="javascript:void(0)">Erectile Dysfunction</a></li>
                        <li><a href="javascript:void(0)">Weight Loss</a></li>
                        <li><a href="javascript:void(0)">Migraines</a></li>
                        <li><a href="javascript:void(0)">Period Delay</a></li>
                        <li><a href="javascript:void(0)">Asthma</a></li>
                        <li><a href="javascript:void(0)">Sexual Health</a></li>
                        <li><a href="javascript:void(0)">Stop Smoking</a></li>                    
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Useful Links</h4>
                <ul class="footer-links">
                    <li><?php echo $this->Html->link('Delivery Info', ['controller' => 'Contents', 'action' => 'index', "delivery"]); ?></li>
                    <li><?php echo $this->Html->link('FAQs', ['controller' => 'Faqs', 'action' => 'index']); ?></li>
                    <li><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index", "reviews"]); ?>">Reviews</a></li>
                    <li><?php echo $this->Html->link('Regulated', ['controller' => 'Contents', 'action' => 'index', "regulated"]); ?></li>
                    <li><?php echo $this->Html->link('About us', ['controller' => 'Contents', 'action' => 'index', "about-us"]); ?></li>
                    <li><?php echo $this->Html->link('Refunds', ['controller' => 'Contents', 'action' => 'index', "return-and-refunds"]); ?></li>
                    <li><?php echo $this->Html->link('How it works', ['controller' => 'Contents', 'action' => 'index', "how-it-works"]); ?></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Contact Us</h4>
                <p class="contact">Phone: <?php echo $SiteSettings['contact_phone'] ?><br>Fax: <?php echo $SiteSettings['contact_fax'] ?></p>
                <p class="contact">Email: <?php echo $SiteSettings['contact_email'] ?> </p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Regulated Service</h4>
                <p><img src="<?php echo $this->Url->build('/', true);?>images/registered.jpg" alt=""></p>
                <p><img src="<?php echo $this->Url->build('/', true);?>images/plus.jpg" alt=""></p>
            </div>
        </div>
    </div>
</section>
<section class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <p class="copyright">© 2016 Medicinesbymailbox Doctor and Pharmacy | All rights reserved. </p>
                <a href="http://www.natitsolved.com/" target="_blank"><p class="copyright"> Designed & Developed by: NAT IT SOLVED PVT. LTD </p></a>
            </div>
            <div class="col-md-6 col-sm-6">
                <ul class="social-links">
                    <li><a href="" class="fa fa-facebook"></a></li>
                    <li><a href="" class="fa fa-twitter"></a></li>
                    <li><a href="" class="fa fa-google-plus"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>