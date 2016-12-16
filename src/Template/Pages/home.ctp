<section class="how-it">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>How it works</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="how-holder">
                    <img src="<?php echo $this->Url->build('/', true);?>images/how-1.png" alt="">
                    <h3>Online Consulation</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="how-holder">
                    <img src="<?php echo $this->Url->build('/', true);?>images/how-2.png" alt="">
                    <h3>Doctors Approval</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="how-holder">
                    <img src="<?php echo $this->Url->build('/', true);?>images/how-3.png" alt="">
                    <h3>Delivery</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="health">
    <div class="container">
        <div class="row">
            <?php foreach($category as $hcat){ ?>
            <div class="col-md-3 col-sm-3">
                <div class="health-holder">
                    <div class="image-area">
                        <img src="<?php echo $this->Url->build('/', true);?>category_img/<?php echo $hcat['image']; ?>" alt="">
                        <h3><?php echo $hcat['name'];?></h3>
                    </div>

                    <div class="health-content">
                        <ul>
                            
                            <?php if(!empty($hcat['treatments'])){ ?>
                            <?php $slk = 1; foreach($hcat['treatments'] as $hcattr){ ?>
                            <?php if($slk < 5 ){ ?>
                            <li><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $hcattr['slug']]); ?>"><i class="fa fa-check"></i> <?php echo $hcattr['name'];?> </a></li>
                            <?php } ?>
                            <?php $slk++; } ?>
                            <?php } else { ?>
                                <li>No Treatment Exist</li>
                            <?php } ?>                             
                        </ul>
                        <a href="<?php echo $this->Url->build(["controller" => "Categories", "action" => "detail", $hcat['slug']]); ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php } ?> 
            
        </div>
    </div>
</section>

<section class="our-doctor">
    <div class="container">
        <div class="row">
            <div class="col-mg-12">
                <h1>Our doctors</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach($doctor as $hdoct){ ?>
            <div class="col-md-3 col-sm-3">
                <div class="doctor-holder">
                    <div class="doc-image">
                        <img src="<?php echo $this->Url->build('/', true);?>user_img/<?php echo $hdoct->pimg;?>" alt="">
                    </div>
                    <div class="doctor-wrap">
                        <h4><?php echo $hdoct->first_name." ".$hdoct->last_name;?></h4>
                        <!--<p>General Practitioner (Prescriber)</p>-->
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="health">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="border-box">
                    <h3>Online prescriptions</h3>
                    <h5><img src="<?php echo $this->Url->build('/', true);?>images/video.jpg" alt="" class="img-responsive"></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="border-box">
                    <h3>Latest Newses</h3>
                    <!--
                    <a href="<?php echo $this->Url->build(["controller" => "Newses", "action" => "detail", $news['slug'] ]); ?>">
                    <h3><?php echo $news['title'] ?></h3></a> -->
                    
                    <?php foreach($news as $newsDt){ ?>
                    
                    <div class="latest-news-content">
                    <a href="<?php echo $this->Url->build(["controller" => "Newses", "action" => "detail", $newsDt->slug]); ?>">
                        <h4><?php echo $newsDt->title ?></h4>
                    </a>
                    <b><?php echo date('d F Y', strtotime($newsDt->created)); ?></b>
                    <?php echo substr($newsDt->detail, 0, 80) ?>
                    </div>  
                    <?php } ?>
                    
                    <!--
                    <div class="latest-news-content">
                    <h4>Heading</h4>
                    <b><?php echo date('d F Y', strtotime($news['created'])); ?></b>
                    <?php echo substr($news['detail'], 0, 80) ?>
                    </div>
                    <div class="latest-news-content">
                    <h4>Heading</h4>
                    <b><?php echo date('d F Y', strtotime($news['created'])); ?></b>
                    <?php echo substr($news['detail'], 0, 80) ?>
                    </div> 
                    -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="border-box">
                    <h3>Independent reviews</h3>
                    <ul class="bxslider2">
                        
                        <?php if(!empty($review)){ ?>
                        <?php foreach($review as $k => $homeRev){ ?>
                            <li>
                                <p> <?php echo $homeRev->review ?> </p>
                                <p class="rating">Rating:  <span id="<?php echo $k;?>" style="color:#ff6624;"></span> </p>
                                <p class="posted">Posted on: <?php echo date('d F Y', strtotime( $homeRev->date )); ?> <span><?php echo $homeRev->user->first_name." ".$homeRev->user->last_name ?>, <?php echo $homeRev->user->city?></span></p>
                            </li>   
                            
                            <script>
                                $(document).ready(function(){
                                $("#<?php echo $k; ?>").raty({score:'<?php echo $homeRev->rate ?>',readOnly:true, halfShow : true});   
                            }); 
                            </script>                            
                            
                            
                        <?php } ?>
                        <?php } else { ?> 
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <p class="rating">Rating:  <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></p>
                                <p class="posted">Posted on: 19-09-2016 <span>Robin S., london</span></p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <p class="rating">Rating:  <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></p>
                                <p class="posted">Posted on: 19-09-2016 <span>Robin S., london</span></p>
                            </li>                        
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /* ?>
<section class="popular">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Treatment Spotlight</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach($treatments as $htr){ ?>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>treatment_img/<?php echo $htr->image; ?>" alt="">
                    <div class="bottom-holder">
                        <h5> <?php echo $htr->name;?> </h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2> <?php echo $htr->name;?> </h2>
                        <?php if(!empty($htr->Medicines)){ ?>
                        <?php $slk = 1; foreach($htr->Medicines as $hmed){ ?>
                        <?php if($slk < 5 ){ ?>
                        <p class="list"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $hmed->slug]); ?>"><i class="fa fa-check"></i> <?php echo $hmed->title;?> </a></p>
                        <?php } ?>
                        <?php $slk++; } ?>
                        <?php } else { ?>
                        <p class="list"><a href="javascript:void(0)"><i class="fa fa-check"></i> No Medicine Exist</a></p>
                        <?php } ?>                       
                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $htr->slug]); ?>" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!--
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Weight Loss</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Weight Loss</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-3.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Migraine</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Migraine</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-4.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Sexual Health</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Sexual Health</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-5.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Period Delay</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Period Delay</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-6.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Acid Reflux</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Acid Reflux</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-7.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Stop Smoking</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Stop Smoking</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="popular-holder view view-first">
                    <img src="<?php echo $this->Url->build('/', true);?>images/popular-8.jpg" alt="">
                    <div class="bottom-holder">
                        <h5>Asthma</h5>
                        <span><i class="fa fa-angle-right"></i></span>
                    </div>
                    <div class="mask">
                        <h2>Asthma</h2>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                        <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                        <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</section>
<?php */ ?>

<section class="popular">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Treatment Spotlight</h1>
            </div>
        </div>
        
        <div class="product_slider">
            <?php foreach($treatments as $htr){ ?>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>treatment_img/<?php echo $htr->image; ?>" alt="">
                <div class="bottom-holder">
                    <h5> <?php echo $htr->name;?> </h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2> <?php echo $htr->name;?> </h2>
                        <?php if(!empty($htr->Medicines)){ ?>
                        <?php $slk = 1; foreach($htr->Medicines as $hmed){ ?>
                        <?php if($slk < 5 ){ ?>
                        <p class="list"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "medicinedetail", $hmed->slug]); ?>"><i class="fa fa-check"></i> <?php echo $hmed->title;?> </a></p>
                        <?php } ?>
                        <?php $slk++; } ?>
                        <?php } else { ?>
                        <p class="list"><a href="javascript:void(0)"><i class="fa fa-check"></i> No Medicine Exist</a></p>
                        <?php } ?>                       
                        <a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $htr->slug]); ?>" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <?php } ?> 
            <!--
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            <div class="popular-holder view view-first">
                <img src="<?php echo $this->Url->build('/', true);?>images/popular-2.jpg" alt="">
                <div class="bottom-holder">
                    <h5>Weight Loss</h5>
                    <span><i class="fa fa-angle-right"></i></span>
                </div>
                <div class="mask">
                    <h2>Weight Loss</h2>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Erectile dysfunction</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Hair loss</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Premature ejaculation</a></p>
                    <p class="list"><a href=""><i class="fa fa-check"></i> Chlamydia</a></p>
                    <a href="javascript:void(0)" class="info"><i class="fa  fa-plus-circle"></i> Read More</a>
                </div>
            </div>
            -->
        </div>
    </div>
</section>
<style>
    .bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-pager{width:100%}
</style>