<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>-->

    <!-- 
        Summer Note Help Link 
        http://summernote.org/getting-started/#installation 
        http://summernote.org/examples/#plugin-list 
        http://summernote.org/deep-dive/
        -->

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#editor1').summernote({
            height: 300,                 // set editor height
            width: 1000,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
        });
    });
  </script>
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
         
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">
                            <div class="row">
                                <?= $this->Form->create($run) ?>
                           
                                <fieldset>
                                <!-- <div id="summernote"><p>Hello Summernote</p></div> -->
                                <textarea class="form-control ckeditor1" id="editor1" rows="6" name="content" class="validate[required]"></textarea>
                                </fieldset>

                                <?= $this->Form->button(__('Submit')) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--
<?php echo $this->Html->script('ckeditor/ckeditor.js') ?>
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">
                            <div class="row">
                                <?= $this->Form->create($run) ?>
                                <fieldset>
                                    <legend><?= __('CMS Page') ?></legend>
                                    <textarea class="form-control ckeditor" id="editor1" rows="6" name="content"></textarea>
                                </fieldset>
                                <?= $this->Form->button(__('Submit')) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
