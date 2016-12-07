<?php include __DIR__.'/head.php'; ?>
            <div id="page-wrapper">
<?php if(isset($message)): ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?php echo $message; ?>
</div>
<?php endif; ?>
<div class="panel-heading">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="admin_log.php.htm">文章管理</a></li>
        <li role="presentation" ><a href="admin_log.php-pid=draft.htm">草稿管理</a></li>
        <div style="margin: 0px 15px;">
<div class=line></div>
<div class="filters">
<div id="f_title" class="form-inline">
    <div style="float:left; margin-top:8px;">
        <span id="f_t_sort">
            <select name="bysort" id="bysort" onChange="selectSort(this);" style="width:120px;" class="form-control">
                <option value="" selected="selected">按分类查看...</option>
                <option value="-1" >未分类</option>
            </select>
        </span>
                <span id="f_t_tag"><a href="javascript:void(0);">按标签查看</a></span>
    </div>
    <div style="float:right;">
        <form action="http://127.0.0.1/emlog6/admin/admin_log.php" method="get">
            <input type="text" name="keyword" class="form-control" placeholder="搜索文章">
                </form>
    </div>
    <div style="clear:both"></div>
</div>
<div id="f_tag" style="display:none;">
    标签：
    还没有标签</div>
</div>
<form action="admin_log.php?action=operate_log" method="post" name="form_log" id="form_log">
  <input type="hidden" name="pid" value="">
  <table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr>
        <th width="511" colspan="2"><b>标题</b></th>
                <th width="50" class="tdcenter"><b>查看</b></th>
                <th width="100"><b>作者</b></th>
        <th width="146"><b>分类</b></th>
        <th width="130"><b><a href="admin_log.php-sortDate=DESC.htm">时间</a></b></th>
        <th width="49" class="tdcenter"><b><a href="admin_log.php-sortComm=ASC.htm">评论</a></b></th>
        <th width="59" class="tdcenter"><b><a href="admin_log.php-sortView=ASC.htm">阅读</a></b></th>
      </tr>
    </thead>
    <tbody>
        <?php if(isset($art)&&is_array($art)): ?>
        <?php foreach ($art as $key => $value): ?>
          <tr>
              <td width="21"><input type="checkbox" name="blog[]" value="<?php echo $value['id']; ?>" class="ids" /></td>
              <td width="490"><a href="write_log.php?action=edit&id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                                      <span style="display:none; margin-left:8px;">
                      </span>
              </td>
                    <td class="tdcenter">
              <a href="../-post=1" target="_blank" title="在新窗口查看">
              <img src="views/images/vlog.gif" align="absbottom" border="0" /></a>
              </td>
                    <td><a href="admin_log.php-uid=1.htm">紫殇</a></td>
              <td><a href="admin_log.php-sid=-1.htm">未分类</a></td>
              <td class="small"><?php echo $value['postdate']; ?></td>
              <td class="tdcenter"><a href="comment.php-gid=1.htm">0</a></td>
              <td class="tdcenter">0</td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
    <input name="token" id="token" value="bb1bb62fac972af39766d4071fd3133d" type="hidden" />
    <input name="operate" id="operate" value="" type="hidden" />
    <div class="list_footer form-inline">
    <a href="javascript:void(0);" id="select_all">全选</a> 选中项：
    <a href="javascript:logact('del');" class="care">删除</a> | 
        <a href="javascript:logact('hide');">放入草稿箱</a> | 

        <select name="top" id="top" onChange="changeTop(this);" style="width:120px;" class="form-control">
        <option value="" selected="selected">置顶操作...</option>
        <option value="top">首页置顶</option>
        <option value="sortop">分类置顶</option>
        <option value="notop">取消置顶</option>
    </select>
    
    <select name="sort" id="sort" onChange="changeSort(this);" style="width:120px;" class="form-control">
    <option value="" selected="selected">移动到分类...</option>

        <option value="-1">未分类</option>
    </select>

    
        </div>
</form>
<div class="page"> (有1篇文章)</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#f_t_tag").click(function(){$("#f_tag").toggle();$("#f_sort").hide();$("#f_user").hide();});
    selectAllToggle();
});
setTimeout(hideActived,2600);
function logact(act){
    if (getChecked('ids') == false) {
        alert('请选择要操作的文章');
        return;}
    if(act == 'del' && !confirm('你确定要删除所选文章吗？')){return;}
    $("#operate").val(act);
    $("#form_log").submit();
}
function changeSort(obj) {
    if (getChecked('ids') == false) {
        alert('请选择要操作的文章');
        return;}
    if($('#sort').val() == '')return;
    $("#operate").val('move');
    $("#form_log").submit();
}
function changeAuthor(obj) {
    if (getChecked('ids') == false) {
        alert('请选择要操作的文章');
        return;}
    if($('#author').val() == '')return;
    $("#operate").val('change_author');
    $("#form_log").submit();
}
function changeTop(obj) {
    if (getChecked('ids') == false) {
        alert('请选择要操作的文章');
        return;}
    if($('#top').val() == '')return;
    $("#operate").val(obj.value);
    $("#form_log").submit();
}
function selectSort(obj) {
    window.open("./admin_log.php?sid=" + obj.value + "", "_self");
}
function selectUser(obj) {
    window.open("./admin_log.php?uid=" + obj.value + "", "_self");
}
$("#menu_log").addClass('active');
</script>
            <div id="footer"></div>
        </div>
<?php include __DIR__.'/foot.php'; ?>