<?php include __DIR__.'/head.php'; ?>
<div id="page-wrapper">
    <div class="containertitle"><b>评论管理</b>
        <?php echo isset($_GET['message'])?get_message($_GET['message']):''; ?>
    </div>
    <div class=line></div>
    <form action="?action=del" method="post" name="form_com" id="form_com">
        <table class="table table-striped table-bordered table-hover dataTable no-footer">
            <thead>
                <tr>
                    <th width="369" colspan="2"><b>内容</b></th>
                    <th width="300"><b>评论者</b></th>
                    <th width="250"><b>所属文章</b></th>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($coms)): ?>
                <?php foreach($coms as $key => $value): ?>
                <tr>
                    <td width="19">
                        <input type="checkbox" value="<?php echo $value['id'] ?>" name="com[]" class="ids" />
                    </td>
                    <td width="350"><a href="comment.php?action=reply_comment&amp;cid=5" ><?php echo $value['content'] ?></a>
                        <br /><?php echo $value['postdate'] ?> <span style="display:none; margin-left:8px;">
                        <a href="javascript: em_confirm(5, 'comment', '113615fa4fe2aa3df3b866a8a924a3ff');" class="care">删除</a>
                        <a href="comment.php?action=hide&amp;id=5">隐藏</a>
                        <a href="comment.php?action=reply_comment&amp;cid=5">回复</a>
                        <a href="comment.php?action=edit_comment&amp;cid=5">编辑</a>
                    </span>
                    </td>
                    <td><a href="https://www.luoyy.com/" target="_blank"><?php echo $value['nkname'] ?></a> (820388972@qq.com)
                        <br />来自：222.211.173.181 <a href="javascript: em_confirm('222.211.173.181', 'commentbyip', '5aefb729f9ef88ab89f0facb95faf992');" title="删除来自该IP的所有评论" class="care">(X)</a></td>
                    <td><a href="../home/index.php?id=<?php echo $value['artid'] ?>" target="_blank" title="查看该文章"><?php echo $value['arttit'] ?></a></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="list_footer">
            <a href="javascript:void(0);" id="select_all">全选</a> 选中项：
            <a href="javascript:commentact('del');" class="care">删除</a>
            <a href="javascript:commentact('hide');">隐藏</a>
            <a href="javascript:commentact('pub');">审核</a>
            <input name="operate" id="operate" value="" type="hidden" />
        </div>
        <div class="page"> (有<?php echo $res[0]; ?>条评论)</div>
    </form>
    <script type="text/javascript">
    $(document).ready(function() {
        selectAllToggle();
        $("#adm_comment_list tbody tr:odd").addClass("tralt_b");
        $("#adm_comment_list tbody tr")
            .mouseover(function() {
                $(this).addClass("trover");
                $(this).find("span").show();
            })
            .mouseout(function() {
                $(this).removeClass("trover");
                $(this).find("span").hide();
            })
    });
    setTimeout(hideActived, 2600);

    function commentact(act) {
        if (getChecked('ids') == false) {
            alert('请选择要操作的评论');
            return;
        }
        if (act == 'del' && !confirm('你确定要删除所选评论吗？')) {
            return;
        }
        $("#operate").val(act);
        $("#form_com").submit();
    }
    $("#menu_cm").addClass('active');
    </script>
    <div id="footer"></div>
</div>
</div>
<?php include __DIR__.'/foot.php'; ?>