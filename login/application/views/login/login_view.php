<div class="row vertical-center">
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('login/verifylogin'); ?>    
            <p><div class="input-group col-xs-12">
                <span class="input-group-addon">Email</span>
                <?php echo form_input('email',set_value('email'),'placeholder= "Enter your Email" class="form-control w150"'); ?>
            </div></p>
            <p><div class="input-group">
                <span class="input-group-addon">Pass</span>
                <?php echo form_password('pass','','placeholder= "Enter your Password" class="form-control"'); ?>
            </div></p>
            <p><?php echo anchor('login/login/recovery', '<button type="button" class="btn btn-default pull-left btn-xs">Forgot your password?</button>'); ?></p>
            <p><?php echo form_submit('submit', 'Login', 'class="btn btn-info pull-right"'); ?></p>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>