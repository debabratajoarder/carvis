<div class="newspart">
    <h3> <?php echo $newsDetail['title'] ?> </h3>

    <?php if ($newsDetail['img'] != "") { $filePath = WWW_ROOT . 'news_img' . DS . $newsDetail['img']; if (file_exists($filePath)) { ?>
        <img src="<?php echo $this->Url->build('/news_img/', true); ?><?php echo $newsDetail['img'] ?>">
    <?php } } ?>
    
    
    
    <?php echo $newsDetail['detail']; ?>
    
    
    <?php if(!empty($newsDetail['Treatments']['name'])){ ?>
    <a class="btn btn-success more-link" href="<?php echo $this->Url->build(["controller" => "treatments", "action" => "treatmentdetail", $newsDetail['Treatments']['slug'], 'medical-information']); ?>">Buy Treatment</a>
    <div class="background-color">
        <h3>Related Treatment </h3>
        <ul>
            <li><a href="<?php echo $this->Url->build(["controller" => "treatments", "action" => "treatmentdetail", $newsDetail['Treatments']['slug'], 'medical-information']); ?>"> <?php echo $newsDetail['Treatments']['name']; ?> </a></li>
        </ul>
    </div>
    <?php } ?>
     
    <?php if(!empty($newsDetail['NewsCategories'])){ ?>
    <div class="background-color">
        <h3>Related Treatment Category </h3>
        <ul>
            <?php foreach($newsDetail['NewsCategories'] as $tc){ ?>
                <li><a href="<?php echo $this->Url->build(["controller" => "Categories", "action" => "detail", $tc['Categories']['slug'] ]); ?>"> <?php echo $tc['Categories']['name']; ?> </a></li>
            <?php } ?>
        </ul>
    </div>    
    <?php } ?>
    
</div>