<link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/iCheck/all.css">

<div class="box">
    <div class="box-header with-border">
        <?php if(isset($message)):?>
        <div class="callout callout-danger">
            <p><?=$message?></p>
        </div>
        <?php endif?>
    </div>
    <?php echo form_open('user/store', 'class="form-horizontal" id="user_edit"');?>
    <div class="box-body">
        <input type="hidden" name = "useraccount" value="<?=$user->useraccount?>"/>
        <input type="hidden" name = "model" value="edit"/>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="username">姓名</label>
            <div class="col-sm-5">
                <input id="username" name="username" class="form-control" type="text" value="<?=$user->username?>" placeholder="姓名"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="email">邮箱</label>
            <div class="col-sm-5">
                <input id="email" name="email" class="form-control" type="text" value="<?=$user->email?>" placeholder="邮箱"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="phone">电话</label>
            <div class="col-sm-5">
                <input id="phone" name="phone" class="form-control" type="text" value="<?=$user->phone?>" placeholder="电话"/>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="<?php echo site_url('user/index')?>"><i class="fa fa-reply">&nbsp;返回</i></a>
        <button class="btn btn-info pull-right" type="submit"><i class="fa fa-save">&nbsp;保存</i></button>
    </div>
    <?php echo form_close();?>
</div>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>AdminLTE2/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>AdminLTE2/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>AdminLTE2/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript">

//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
});

$('#datepicker').datepicker({
    language:"zh-CN",
    format:"yyyy-mm-dd",
    showInputs: false,
    endDate: "+0d",
});
</script>
