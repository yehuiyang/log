<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>upload</title>
    <link type="text/css" href="css/css-att.css" rel="stylesheet">
    <script type="text/javascript">
        function uploadfile(){
            var as_logid = parent.document.getElementById('as_logid').value
            document.upload.action = "attachment.php?action=upload&logid="+as_logid;
            document.upload.submit();
        }
        function showupload(multi){
            var as_logid = parent.document.getElementById('as_logid').value
            window.location.href="attachment.php-action=selectFile&logid=.htm"/*tpa=http://127.0.0.1/emlog6/admin/attachment.php?action=selectFile&logid=*/+as_logid+"&multi="+multi;
        }
        function showattlib(){
            var as_logid = parent.document.getElementById('as_logid').value
            window.location.href="attachment.php-action=attlib&logid=.htm"/*tpa=http://127.0.0.1/emlog6/admin/attachment.php?action=attlib&logid=*/+as_logid;
        }
        function addattachfrom() {
            var newnode = document.getElementById('attachbodyhidden').firstChild.cloneNode(true);
            document.getElementById('attachbody').appendChild(newnode);
        }
        function removeattachfrom() {
            document.getElementById('attachbody').childNodes.length > 1 && document.getElementById('attachbody').lastChild ? document.getElementById('attachbody').removeChild(document.getElementById('attachbody').lastChild) : 0;
        }
    </script>
</head>
<body>
    <div id="media-upload-header">
        <span id="curtab"><a href="javascript:showupload(0);">上传附件</a></span>
        <span><a href="javascript:showupload(1);">批量上传</a></span>
        <span><a href="javascript:showattlib();">附件库（0）</a></span>
    </div>
    <form enctype="multipart/form-data" method="post" name="upload" action="">
        <div id="media-upload-body">
            <p>(单个附件最大：20MB，允许类型： rar zip gif jpg jpeg png txt pdf docx doc xls xlsx)
                <div id="attachbodyhidden" style="display:none"><span><input type="file" name="attach[]"></span></div>
                <div id="attachbody"><span><input type="file" name="attach[]" /></span></div>
                <input type="button" name="html-upload" value="上传" onclick="uploadfile();"/>
                <span style="margin-left:10px">
                    <a id="attach" title="增加附件" onclick="addattachfrom()" href="javascript:;" name="attach">[ + ]</a> 
                    <a id="attach" title="减少附件" onclick="removeattachfrom()" href="javascript:;" name="attach">[ - ]</a>
                </span>
            </p>
        </div>
    </form>
</body>
</html>
