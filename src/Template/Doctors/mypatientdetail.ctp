<?php echo $this->element('doctorhead'); ?> 
<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders"> Patient Detail </h2>
    </header>
    <div class="order-conteainer">
        <div class="order-detail-content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr> 
                            <td><b> ID: </b></td>
                            <td> <?php echo $patient->unique_id ?> </td>
                        </tr>                        
                        
                        <tr> 
                            <td><b> First Name: </b></td>
                            <td> <?php echo $patient->first_name ?> </td>
                        </tr>
                        <tr>
                            <td><b> Last Name: </b></td>
                            <td> <?php echo $patient->last_name ?> </td>
                        </tr>
                        <tr>
                            <td><b> Email: </b></td>
                            <td> <?php echo $patient->email ?> </td>
                        </tr>
                        <tr>
                            <td><b> Contact: </b></td>
                            <td> <?php echo $patient->phone ?> </td>
                        </tr>
                        
                        <tr> 
                            <td><b> Address: </b></td>
                            <td> <?php echo $patient->address ?> </td>
                        </tr>
                        <tr>
                            <td><b> City: </b></td>
                            <td> <?php echo $patient->city ?> </td>
                        </tr>
                        <tr>
                            <td><b> Post Code: </b></td>
                            <td> <?php echo $patient->postcode ?> </td>
                        </tr>
                        <tr>
                            <td><b> Country: </b></td>
                            <td> <?php echo $patient->country ?> </td>
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="my-order-tab">
    <header class="main-content-header">
        <h2 class="my-orders">Prescription History</h2>
    </header>
    <div class="patient-history-area">
        
        <?php foreach($orders as $ordDt){ ?>
        <div class="patient-history">
            <div class="row">
                <div class="col-md-6 patient-history-left">
                    <h4> <?php echo $ordDt->treatment->name; ?> </h4>
                    <div class="patient-history-left-part">
                        <?php foreach($ordDt->orderdetails as $curOrd){ ?>
                        <h4> <?php echo $curOrd->medicine->title ?> </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody><tr>
                                            <td><b>Pil Name:</b></td>
                                            <td> <?php echo $curOrd->pil_name ?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Qty:</b></td>
                                            <td> <?php echo $curOrd->pil_qty ?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Price:</b></td>
                                            <td> <?php echo sprintf('%0.2f', $curOrd->pil_price)?> </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <?php } ?>
                        <!--
                        <h4>Heading</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>
                        -->
                    </div>
                </div>
                <div class="col-md-6 patient-history-right">
                    <h4> <?php echo date('F d Y', strtotime( $ordDt->date )); ?> </h4>
                    <?php $dt = json_decode($ordDt['question']); ?>
                    <?php foreach($dt as $qdt){ ?>
                        <?php if($qdt->q != "termscondition"){ ?>
                        <?php if(!empty($qdt->a)){ ?>
                        <div class="patient-history-right-part">
                            <h5> <?php echo $qdt->q?> </h5>
                            <?php if(is_array($qdt->a)){ ?>
                                    <p> 
                                    <?php $fVal = ""; foreach($qdt->a as $k=>$v){  $fVal = $fVal.", ".$v;  } ?>
                                        <?php echo ltrim($fVal,","); ?>
                                    </p>
                                <?php } else { ?>
                                    <p> <?php echo $qdt->a?></p>
                                <?php } ?>
                        </div>
                        <?php } } ?>
                    <?php } ?>                    
                    <!--
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    </div>
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <?php } ?>
        
        <!--
        <div class="patient-history">
            <div class="row">
                <div class="col-md-6 patient-history-left">
                    <h4> Diabetise</h4>
                    <div class="patient-history-left-part">
                        <h4>Heading</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody><tr>
                                            <td><b>Phone Number:</b></td>
                                            <td>(123) 5896515</td>
                                        </tr>
                                        <tr>
                                            <td><b>Restaurant URL:</b></td>
                                            <td><a href="#">http://www.ascotepharmacy.com/ </a></td>
                                        </tr>
                                        <tr>
                                            <td><b>Estimated Delivery Time:</b></td>
                                            <td>04.11.2016</td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <h4>Heading</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>
                    </div>
                </div>
                <div class="col-md-6 patient-history-right">
                    <h4> Jan 19th 2016</h4>
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    </div>	

                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    </div>
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="patient-history">
            <div class="row">
                <div class="col-md-6 patient-history-left">
                    <h4> Diabetise</h4>
                    <div class="patient-history-left-part">
                        <h4>Heading</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody><tr>
                                            <td><b>Phone Number:</b></td>
                                            <td>(123) 5896515</td>
                                        </tr>
                                        <tr>
                                            <td><b>Restaurant URL:</b></td>
                                            <td><a href="#">http://www.ascotepharmacy.com/ </a></td>
                                        </tr>
                                        <tr>
                                            <td><b>Estimated Delivery Time:</b></td>
                                            <td>04.11.2016</td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <h4>Heading</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>
                    </div>
                </div>
                <div class="col-md-6 patient-history-right">
                    <h4> Jan 19th 2016</h4>
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    </div>	

                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                    </div>
                    <div class="patient-history-right-part">
                        <h5> Sep 19th 2016</h5>
                        <p><b>Lorem Ipsum</b> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
    
    <div class="pagination-area">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php echo $this->Paginator->first(__('<< First', true), array('class' => 'number-first')); ?>
                <?php echo $this->Paginator->numbers(array('class' => 'numbers', 'first' => false, 'last' => false)); ?>
                <?php echo $this->Paginator->last(__('Last >>', true), array('class' => 'number-end')); ?> 
            </ul>
        </nav>
    </div>     
    
</div>