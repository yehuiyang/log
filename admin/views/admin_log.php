<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>管理中心 - 点滴记忆</title>
        <link type="text/css" href="views/css/cssreset-min.css" rel="stylesheet">
        <link type="text/css" href="views/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="views/css/select2.min.css" rel="stylesheet">
        <link type="text/css" type="text/css" href="views/css/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link type="text/css" href="views/css/css-main.css" rel="stylesheet">
        <script type="text/javascript" src="../include/lib/js/jquery/jquery-2.1.4.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js"charset="utf-8"></script>
        <script type="text/javascript" src="views/js/bootstrap.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="views/js/select2.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="views/js/common.js" charset="utf-8"></script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.htm" target="_blank" title="在新窗口浏站点">
                        点滴记忆                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><a href="index.htm"><i class="fa fa-home fa-fw"></i>管理首页</a></li>
                    <li><a href="configure.php.htm"><i class="fa fa-wrench fa-fw"></i> 设置</a></li>
                    <li><a href="../index.htm"><i class="fa fa-power-off fa-fw"></i>退出</a></li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-avatar">
                                <div style="text-align: center;">
                                    <a href="blogger.php.htm">
                                        <img class="img-circle" src="views/images/avatar.jpg" />
                                    </a>
                                </div>
                            </li>
                            <li><a href="./write_log.php" id="menu_wt"><i class="fa fa-edit fa-fw"></i> 写文章</a></li>
                            <li><a href="./admin_log.php" id="menu_log"><i class="fa fa-list-alt fa-fw"></i> 文章</a></li>
                                                        <li><a href="tag.php.htm" id="menu_tag"><i class="fa fa-tags fa-fw"></i> 标签</a></li>
                            <li><a href="sort.php.htm" id="menu_sort"><i class="fa fa-flag fa-fw"></i> 分类</a></li>
                                                        <li><a href="comment.php.htm" id="menu_cm"><i class="fa fa-comments fa-fw"></i> 评论
                                                                        </a></li>
                                                        <li><a href="page.php.htm" id="menu_page"><i class="fa fa-file-o fa-fw"></i> 页面</a></li>
                            <li><a href="link.php.htm" id="menu_link"><i class="fa fa-link fa-fw"></i> 友链</a></li>
                            <li id="menu_category_view" class="">
                                <a href="#"><i class="fa fa-eye fa-fw"></i> 外观<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" id="menu_view">
                                    <li><a href="widgets.php.htm" id="menu_widget"><i class="fa fa-columns fa-fw"></i> 侧边栏</a></li>
                                    <li><a href="navbar.php.htm" id="menu_navi"><i class="fa fa-bars fa-fw"></i> 导航</a></li>
                                    <li><a href="template.php.htm" id="menu_tpl"><i class="fa fa-eye fa-fw"></i> 模板</a></li>
                                </ul>
                            </li>
                            <li id="menu_category_sys" class="">
                                <a href="#"><i class="fa fa-cog fa-fw"></i> 系统<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" id="menu_sys">
                                    <li><a href="configure.php.htm" id="menu_setting"><i class="fa fa-wrench fa-fw"></i> 设置</a></li>
                                    <li><a href="user.php.htm" id="menu_user"><i class="fa fa-user fa-fw"></i> 用户</a></li>
                                    <li><a href="data.php.htm" id="menu_data"><i class="fa fa-database fa-fw"></i> 数据</a></li>
                                    <li><a href="plugin.php.htm" id="menu_plug"><i class="fa fa-plug fa-fw"></i> 插件</a></li>
                                    <li><a href="store.php.htm" id="menu_store"><i class="fa fa-shopping-cart fa-fw"></i> 应用</a></li>
                                </ul>
                            </li>
                                                                                </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
<div class="panel-heading">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="admin_log.php.htm">文章管理</a></li>
        <li role="presentation" ><a href="admin_log.php-pid=draft.htm">草稿管理</a></li>
                                                                                                            </ul>
</div>
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
<form action="http://127.0.0.1/emlog6/admin/admin_log.php?action=operate_log" method="post" name="form_log" id="form_log">
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
        <?php foreach ($art as $key => $value) {?>
          <tr>
              <td width="21"><input type="checkbox" name="blog[]" value="1" class="ids" /></td>
              <td width="490"><a href="write_log.php-action=edit&gid=1.htm"><?php echo $value['title']; ?></a>
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
            <?php }?>
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
    </div>
    <script type="text/javascript">
        $('select').select2();
    </script>
</body>

</html>