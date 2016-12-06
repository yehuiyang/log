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
                    <li><a href="" id="menu_wt"><i class="fa fa-edit fa-fw"></i> 写文章</a></li>
                    <li><a href="./admin_log.php" id="menu_log"><i class="fa fa-list-alt fa-fw"></i> 文章</a></li>
                    <li><a href="tag.php.htm" id="menu_tag"><i class="fa fa-tags fa-fw"></i> 标签</a></li>
                    <li><a href="sort.php.htm" id="menu_sort"><i class="fa fa-flag fa-fw"></i> 分类</a></li>
                    <li><a href="comment.php.htm" id="menu_cm"><i class="fa fa-comments fa-fw"></i> 评论</a></li>
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
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
<script type="text/javascript" charset="utf-8" src="editor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="editor/lang/zh_CN.js"></script>

<form action="" method="post" enctype="multipart/form-data" id="addlog" name="addlog">
    <!--文章内容-->
    <div class="col-lg-8">
        <div class="containertitle">
            <b>写文章</b><span id="msg_2"></span>
        </div>
        <div id="msg"></div>
        <div id="post" class="form-group">
            <div>
                <input type="text" name="title" id="title" value="" class="form-control" placeholder="文章标题" />
            </div>
            <div id="post_bar">
                <div class="show_advset">
                    <span onclick="displayToggle('FrameUpload', 0);autosave(1);">上传插入<i class="fa fa-caret-right fa-fw"></i></span>
                                        <span id="asmsg"></span>
                    <input type="hidden" name="as_logid" id="as_logid" value="-1">
                </div>
                <div id="FrameUpload" style="display: none;">
                    <iframe width="100%" height="330" frameborder="0" src="./views/attachment.php"></iframe>
                </div>
            </div>
            <div>
                <textarea id="content" name="content" style="width:100%; height:460px;"></textarea>
            </div>
            <div class="show_advset" onclick="displayToggle('advset', 1);">高级选项<i class="fa fa-caret-right fa-fw"></i></div>
            <div id="advset">
                <div>文章摘要：</div>
                <div><textarea id="excerpt" name="excerpt" style="width:100%; height:260px;"></textarea></div>
            </div>
        </div>
        <div class=line></div>
    </div>

    <!--文章侧边栏-->
    <div class="col-lg-4 container-side">
        <div class="panel panel-default">
            <div class="panel-heading">设置项</div>
            <div class="panel-body">
                <div class="form-group">
                    <select name="sort" id="sort" class="form-control">
                        <option value="-1">选择分类...</option>
                                                </select>
                    </div>
                    <div class="form-group">
                        <label>标签：</label>
                        <input name="tag" id="tag" class="form-control" value="" placeholder="文章标签，使用逗号分隔" />
                        <span style="color:#2A9DDB;cursor:pointer;margin-right: 40px;"><a href="javascript:displayToggle('tagbox', 0);">已有标签+</a></span>
                        <div id="tagbox" style="display: none;">
                            还没有设置过标签！                        </div>
                    </div>

                    <div class="form-group">
                        <label>发布时间：</label>
                        <input maxlength="200" name="postdate" id="postdate" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label>链接别名：</label>
                        <input name="alias" id="alias" class="form-control" value="" />
                    </div>
                    
                    <div class="form-group">
                        <label>访问密码：</label>
                        <input type="text" name="password" id="password" class="form-control" value="" />
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" value="y" name="top" id="top"  />
                        <label for="top">首页置顶</label>
                        <input type="checkbox" value="y" name="sortop" id="sortop"  />
                        <label for="sortop">分类置顶</label>
                        <input type="checkbox" value="y" name="allow_remark" id="allow_remark" checked="checked"  />
                        <label for="allow_remark">允许评论</label>
                    </div>
                </div>
            </div>

            <div id="post_button">
                <input name="token" id="token" value="ac94bc4fcfa2345512df6888adc83e8f" type="hidden" />
                <input type="hidden" name="ishide" id="ishide" value="" />
                <input type="hidden" name="gid" value=-1 />
                <input type="hidden" name="author" id="author" value=1 />

                                    <input type="submit" value="发布文章" onclick="return checkform();" class="btn btn-primary" />
                    <input type="button" name="savedf" id="savedf" value="保存草稿" onclick="autosave(2);" class="btn btn-success" />
                                
            </div>
        </div>
    </form>
    <script type="text/javascript">
        loadEditor('content');
        loadEditor('excerpt');
        $("#menu_wt").addClass('active');
        $("#advset").css('display', $.cookie('em_advset') ? $.cookie('em_advset') : '');
        $("#alias").keyup(function () {
            checkalias();
        });
        setTimeout("autosave(0)", 60000);
        $("#menu_wt").addClass('active');
    </script>
            <div id="footer"></div>
        </div>
    </div>
    <script type="text/javascript">
        $('select').select2();
    </script>
</body>

</html>