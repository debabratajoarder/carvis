<h2>Prescription medicine prices</h2>
<div class="dispatch-other-text">
    <h2>Prescription medicine prices</h2>
    <div class="prices">
        <div class="row">
            <div class="col-md-6">
                <h2>Cost of medication</h2>
                <p>The GMC state it is good medical practice to be honest and open in any financial arrangements with patients.</p>

                <p>Until July 2010 MHRA regulation prevented online clinics displaying prices. This has now changed, and Ascot Pharmacy is happy to provide all our prices below.</p>

                <p>Dispensing by a registered pharmacy included. Delivery is an additional cost: £2.90 within UK. Delivery of medication is free to patients who post an existing private paper prescription to the pharmacy.</p>
            </div>
            <div class="col-md-6">
                <h2>Cost comparisons</h2>
                <img src="<?php echo $this->Url->build('/', true);?>images/50_lower.jpg" class="lowerprice">
                <p>Ascot Pharmacy prices are 25%£50% less than other clinics. Savings can run into hundreds of pounds for a single prescription item.</p>

                <button class="btn btn-success" type="button">Compare Prices</button>
                <p>Ascot Pharmacy has lower costs for some medicine than the same items bought from pharmacies without a prescription. We can also provide larger quantities than available over the counter without prescription.</p>
            </div>
        </div>
        <div class="prescription">Already have a private paper prescription? Post to our pharmacy</div>
        <h2>Online prescription fee</h2>
        <?php echo $SiteSettings['prescription_fee']?>
        <!--
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Order value per consultation</th>
                    <th>Online prescription fee</th>
                </tr>
                <tr>
                    <td>up to £10.00</td>
                    <td>£1.00</td>
                </tr>
                <tr>
                    <td>up to £20.00</td>
                    <td>£3.00</td>
                </tr>
                <tr>
                    <td>up to £50.00</td>
                    <td>£5.00</td>
                </tr>
                <tr>
                    <td>up to £100.00</td>
                    <td>£8.00</td>
                </tr>
                <tr>
                    <td>over £100.00</td>
                    <td>£10.00</td>
                </tr>
            </table>
        </div>
        -->

        <div class="table-responsive price-table">
            <table class="table">
                <tr>
                    <th>Treatments / Pils</th>
                    <th>Quantity</th>
                    <th style="width: 110px">Cost</th>
                </tr>
                
                <?php foreach($treatment as $treatmentVal){ ?>
                    <?php if(!empty($treatmentVal->Pils)){ ?>
                        <tr>
                            <td colspan="3" class="cystities"><a href="<?php echo $this->Url->build(["controller" => "Treatments", "action" => "treatmentdetail", $treatmentVal->slug]); ?>"> <?php echo $treatmentVal->name ?> </a></td>
                        </tr>
                        <?php foreach($treatmentVal->Pils as $pils){ ?>
                            <tr>
                                <td>  <?php echo $pils->title ?> </td>
                                <td> <?php echo $pils->quantity ?> </td>
                                <td>£ <?php echo sprintf('%0.2f', $pils->cost)?> </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                
            </table>
        </div>
        <!--
        <div class="private-prescription">
            <div class="row">
                <div class="col-md-8">
                    <h2>If you already have a private prescription</h2>
                    <ol>
                        <li>Register or log in.</li>

                        <li>Post your private paper prescription to the pharmacy. Click here for pharmacy address and telephone number (please telephone pharmacy for pricing information).

                            Please include your:
                            <ul>
                                <li>Name</li>
                                <li>Your Ascot Pharmacy patient number</li>
                                <li>Your postal address (service available only for UK delivery)</li>
                                <li>Your contact telephone number IMPORTANT</li>
                            </ul>
                        </li>

                        <li>The pharmacy will contact you for payment when your prescription is received. Free delivery.</li>

                        <p>If you have an NHS prescription please telephone 0117 2050198.</p>
                    </ol>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $this->Url->build('/', true);?>images/private-prescription.jpg">
                </div>
            </div>
        </div>
        -->
    </div>
</div>