<div class="my-account">
    <p class="img-right note">
        Doctors ID: <?php echo strtoupper($user->unique_id); ?><br>
        <?php echo date('d F Y', strtotime($user->created)); ?>
    </p>
    <h2>My Doctor Account</h2>
    <div class="clearfix"></div>
</div>