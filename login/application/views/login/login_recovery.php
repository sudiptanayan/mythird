<div class="row vertical-center ">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Password Recovery</h3>
        </div>
        <div class="panel-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('login/login/newPass'); ?>    
            <p><div class="input-group">
                <span class="input-group-addon">Email</span>
                <?php echo form_input('email',set_value('email'),'placeholder= "Enter your Email" class="form-control w150"'); ?>
            </div></p>
            <p><?php echo anchor('login/login/', '<button type="button" class="btn btn-danger pull-left">Back</button>'); ?></p>
            <p><?php echo form_submit('submit', 'Send Request', 'class="btn btn-info pull-right"'); ?></p>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>