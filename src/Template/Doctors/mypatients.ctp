<?php //pr($patient); exit; ?>
<div class="my-account">
    <p class="img-right note">
        Doctor ID: <?php echo strtoupper($user->unique_id);?><br>
        <?php echo date('d F Y', strtotime($user->created));?>
    </p>
    <h2>My Account</h2>
    <div class="clearfix"></div>
</div>
<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders">My Patient List</h2>
    </header>
    <div class="order-conteainer">
        <div class="order-body-content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="order-list-content table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><b>Sl No</b></th>
                                            <th><b>First Name</b></th>
                                            <th><b>Last Name</b></th>
                                            <th><b>Email</b></th>
                                            <th><b>Contact</b></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($patient)){ ?>
                                        <?php $pk = 1; foreach($patient as $ptDt){ ?>
                                        <tr>
                                            <th scope="row"> <?php echo $pk; ?> </th>
                                            <th> <?php echo $ptDt->first_name; ?> </th>
                                            <th> <?php echo $ptDt->last_name; ?> </th>
                                            <th> <?php echo $ptDt->email; ?> </th>
                                            <th> <?php echo $ptDt->phone; ?> </th>
                                            <td> 
                                                <div class="detail-btn">
                                                    <div class="detail-edit">
                                                        <?php echo $this->Html->link('View', ['controller' => 'Doctors', 'action' => 'mypatientdetail', base64_encode($ptDt->id)], ['class' => 'btn btn-success']); ?>
                                                    </div>                                
                                                    <div class="clearfix"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $pk++; } ?>
                                        <?php } else { ?>
                                        <tr>
                                            <th scope="row" colspan="5">No Patient Exist</th>
                                        </tr>
                                        
                                        <?php } ?>
                                        
                                        <?php if(!empty($patient)){ ?>
                                        <tr>
                                            <th scope="row" colspan="5">
                                                <?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first'));?>
                                                <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false));?>
                                                <?php echo $this->Paginator->last(__('>> Last', true), array('class' => 'number-end'));?>                                                
                                            </th>
                                        </tr>                                        
                                        <?php } ?>
                                        
                                        <!--
                                        <tr>
                                            <th scope="row">xxx</th>
                                            <td>04.11.2016</td>
                                            <td>Nux</td>
                                            <td>2</td>
                                            <td>£6.80</td>
                                            <td> 
                                                <div class="detail-btn">
                                                    <div class="detail-edit"><a href="" class="btn btn-primary">Edit</a></div>                                
                                                    <div class="detail-edit"><a href="" class="btn btn-danger">Detlete</a></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "signout"]); ?>">
            <button type="button" class="btn btn-info btn-logout">Logout <i class="fa fa-lock"></i> </button>
        </a>       
    </div>
</div>
