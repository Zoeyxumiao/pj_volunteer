<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>苏州市平江实验学校“家长志愿者”填写平台</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/bootstrap/offline/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/bootstrap/offline/ionicons-2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/datepicker/datepicker3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/iCheck/all.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                page. However, you can choose any other skin. Make sure you
                apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url();?>AdminLTE2/dist/css/skins/skin-blue.min.css">
        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 2.2.0 -->
        <script src="<?php echo base_url();?>AdminLTE2/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url();?>AdminLTE2/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>AdminLTE2/dist/js/app.min.js"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
            Both of these plugins are recommended to enhance the
            user experience. Slimscroll is required when using the
            fixed layout. -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body class="hold-transition" style="background-color:#ECF0F5">
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <div class="box box-info" style="margin-top:4%">
            <div class="box-header with-border" align="center" style="margin-bottom:4%">
            <h3 class="box-title">苏州市平江实验小学“家长志愿者”填写平台</h3>
            </div>
            <?php if ($page_id == 1):?>
            <?php echo form_open('fill/check', 'class="form-horizontal" id="fill1"');?>
                <div class="box-body">
                    <?php if(isset($message)):?>
                    <div class="callout callout-danger">
                        <p><?=$message?></p>
                    </div>
                    <?php endif?>
                    <div class="form-group">
                        <label class="col-sm-2 col-xs-6 control-label" for="child_name">学生姓名</label>
                        <div class="col-sm-2 col-xs-10">
                            <input id="child_name" name="child_name" class="form-control" type="text" placeholder="子女姓名" value="<?=$origin['child_name']?>"/>
                        </div>
                        <label class="col-sm-2 col-xs-6 control-label" for="entrance">入学年份</label>
                        <div class="col-sm-2 col-xs-10">
                            <select class="form-control select2 col-sm-2" id="entrance" name="entrance" style="width:100%;">
                                <?php foreach ($school as $key => $value):?>
                                    <?php if(isset($origin) && $origin['entrance'] == $key):?>
                                    <option class="col-sm-2 col-xs-10" selected="selected" value="<?=$origin['entrance']?>"><?=$origin['entrance']?></option>
                                    <?php continue;?>
                                    <?php endif;?>
                                <option class="col-sm-2 col-xs-10" value="<?php echo $key;?>"><?php echo $key;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <label class="col-sm-2 col-xs-6 control-label" for="class">所在班级</label>
                        <div class="col-sm-2 col-xs-10">
                            <select class="form-control select2" style="width:100%" id="class" name="class" >
                            <script>
                                var entrance = $("#entrance option:selected").val();
                                var all = <?php print $school_json; ?>;
                                var num = parseInt(all[entrance]);
                                for (var i = 1; i <= num; i++){
                                    if("<?php echo isset($origin)?>" && "<?php echo $origin['class']?>" == i){
                                        $("<option selected='selected' value='" + i + "'>" + i + "班</option>").appendTo("#class");
                                        continue;
                                    }
                                    $("<option value='" + i + "'>" + i + "班</option>").appendTo("#class");
                                }
                            </script>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-sm-2 col-xs-6 control-label" for="child_sex">学生性别</label>
                        <div class="col-md-2 col-sm-2 col-xs-10">
                            <div class="raw">
                                <input id="child_sex_0" type="radio" value="0" name="child_sex" class="flat-blue" <?php if ($origin['child_sex'] != 1) echo 'checked';?>/>&nbsp;<label for="child_sex_0">男</label>&nbsp;&nbsp;&nbsp;
                                <input id="child_sex_1" type="radio" value="1" name="child_sex" class="flat-blue" <?php if ($origin['child_sex'] == 1) echo 'checked';?>/>&nbsp;<label for="child_sex_1">女</label>
                            </div>
                        </div>
                        <label class="col-md-2 col-sm-2 col-xs-6 control-label" for="birthday">学生生日</label>
                        <div class="col-md-2 col-sm-2 col-xs-10">
                            <div class="input-group date col-xs-12">
                                <input id="datepicker" name="birthday" class="form-control" type="text" value="<?=$origin['birthday']?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-xs-6 control-label" for="relationship">与学生关系</label>
                            <div class="col-lg-2 col-sm-3 col-xs-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="radio"  id="relationship_2" value="2" name="relationship" class="flat-blue" <?php if ($origin['relationship'] == 2 || $origin['relationship'] == null) echo 'checked';?>/>
                                    </span>
                                    <input class="form-control" type="text" name="relationship_name" value="父亲" disabled/>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-xs-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="radio" id="relationship_3" value="3" name="relationship" class="flat-blue" <?php if ($origin['relationship'] == 3) echo 'checked'; ?>/>
                                    </span>
                                    <input class="form-control" type="text" name="relationship_name" value="母亲" disabled/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-xs-10">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="radio" id="relationship_4" value="4" name="relationship" class="flat-blue" <?php if ($origin['relationship'] == 4) echo 'checked';?>/>
                                    </span>
                                    <input class="form-control" type="text" name="relationship_name" placeholder="其他,请填写" value="<?=$origin['relationship_name']?>"/>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-info pull-default" type="button" href="<?php echo site_url('login/index');?>">返回</a>
                    <button class="btn btn-info pull-right" type="submit">下一页</button>
                </div>
                <?php echo form_close();?>
            <?php elseif ($page_id == 2):?>
                <?php echo form_open('fill/basic_info', 'class="form-horizontal" id="fill1"', $hidden);?>
                <div class="box-body">
                    <?php if(isset($message)):?>
                    <div class="callout callout-danger">
                        <p><?=$message?></p>
                    </div>
                    <?php endif?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent_name">家长姓名</label>
                        <div class="col-sm-3">
                            <input id="parent_name" name="parent_name" class="form-control" type="text" placeholder="家长姓名" value="<?= isset($parent) ? $parent->name : ''?>"/>
                        </div>
                        <label class="col-sm-2 control-label" for="parent_sex">家长性别</label>
                        <div class="col-sm-3">
                            <div class="raw">
                                <input id="parent_sex_0" type="radio" value="0" name="parent_sex" class="flat-blue" <?php if ($parent->sex != 1) echo 'checked';?>/>&nbsp;男&nbsp;&nbsp;
                                <input id="parent_sex_1" type="radio" value="1" name="parent_sex" class="flat-blue" <?php if (isset($parent) && $parent->sex == 1) echo 'checked';?>/>&nbsp;女
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="workspace">工作单位</label>
                        <div class="col-sm-8">
                            <input id="workspace" name="workspace" class="form-control" type="text" placeholder="工作单位" value="<?= isset($parent) ? $parent->workspace : ''?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="phone">联系电话</label>
                        <div class="col-sm-3">
                            <input id="phone" name="phone" class="form-control" type="text" placeholder="联系电话" value="<?= isset($parent) ? $parent->phone : ''?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ability">专业或特长</label>
                        <div class="col-sm-8">
                        <?php $ability_set = ['literary' => '文学', 'science' => '科技', 'paint' => '书画', 'dance' => '舞蹈', 'music' => '乐器',
                        'language' => '外语', 'handwork' => '手工', 'sport' => '体育', 'photograph' => '摄影', 'cook' => '厨艺'];
                        foreach ($ability_set as $key => $value):?>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" value="1" name="ability_<?=$key?>" class="flat-blue" <?php $param_name = 'ability_' . $key; if(isset($parent) && $parent->{$param_name} == 1) echo "checked";?>/>
                                    </span>
                                    <input class="form-control" type="text" value="<?=$value?>" disabled/>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" value="1" name="ability_others" class="flat-blue" <?php if(isset($parent) && $parent->ability_others != '') echo 'checked';?>/>
                                    </span>
                                    <input class="form-control" type="text" name="ability_other_name" placeholder="其他,请填写" value="<?= isset($parent) ? $parent->ability_other_name : ''?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="is_volunteer">是否愿意参与家长志愿者活动</label>
                        <div class="col-sm-2">
                            <div class="raw">
                                <input id="is_volunteer_1" type="radio" value="1" name="is_volunteer" class="volunteer" <?php if (!isset($parent) || $parent->is_volunteer != 0) echo 'checked';?>/>&nbsp;是&nbsp;&nbsp;
                                <input id="is_volunteer_0" type="radio" value="0" name="is_volunteer" class="volunteer" <?php if (isset($parent) && $parent->is_volunteer == 0) echo 'checked';?>/>&nbsp;否
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="is_organ">是否愿意参与家长志愿者协会的组织工作</label>
                        <div class="col-sm-2">
                            <div class="raw">
                                <input id="is_organ_1" type="radio" value="1" name="is_organ" class="volunteer" <?php if (!isset($parent) || $parent->is_organ != 0) echo 'checked';?>/>&nbsp;是&nbsp;&nbsp;
                                <input id="is_organ_0" type="radio" value="0" name="is_organ" class="volunteer" <?php if (isset($parent) && $parent->is_organ == 0) echo 'checked'?>/>&nbsp;否
                            </div>
                        </div>
                    </div>
                    <div class="volunteer_content">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="service">教育服务<br/>服务内容</label>
                            <div class="col-sm-8">
                            <?php $service_set = ['security' => '安全执勤', 'tour' => '带队参观', 'photograph' => '摄影宣传', 'library' => '图书馆工作',
                            'culture' => '校园文化设计', 'communication' => '家长沟通工作', 'activity' => '活动策划', 'maintenance' => '维修服务', 'network' => '班网管理'];
                            foreach ($service_set as $key => $value):?>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="service_<?=$key?>" class="flat-blue" <?php $param_name = 'service_' . $key; if(isset($volunteer) && $volunteer->{$param_name} == 1) echo "checked";?>/>
                                        </span>
                                        <input class="form-control" type="text" value="<?=$value?>" disabled/>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="service_others" class="flat-blue" <?php if (isset($volunteer) && $volunteer->service_others != '') echo 'checked';?>/>
                                        </span>
                                        <input class="form-control" type="text" name="service_other_name" placeholder="其他,请填写" value="<?= isset($volunteer) ? $volunteer->service_other_name : ''?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="service">学生导师<br/>辅导内容</label>
                            <div class="col-sm-8">
                            <?php $tutor_set = ['sinology' => '国学教育', 'art' => '艺术教育', 'science' => '科技教育', 'environment' => '环保教育',
                            'security' => '安全教育', 'handmade' => '手工制作', 'psychology' => '心理辅导', 'revolution' => '革命传统教育', 'bodybuilding' => '健身辅导'];
                            foreach ($tutor_set as $key => $value):?>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="tutor_<?=$key?>" class="flat-blue" <?php $param_name = 'tutor_' . $key; if(isset($volunteer) && $volunteer->{$param_name} == 1) echo "checked";?>/>
                                        </span>
                                        <input class="form-control" type="text" value="<?=$value?>" disabled/>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="tutor_others" class="flat-blue" <?php if (isset($volunteer) && $volunteer->tutor_others != '') echo 'checked';?>/>
                                        </span>
                                        <input class="form-control" type="text" name="tutor_other_name" placeholder="其他,请填写" value="<?= isset($volunteer) ? $volunteer->tutor_other_name : ''?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="service">家长学堂<br/>讲座内容</label>
                            <div class="col-sm-8">
                            <?php $lecture_set = ['education' => '家庭教育', 'law' => '法律知识', 'diet' => '健康饮食'];
                            foreach ($lecture_set as $key => $value):?>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="lecture_<?=$key?>" class="flat-blue" <?php $param_name = 'lecture_' . $key; if(isset($volunteer) && $volunteer->{$param_name} == 1) echo "checked";?>/>
                                        </span>
                                        <input class="form-control" type="text" value="<?=$value?>" disabled/>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" value="1" name="lecture_others" class="flat-blue" <?php if (isset($volunteer) && $volunteer->lecture_others != '') echo 'checked';?>/>
                                        </span>
                                        <input class="form-control" type="text" name="lecture_other_name" placeholder="其他,请填写" value="<?= isset($volunteer) ? $volunteer->lecture_other_name : ''?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="volunteer">做“志愿者”时间</label>
                            <div class="col-sm-8">
                            <?php $week = [1 => '星期一', 2 => '星期二', 3 => '星期三', 4 => '星期四', 5 => '星期五', 6 => '星期六', 7 => '星期天'];
                            for ($i = 1; $i <= 7; $i++):?>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" value="1" name="week_<?=$i?>" class="flat-blue" <?php if(isset($volunteer->week)) { $value = $volunteer->week; if ($value[$i-1] == 1) echo 'checked'; }?>/>
                                            </span>
                                            <input class="form-control" type="text" value="<?=$week[$i]?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            <input type="radio" value="1" name="timerange_<?=$i?>" class="flat-blue" <?php if(isset($volunteer->timerange)) { $value = $volunteer->timerange; if ($value[$i-1] == 1) echo 'checked'; }?>/>
                                            </span>
                                            <input class="form-control" type="text" value="上午" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" value="2" name="timerange_<?=$i?>" class="flat-blue" <?php if(isset($volunteer->timerange)) { $value = $volunteer->timerange; if ($value[$i-1] == 2) echo 'checked'; }?>/>
                                            </span>
                                            <input class="form-control" type="text" value="中午" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" value="3" name="timerange_<?=$i?>" class="flat-blue" <?php if(isset($volunteer->timerange)) { $value = $volunteer->timerange; if ($value[$i-1] == 3) echo 'checked';}?>/>
                                            </span>
                                            <input class="form-control" type="text" value="下午" disabled/>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor;?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" value="1" name="week_other" class="flat-blue" <?php if (isset($volunteer) && $volunteer->week_other != '') echo 'checked';?>/>
                                            </span>
                                            <input class="form-control" type="text" name="week_other_content" placeholder="其他时间说明" value="<?=isset($volunteer) ? $volunteer->week_other_content : ''?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="slogan">志愿者口号创意</label>
                            <div class="col-sm-8">
                                <input id="slogan" name="slogan" class="form-control" type="text" placeholder="志愿者口号创意" value="<?=isset($volunteer) ? $volunteer->slogan : ''?>"/>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="suggest1">您希望家长志愿者开展哪些活动</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" name="suggest1">
                                <?=isset($parent) ? $parent->suggest1 : ''?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="suggest2">您对于我校的家校共建活动有何建议与意见？</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" name="suggest2">
                                <?=isset($parent) ? $parent->suggest2 : ''?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-info pull-default" type="button" href="<?php echo site_url('fill/index');?>">上一页</a>
                    <button class="btn btn-info pull-right" type="submit">提交</button>
                </div>
                <?php echo form_close();?>
            <?php else:?>
                <div class="box-body" style="height:500px; align:center">
                    <div class="sign" style="font-size:40px; margin:16% 34%">
                        感谢您的参与
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-info pull-default" type="button" href="<?php echo site_url('login/index');?>">返回主界面</a>
                </div>
            <?php endif;?>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    </div>
    <!-- Default to the left -->
  </footer>
<script src="<?php echo base_url();?>AdminLTE2/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>AdminLTE2/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>AdminLTE2/plugins/select2/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>AdminLTE2/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>AdminLTE2/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>AdminLTE2/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
$(".select2").select2();
$('#datepicker').datepicker({
    language:"zh-CN",
    format:"yyyy-mm-dd",
    showInputs: false,
    endDate: "+0d",
});
//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
});
<?php if($page_id == 1):?>
// set_class();
$(function(){
    $("#entrance").change(function(){
        clean_class();
        set_class();
    });
});
function clean_class(){
    $("#class option").remove();
    $("<option value='" + 1 + "'>" + 1 + "班</option>").appendTo("#class");
}
function set_class(){
    var entrance = $("#entrance option:selected").val();
    var all = <?php print $school_json; ?>;
    var num = parseInt(all[entrance]);
    for (var i = 2; i <= num; i++){

        if("<?php echo isset($origin)?>" && "<?php echo $origin['class']?>" == i){
        $("<option selected='selected' value='" + i + "'>" + i + "班</option>").appendTo("#class");
        continue;
        }
        $("<option value='" + i + "'>" + i + "班</option>").appendTo("#class");
    }
}

<?php elseif($page_id == 2):?>
$('.volunteer').parent().on('change', function(){
    var is_volunteer = $('[name=is_volunteer]:checked').val();
    var is_organ = $('[name=is_organ]:checked').val();
    if (is_volunteer == '0' && is_organ == '0') {
        $('.volunteer_content input:checkbox').attr('disabled', true);
        $('.volunteer_content input:radio').attr('disabled', true);
        $('.volunteer_content input:text').attr('disabled', true);
    } else {
        $('.volunteer_content input:checkbox').removeAttr('disabled');
        $('.volunteer_content input:radio').removeAttr('disabled');
        $('.volunteer_content input:text').removeAttr('disabled');
    }
})
<?php endif;?>
</script>
</body>
</html>