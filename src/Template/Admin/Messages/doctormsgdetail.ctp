<?php echo $this->Html->css('/plugins/switch/static/stylesheets/social-buttons.css') ?>
<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Messages </h2> 
            </div>
        </div>
        <hr />
        <div class="row">                                             
            <div class="col-lg-12">
                <div class="chat-panel panel panel-primary">
                    <div class="panel-heading">
                        <i class="icon-comments"></i>
                        Messages
                        <!--
                        <div class="btn-group pull-right">
                            <button type="button" data-toggle="dropdown">
                                <i class="icon-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="#">
                                        <i class="icon-refresh"></i> Refresh
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class=" icon-comment"></i> Available
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-time"></i> Busy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-tint"></i> Away
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="icon-signout"></i> Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                        -->
                    </div>
                    <style>
		.form-horizontal .form-group{ margin-left:0 !important; margin-right: 0 !important;}
        </style>
                    <div class="panel-body" style="height: 400px;">
                        <ul class="chat">
                            
                            <?php foreach($msg as $msgDt){ ?>
                            <?php if($msgDt->fromtype == "doctor"){ ?>
                            <li style="text-align:right" class="left clearfix">
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class="text-muted">
                                            <i class="icon-time"></i> <?php echo time_elapsed_string($msgDt->date)?>
                                        </small>
                                    </div>
                                   
                                    <p>
                                        <strong class="primary-font"> <?php echo $msgDt->user->first_name." ".$msgDt->user->last_name ?> </strong> : <?php echo $msgDt->msg ; ?>
                                    </p>
                                </div>
                            </li>
                            <?php } else { ?>
                            <li class="right clearfix">
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted">
                                            <i class="icon-time"></i> <?php echo time_elapsed_string($msgDt->date)?> </small>
                                    </div>
                                  
                                    <p>
                                       <?php echo $msgDt->msg ; ?> : <strong class="primary-font"> Admin </strong>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                            <?php } ?>
                            <!--
                            <li class="left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="<?php echo $this->Url->build('/'); ?>img/3.png" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font"> Jack Sparrow </strong>
                                        <small class="pull-right text-muted">
                                            <i class="icon-time"></i> 12 mins ago
                                        </small>
                                    </div>
                                    <br />
                                    <p>
                                        Lorem ipsum dolor sit amet, bibendum ornare dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="<?php echo $this->Url->build('/'); ?>img/4.png" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted">
                                            <i class="icon-time"></i> 13 mins ago</small>
                                        <strong class="pull-right primary-font"> Jhony Deen</strong>
                                    </div>
                                    <br />
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur a dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            -->
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                      <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id;?>" >
                      <input type="hidden" name="ftype" value="msg" >
                      <input type="hidden" name="fromid" value="1" >
                      <input type="hidden" name="toid" value="<?php echo $msg[0]->fromid;?>" > 
                      <input type="hidden" name="pid" value="<?php echo $orderExist[0]->user_id;?>" >
                      <input type="hidden" name="type" value="d" >
                      <input type="hidden" name="fromtype" value="admin" >
                      <input type="hidden" name="totype" value="doctor" >
                      
                      
                      <div class="form-group">
                        <label for="email">Message To Doctor:</label>
                        <textarea class="form-control input-sm" id="msg" name="msg" rows="4" cols="50"></textarea>
                      </div>
                      <button type="submit" class="btn btn-warning btn-sm">Send Message</button>
                    <?php echo $this->Form->end();?>                             
                            
                            <!--
                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat">
                                    Send
                                </button>
                            </span>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END PAGE CONTENT -->
<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>