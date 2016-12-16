<h2>Contact us</h2>
<div class="dispatch-other-text">
    <div class="contact-us">
        <img src="<?php echo $this->Url->build('/', true);?>images/online-pharmacy-uk.jpg" class="pharmacy-img">
        <h2>Ascot Pharmacy Pharmacy</h2>
        <p>If you need to enquire about delivery of an item please refer to the despatch confirmation email you will have received with a Royal Mail or DHL <a href="#">tracking number.</a></p>

        <p>If you wish to telephone the pharmacy to check on the progress of a delivery <b>please call 0141 3396010</b>.</p>

        <p>Ascot Pharmacy Pharmacy is registered with the <b>General Pharmaceutical Council</b> as an online pharmacy and aims to provide the highest standard of service as evidenced by the excellent <a href="#">customer reviews.</a></p>

        <p>Ascot Pharmacy Pharmacy (registration <a href="#">1124326</a>)
            399 Great Western Road, Glasgow G4 9HY</p>

        <p>Superintendent Pharmacist: Nudrat Khan (2030911)</p>

        <p>Information about refunds and returns and complaints procedure.
            photo of online pharmacy operation</p>

        <p>If you have received a confirmation email for an order from Doctor Fox, and want to enquire about delivery of an item, please refer to the pharmacy contact details in the email.</p>
        <h2>Medical enquiries</h2>
        <p>To contact the Ascot Pharmacy doctors please register or log in.</p>

        <p>Once you are registered and logged in messages can be exchanged with the site doctors securely (encrypted) in your My Account area.</p>

        <p>When doctors reply to a message an email is sent asking you to log in to view the reply.</p>

        <p>Doctors can also be contacted at info@doctorfox.co.uk and on 0117 2050198. We respond to voice messages and emails the same or next day 9am-5pm Mon-Fri excluding bank holidays.</p>
        <h2>General enquiries</h2>
        <p>Please telephone the pharmacy number (above) regarding delivery issues for orders already approved.</p>

        <p>General enquiries and contact site doctors email: <a href="info@ascotpharmacy.co.uk">info@ascotpharmacy.co.uk</a></p>

        Email is always the best and fastest contact for management. We respond to emails within one working day.

        Telephone messages can be left and doctors and administrators contacted on 0117 2050198.

        Please note that management cannot deal with individual medical enquiries.</p>

        <div class="enquiryform">
            <?php echo $this->Form->create($contact, ['id' => 'contact_validate']); ?>
                <div class="form-group">
                    <label for="email">Your Name:</label>
                    <!--<input type="text" class="form-control" id="text">-->
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false )); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false )); ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Your Order No(optional):</label>
                    <?php echo $this->Form->input('order_no', array('class' => 'form-control', 'label' => false )); ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Contact No:</label>
                    <?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => false )); ?>
                </div>            
            
                <div class="form-group">
                    <label for="pwd">Your Enquiry:</label>
                    <!--<textarea class="form-control" rows="5" id="comment"></textarea>-->
                    <?php echo $this->Form->input('msg', array('class'=>'form-control', 'label' => false)); ?>
                </div>
                <button type="submit" class="btn btn-success">Send Enquiry</button>
            <?php echo $this->Form->end();?>
        </div>
        <h2>Registered office of Index Medical Ltd</h2>
        <p>2 Westbury Mews, Westbury Hill, Westbury-on-Trym, Bristol, BS9 3QA</p>
        <h2>Your opinions</h2>
        <p>We are keen to receive feedback from customers/patients and any interested parties as this helps us to improve our service.</p>

        <p>We are interested in hearing from doctors and others about our service and about new services we could provide.</p>
        <h2>Personal doctor's consultations</h2>
        <p>Ascot Pharmacy issues prescriptions only for the items listed on this website and does not provide other consultations.</p>
    </div>
</div>