<h2 class="about"> <?php echo trim($mData['page_title']); ?> </h2>
<div class="dispatch-other-text">
    <?php echo trim(nl2br($mData['content'])); ?>
    <div class="cms-bottom-pic">
    <img src="<?php echo $this->Url->build('/', true);?>images/img-services.jpg" alt="Trusted Shops logo" width="89">
    </div>
    </div>