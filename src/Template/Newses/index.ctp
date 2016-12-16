<?php //pr($news); exit; ?>

<div class="fox_news">
    <div class="row">
        <div class="col-md-8">
            <h2>Ascot Pharmacy News</h2>
            <p>News, information and articles on the health, pharmaceutical, medical and wellness industries.</p>
        </div>
        <div class="col-md-4">
            <img src="images/newspage-headerbg.png">
        </div>
    </div>
</div>

<!--
<div class="newspart">
    <h2><a href="#">How long does sildenafil last?</a></h2>
    <img src="images/man-checking-packet-of-sildenafil-200x300.jpg" class="manchecking">
    <p>One of the most common questions associated with sildenafil and other PDE-5 inhibitors is how long does it last?</p>
    <p>As soon as a potential patient thinks of taking medicine for erectile dysfunction the practical questions come into play:</p>
    <ul>
        <li>who can take it?</li>
        <li>what is the drug composed of?</li>
        <li>when should you take it?</li>
        <li>how long does it last?</li>
    </ul>
    <p>Though specific questions or concerns should always be discussed with a doctor, it never hurts to be informed about any medicine you are thinking of taking. </p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
-->

<?php if(!empty($news)){ ?>
    <?php foreach($news as $newsDt){ ?>
        <div class="newspart">
            <h2><a href="#"> <?php echo $newsDt->title ?> </a></h2>
            <?php /*
            if ($newsDt->img != "") { $filePath = WWW_ROOT . 'news_img' . DS . $newsDt->img; if (file_exists($filePath)) { ?>
                <img src="<?php echo $this->Url->build('/news_img/', true); ?><?php echo $newsDt->img ?>">
            <?php } } */ ?>
            <?php echo $newsDt->sortdetail ?>
            <a class="btn btn-success more-link" href="<?php echo $this->Url->build(["controller" => "Newses", "action" => "detail", $newsDt->slug ]); ?>">Read in full</a>
            <?php
            $data1 = '';
            if(!empty($newsDt->Treatments)){ $data1 = $data1.$newsDt->Treatments->name; }
            $data2 = '';
            if(!empty($newsDt->NewsCategories)){ 
                foreach($newsDt->NewsCategories as $cat){
                    $data2 = $data2."/".$cat->Categories->name;
                }
                $data2 = ltrim($data2,"/");
            }
            ?>
            <p>Posted on <?php echo date('d F Y', strtotime($newsDt->created)); ?> 
                <?php if($data1 != '' || $data2 != ''){ ?> 
                     in <?php echo $data1; ?> <?php if($data1 != '' && $data2 != ''){ echo ","; } ?> <?php echo $data2; ?> 
                <?php } ?>
            </p>
        </div>
    <?php } ?>
<?php } ?>

<div class="newspart">
    <div class="pagination-area">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first')); ?>
                <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false)); ?>
                <?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end')); ?> 
            </ul>
        </nav>
    </div>
</div>



<!--
<div class="newspart">
    <h2><a href="#">5 winter health myths: fact or fiction?</a></h2>
    <img src="images/man-with-cold.jpg">
    <p>When the cold winds start to blow, out comes the winter health advice too. But which of these commonly held beliefs are based on fact and which ones are myth? </p>
    <a class="btn btn-success more-link">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
<div class="newspart">
    <h2><a href="#">Danger of Fentanyl found in counterfeit and illicit drugs</a></h2>
    <img src="images/fentanyl-warning-poster-241x300.jpg" class="manchecking">
    <p>There is a growing problem in the United States and Canada which is likely to become more of an issue in the UK and Europe: Fentanyl overdose.</p>
    <h2 class="fentayel">What is Fentanyl?</h2>
    <p>Fentanyl is a synthetic (manufactured) opioid and is the most potent opioid available for medical treatment. Used to relieve pain in cancer patients, it is 50-100 times stronger than morphine, and usually administered in the form of patches or lozenges. Fentanyl is also used in certain emergency situations when stopping a patients breathing, where medics need to take over the breathing for the patient. </p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
<div class="newspart">
    <h2><a href="#">How mens’ health affects erections</a></h2>
    <img src="images/blood-pressure-check-300x200.jpg" class="manchecking">
    <p>Erectile dysfunction is widely recognised as a quality-of-life issue that affects self-confidence and relationships, but experts agree that erections, or erection problems, can also be a measure of mens’ general wellbeing.</p>

    <p>Some go so far as to claim that the penis is the barometer of a man’s health. And though it can be argued that due to the large number of possible causes of erectile dysfunction (ranging from psychological issues to the side effects of medication), a man’s ability to achieve an erection is not always indicative of his overall state of health, a number of studies prove that in otherwise healthy men erectile dysfunction can be an early sign of heart disease. </p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
<div class="newspart">
    <h2><a href="#">Thrush in men – quick treatment and prevention</a></h2>
    <img src="images/man-with-thrush-300x168.jpg" class="manchecking">
    <p>It’s something you probably wouldn’t even discuss with your best mates, let alone face the embarrassment of describing it to a doctor, which makes thrush the perfect condition to treat through an online consultation.</p>
    <h2 class="fentayel">Do you have thrush?</h2>
    <p>Thrush manifests itself in men as soreness, inflammation, or itching usually at the head of the penis. It can also cause discharge. First-time sufferers should seek a professional diagnosis, as the condition shares symptoms with certain STIs and you’ll want to rule these out before beginning treatment. Those with compromised immune systems should also ensure they consult with their GP, as the infection could progress to invasive candidiasis. </p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
<div class="newspart">
    <h2><a href="#">Dr Fox discount promo codes?</a></h2>
    <img src="images/dr-fox-discount-promo-coupon-code-300x286.png" class="manchecking">
    <p>www.doctorfox.co.uk does not issue discount coupons or promotional codes, or work with discount voucher code websites.</p>

    <p>We are aware of several voucher code websites purporting to offer Doctor Fox promo codes but these are all doing so fraudulently.</p>

    <p>Dr Fox prices are the lowest available for the majority of items sold, usually 25%-50% lower cost.</p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
<div class="newspart">
    <h2><a href="#">Where’s the cheapest place to buy Viagra online in the UK?</a></h2>
    <img src="images/cheap-viagra-uk.png" class="manchecking">
    <p>Despite the fact that Viagra lost it’s patent in June 2013 allowing for lower cost generic Viagra called sildenafil (the name of the active ingredient in Viagra) to be licensed and legally available in the UK and many EU countries,  the price of Pfizer branded Viagra has remained high.</p>

    <p>For those that can afford it, the Viagra brand provides a sense of confidence that they are using a supposed superior product, even though generic Viagra (sildenafil) is identical in medical terms (although different cosmetically).</p>

    <p>Pfizer even produce their own version of generic Viagra at a slightly lower cost, which should assure most men that generic versions are equally effective as branded originals. Licensed generic medicines are subject to extensive checks.</p>

    <p>Whether branded or generic there are many options to buy treatment for erectile dysfunction in the UK. </p>
    <a class="btn btn-success more-link" href="news-detail.html">Read in full</a>
    <p>Posted on October 18, 2016 in Erectile dysfunction, Viagra/sildenafil
    </p>
</div>
-->