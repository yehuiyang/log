<?php include 'views/head.php';?>
    <!--content start-->
    <div id="content_xc">
         <div class="weizi">
           <div class="wz_text">当前位置：<a href="#">首页</a>><h1>相册展示</h1></div>
         </div>
         <div class="xc_content">
          <div class="con-bg">
              <div class="w960 mt_10">
               <div class="w650">
                <ul class="tips" id="wf-main" style="display:none" >
                        <li class="wf-cld"><img src="./views/images/photo/8.jpg"  width="200" height="178" alt="" /></li>         
                        <li class="wf-cld"><img src="./views/images/photo/1.jpg" height="147" width="200" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/2.jpg"  width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/3.jpg"  width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/4.jpg" width="200" height="299" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/5.jpg" width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/6.jpg" width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/7.jpg" width="200" height="135" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/9.jpg"  width="200" height="300" alt="" /></li>
                        <li class="wf-cld"><img src="./views/images/photo/10.jpg"  width="200" height="107" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/8.jpg"  width="200" height="178" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/1.jpg" height="147" width="200" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/2.jpg"  width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/3.jpg"  width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/4.jpg" width="200" height="299" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/5.jpg" width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/6.jpg" width="200" height="267"alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/7.jpg" width="200" height="135" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/9.jpg"  width="200" height="300" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/10.jpg"  width="200" height="107" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/2.jpg"  width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/3.jpg"  width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/8.jpg"  width="200" height="178" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/1.jpg" height="147" width="200" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/2.jpg"  width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/3.jpg"  width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/4.jpg" width="200" height="299" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/5.jpg" width="200" height="125" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/6.jpg" width="200" height="267"alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/7.jpg" width="200" height="135" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/9.jpg"  width="200" height="300" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/10.jpg"  width="200" height="107" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/2.jpg"  width="200" height="267" alt="" /></li>
                        <li class="wf-cld"><img rel="lazy" lazy_src="./views/images/photo/3.jpg"  width="200" height="125" alt="" /></li>
                    </ul>
               </div>
             </div>
           </div>
         </div>
    </div>
    <!--content end-->
  <!--footer-->
    <div id="footer">
     <p>Design by:少年 2014-8-9</p>
    </div>
    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="views/js/nav.js"></script>
     <script>

    var timer, m = 0, m1 = $("img[rel='lazy']").length;

    function fade() {

        $("img[rel='lazy']").each(function () {

            var $scroTop = $(this).offset();

            if ($scroTop.top <= $(window).scrollTop() + $(window).height()) {

                $(this).hide();

                $(this).attr("src", $(this).attr("lazy_src"));

                $(this).attr("top", $scroTop.top);

                $(this).removeAttr("rel");

                $(this).removeAttr("lazy_src");

                $(this).fadeIn(600);

                var _left = $(this).parent().parent().attr("_left");

                if (_left != undefined)

                    $(this).parent().parent().animate({ left: _left }, 400);

                m++;

            }

        });

        if (m < m1) { timer = window.setTimeout(fade, 300); }

        else { window.clearTimeout(timer); }

    }

    $(function () {

        $("#wf-main img[rel='lazy']").each(function (i) {

            var _left = $(this).parent().parent().css("left").replace("px", "");

            $(this).parent().parent().attr("_left", _left);

            $(this).parent().parent().css("left", 0);

        });

        fade();

    });

    $(".loading").hide();

    $("#wf-main").show();

</script>	
</body>
</html>