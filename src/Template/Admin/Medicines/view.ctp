<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Medicine Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width:20%"><?php echo __('Title') ?></th>
                        <td style="width:80%"><?php echo h($medicines['title']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Slug') ?></th>
                        <td><?php echo h($medicines['slug']) ?></td>
                    </tr>  
                    
                    <tr>
                        <th><?php echo __('Treatment') ?></th>
                        <td><?php echo h($medicines['Treatments']['name']) ?></td>
                    </tr>                    
                    
                    <tr>
                        <th><?php echo __('Image') ?></th>
                        <td>
                            <?php $filePath = WWW_ROOT . 'medicine_img' . DS . $medicines['image']; ?>
                            <?php if ($medicines['image'] != "" && file_exists($filePath)) { ?>
                                <img src="<?php echo $this->Url->build('/medicine_img/' . $medicines['image']); ?>" width="100px" height="100px" />
                            <?php } ?>                            
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Description') ?></th>
                        <td><?php echo $medicines['description'] ?></td>
                    </tr>                    
                    <tr>
                        <th><?php echo __('Note') ?></th>
                        <td><?php echo h($medicines['note']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Warning') ?></th>
                        <td><?php echo h($medicines['warning']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Meta Title') ?></th>
                        <td><?php echo h($medicines['meta_title']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Meta Keywords') ?></th>
                        <td><?php echo h($medicines['meta_key']) ?></td>
                    </tr>                    
                    <tr>
                        <th><?php echo __('Meta Description') ?></th>
                        <td><?php echo h($medicines['meta_descriptiion']) ?></td>
                    </tr>                    
                </table>
            </div>
       </div>

      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> Pils List</h3>
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:5%"><?php echo $this->Paginator->sort('sl') ?></th>
                            <th style="width:25%"><?php echo $this->Paginator->sort('title') ?></th>
                            <th style="width:20%"><?php echo $this->Paginator->sort('Treatment') ?></th>
                            <th style="width:10%"><?php echo $this->Paginator->sort('quantity') ?></th>
                            <th style="width:10%"><?php echo $this->Paginator->sort('cost') ?></th>
                            <th class="actions" style="width:22%"><?php echo __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!empty($medicines['pils'])) { ?>        
                            <?php $i = 1;
                            foreach ($medicines['pils'] as $dt):
                                ?>
                                <tr>
                                    <td><?php echo $this->Number->format($i) ?></td>
                                    <td><?php echo h($dt['title']) ?></td>
                                    <td><?php echo h($dt['Treatments']['name']) ?></td> 
                                    <td><?php echo h($dt['quantity']) ?></td>
                                    <td><?php echo h($dt['cost']) ?></td>
                                    <td class="actions">
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt['id']?>"> Describtion </button>
                                        <div class="modal fade" id="myModal<?php echo $dt['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"> Pils Description </h4>
                                                    </div>
                                                    <div class="modal-body"> <p> <?php echo addslashes($dt['description']); ?> </p> </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </td>                
                                </tr>
                                <?php $i++; endforeach; ?>
                            <?php } else { ?> 
                            <tr>
                                <td colspan="6">No Pils Exist.</td>              
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
            </div>
       </div>      

</div>
</div>