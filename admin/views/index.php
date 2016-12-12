<?php include __DIR__.'/head.php'; ?>
        <div id="page-wrapper">
            <script type="text/javascript">
            setTimeout(hideActived, 2600);
            </script>
            <div class="containertitle"><b>管理首页</b></div>
            <?php echo isset($_GET['message'])?get_message($_GET['message']):''; ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-laptop fa-fw"></i> 站点信息
                        </div>
                        <div class="panel-body" id="admindex_servinfo">
                            <ul>
                                <li>有<b>1</b>篇文章，<b>0</b>条评论</li>
                                <li>数据库表前缀：emlog_</li>
                                <li>PHP版本：5.5.12</li>
                                <li>MySQL版本：5.6.17</li>
                                <li>服务器环境：Apache/2.4.9 (Win32) PHP/5.5.12</li>
                                <li>GD图形处理库：bundled (2.1.0 compatible)</li>
                                <li>服务器空间允许上传最大文件：64M</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-volume-down fa-fw"></i> 官方消息
                        </div>
                        <div class="panel-body" id="admindex_msg">
                            <ul></ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="admindex">
                        <div id="about" class="alert alert-warning">
                            欢迎使用 © <a href="../../../www.emlog.net/index.htm" target="_blank">emlog</a> v6.0.0-Beta  <span><a id="ckup" href="javascript:void(0);">检查更新</a></span>
                            <br />
                            <span id="upmsg"></span>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function() {
                $("#admindex_msg ul").html("<span class=\"ajax_remind_1\">正在读取...</span>");
                $.getJSON("http://www.emlog.net/services/messenger.php?v=6.0.0-Beta&callback=?" ,
                    function(data) {
                        $("#admindex_msg ul").html("");
                        $.each(data.items, function(i, item) {
                            var image = '';
                            if (item.image != '') {
                                image = "<a href=\"" + item.url + "\" target=\"_blank\" title=\"" + item.title + "\"><img src=\"" + item.image + "\"></a><br />";
                            }
                            $("#admindex_msg ul").append("<li class=\"msg_type_" + item.type + "\">" + image + "<span>" + item.date + "</span><a href=\"" + item.url + "\" target=\"_blank\">" + item.title + "</a></li>");
                        });
                    });
            });
            $("#about #ckup").click(function() {
                $("#about #upmsg").html("正在检查，请稍后").addClass("ajaxload");
                $.getJSON("http://www.emlog.net/services/check_update.php?ver=6.0.0-Beta&callback=?",
                    function(data) {
                        if (data.result.match("no")) {
                            $("#about #upmsg").html("目前还没有适合您当前版本的更新！").removeClass();
                        } else if (data.result.match("yes"))  {
                            $("#about #upmsg").html("有可用的emlog更新版本 " + data.ver + "，更新之前请您做好数据备份工作，<a id=\"doup\" href=\"javascript:doup('" + data.file + "','" + data.sql + "');\">现在更新</a>").removeClass();
                        } else {
                            $("#about #upmsg").html("检查失败，可能是网络问题").removeClass();
                        }
                    });
            });

            function doup(source, upsql) {
                $("#about #upmsg").html("系统正在更新中，请耐心等待").addClass("ajaxload");
                $.get('./index.php?action=update&source=' + source + "&upsql=" + upsql,
                    function(data) {
                        $("#about #upmsg").removeClass();
                        if (data.match("succ")) {
                            $("#about #upmsg").html('恭喜您！更新成功了，请<a href="index.htm"/*tpa=http://127.0.0.1/emlog6/admin/*/>刷新页面</a>开始体验新版emlog');
                        } else if (data.match("error_down")) {
                            $("#about #upmsg").html('下载更新失败，可能是服务器网络问题');
                        } else if (data.match("error_zip")) {
                            $("#about #upmsg").html('解压更新失败，可能是你的服务器空间不支持zip模块');
                        } else if (data.match("error_dir")) {
                            $("#about #upmsg").html('更新失败，目录不可写');
                        } else {
                            $("#about #upmsg").html('更新失败');
                        }
                    });
            }
            </script>
            <div id="footer"></div>
        </div>
<?php include __DIR__.'/foot.php'; ?>
