<div class="my-account">
    <p class="img-right note">
        Doctor ID: <?php echo strtoupper($user->unique_id);?><br>
        <?php echo date('d F Y', strtotime($user->created));?>
    </p>
    <h2>My Message</h2>
    <div class="clearfix"></div> 
</div>
<div class="my-order-tab">
    <div class="main-content-header">
        <div class="bordered-block">
            <h4>Send message to customer service</h4>
            <div class="message-header">
                <div class="btn-group">
                    <!--
                    <button type="button" class="btn btn-success">New Message</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="cart-btn"><i class="fa fa-envelope"></i>

                        </span>
                    </button>
                    -->
                    <?php echo $this->Form->create('', ['class' => 'form-horizontal', 'id' => 'smsgprecdet_validate']); ?>
                      <input type="hidden" name="transid" value="<?php echo $orderExist[0]->transaction_id;?>" >
                      <input type="hidden" name="ftype" value="msg" >
                      <input type="hidden" name="fromid" value="<?php echo $user->id ?>" >
                      <input type="hidden" name="toid" value="1" >
                      <input type="hidden" name="pid" value="<?php echo $orderExist[0]->user_id;?>" >
                      <input type="hidden" name="type" value="d" >
                      <input type="hidden" name="fromtype" value="doctor" >
                      <input type="hidden" name="totype" value="admin" >
                      
                      
                      <div class="form-group">
                        <label for="email">Message To Customer Service:</label>
                        <textarea class="form-control" id="msg" name="msg" rows="4" cols="50"></textarea>
                      </div>
                      <button type="submit" class="btn btn-default">Send Message</button>
                    <?php echo $this->Form->end();?>                     
                    
                    

                </div>
            </div>
        </div>
    </div>
    <div class="prevmessage">
        <h3>All previous messages</h3>
        <?php foreach($msg as $msgdt){ ?>
        <div class="messagepart">
            <!--<div class="manicon">
                <img src="images/manicon.png"> 
            </div>-->
            <?php if($msgdt->fromtype == 'doctor'){ ?>
                <div style="float:right;" class="messagetext">
                    <p style="text-align:right;"> <?php echo $msgdt->msg ?> </p>
                      <p style="text-align:right;">  <span>From : <b><?php echo $msgdt->fromtype == 'doctor' ? "Me" : 'Admin'; ?></b></span>
                        <span><?php echo time_elapsed_string($msgdt->date)?></span></p>
                </div>
                <div class="clearfix"></div>
            <?php } else { ?>
                <div class="messagetext">
                    <p> <?php echo $msgdt->msg ?> </p>
                      <p>  <span>From : <b><?php echo $msgdt->fromtype == 'doctor' ? "Me" : 'Admin'; ?></b></span>
                        <span><?php echo time_elapsed_string($msgdt->date)?></span></p>
                </div>
                <div class="clearfix"></div>            
            <?php } ?>
            
        </div>
        <?php } ?>
        <!--
        <div class="messagepart">
            <div class="manicon">
                <img src="images/manicon.png">
            </div>
            <div class="messagetext">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
                    <span><b>Mr. Debkumar Basu</b></span>
                    <span>26.10.2016</span></p>

            </div>
            <div class="clearfix"></div>
        </div>
        -->
        
        
    </div>
    <button type="button" class="btn btn-info btn-logout">
        Logout <i class="fa fa-lock"></i>

    </button>
</div>

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