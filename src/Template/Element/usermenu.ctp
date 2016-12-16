<div class="my-account">
    <p class="img-right note">
        Patient ID: <?php echo strtoupper($user->unique_id); ?><br>
        <?php echo date('d F Y', strtotime($user->created)); ?>
    </p>
    <h2>My Patient Account</h2>
    <div class="clearfix"></div>
</div>
<div class="main-tabs">
    <ul class="main-tabs-list my-account-tabs">
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "dashboard"]); ?>">My New orders</a>
        </li>
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "approvedorder"]); ?>">My Approved orders</a>
        </li>    
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "rejectedorder"]); ?>">My Rejected orders</a>
        </li>        
        
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "deliveredorder"]); ?>">My Previous orders</a>
        </li>        
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "mymessage"]); ?>">My messages</a>
        </li>
        <li>
            <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "editprofile"]); ?>">Edit my details</a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>