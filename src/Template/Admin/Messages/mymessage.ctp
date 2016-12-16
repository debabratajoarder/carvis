<div class="my-account">
    <p class="img-right note">
        Patient ID: <?php echo strtoupper($user->unique_id);?><br>
        <?php echo date('d F Y', strtotime($user->created));?>
    </p>
    <h2>My Account</h2>
    <div class="clearfix"></div>
</div>
<?php echo $this->element('usermenu'); ?>
<div class="my-order-tab">
    <header class="main-content-header">
        <h2>My message</h2>
    </header>
    <div class="main-content-header">
        <div class="bordered-block">
            <h4>Send message to doctor or customer service</h4>
            <div class="message-header">
                <div class="btn-group">
                    <button type="button" class="btn btn-success">New Message</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="cart-btn"><i class="fa fa-envelope"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="prevmessage">
        <h3>All previous messages</h3>
        <div class="messagepart">
            <div class="manicon">
                <img src="<?php echo $this->Url->build('/', true);?>images/manicon.png">
            </div>
            <div class="messagetext">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
                    <span><b>Mr. Debkumar Basu</b></span>
                    <span>26.10.2016</span></p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="messagepart">
            <div class="manicon">
                <img src="<?php echo $this->Url->build('/', true);?>images/manicon.png">
            </div>
            <div class="messagetext">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
                    <span><b>Mr. Debkumar Basu</b></span>
                    <span>26.10.2016</span></p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="messagepart">
            <div class="manicon">
                <img src="<?php echo $this->Url->build('/', true);?>images/manicon.png">
            </div>
            <div class="messagetext">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
                    <span><b>Mr. Debkumar Basu</b></span>
                    <span>26.10.2016</span></p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="messagepart">
            <div class="manicon">
                <img src="<?php echo $this->Url->build('/', true);?>images/manicon.png">
            </div>
            <div class="messagetext">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa 
                    <span><b>Mr. Debkumar Basu</b></span>
                    <span>26.10.2016</span></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
        <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
    </a>
</div>