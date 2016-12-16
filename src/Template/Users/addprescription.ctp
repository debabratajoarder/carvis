<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({maxDate: -6570, dateFormat: 'yy-dd-mm'}).val();
    });
</script>
<div class="registration-body">
    <div class="container">
        <!--
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area">
                    <h2>Upload Your Prescription</h2>
                    <div>
                        <label><input type="radio" name="colorRadio" value="red"> Use Ascot Pharmacy Prescription </label></br>
                        <label><input type="radio" name="colorRadio" value="green"> Upload Your Own Prescription </label>
                    </div>
                </div>
            </div>
        </div>  
        -->
        <div class="row red box" id="uploadSec" style="display: block"> 
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area">
                    <h2>  Your Order completed Successfully. </h2>
                </div>
            </div>
        </div>               
        <div class="row green box" id="uploadSec" style="display: none"> 
            <div class="col-md-7 col-md-offset-2">
                <div class="registration-body-area">
                    <h2>Upload Your Prescription</h2>
                    <?php echo $this->Form->create('$prescription', ['class' => 'form-horizontal', 'id' => 'checkout_validate', 'enctype' => 'multipart/form-data']); ?>
                    <div class="regi-info-area">
                        <div class="row">
                            <div class="col-md-12">
                                <h4> Upload Prescription </h4>
                                <div class="regi-form-area">
                                    <div class="form-group form-part">
                                        <label for="inputPassword3" class="col-sm-5 control-label">Choose File</label>
                                        <div class="col-sm-7">
                                            <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Street Address*:"> -->
                                            <?php echo $this->Form->input('file', array('class' => 'form-control', 'required','type'=>'file' , 'label' => false)); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-7">
                                            <button type="submit" class="btn btn-default accountbutton">Upload Prescription</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="red"){
            $(".box").not(".red").hide();
            $(".red").show();
        }
        if($(this).attr("value")=="green"){
            $(".box").not(".green").hide();
            $(".green").show();
        }
    });
});
</script>