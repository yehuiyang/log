<?php include 'views/head.php' ?>
    <!--content start-->
    <div id="content">
       <!--left-->
         <div class="left" id="news">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="#">首页</a>><a href="#">学无止境</a>><span>文章内容</span></div>
           </div>
           <div class="news_content">
                  <div class="news_top">
                    <h1 style="margin: 0px;"><?php echo $art[1]; ?></h1>
                    <p style="margin-top: 0px;">
                      <span class="left sj">时间:<?php echo $art[3]; ?></span><span class="left fl">分类:学无止境</span>
                      <span class="left author">段亮</span>
                    </p>
                    <div class="clear"></div>
                  </div>
                    <div class="news_text"><?php echo $art[2]; ?>
                    <p></p>
                    </div>
                    <form action="" method="post" class="am-form">
                      <fieldset>
                        <legend>发表评论</legend>
                        <div>昵称：<input type="text" name="nkname"
                        ><input type="hidden" name="artid" value="<?php echo $art[0]; ?>"
                        ><input type="hidden" name="postdate" value="<?php echo $time; ?>" 
                        ></div>
                        <div class="am-form-group">
                          <label for="doc-ta-1">评论</label>
                          <textarea class="" rows="5" id="doc-ta-1"></textarea>
                        </div>

                        <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
                      </fieldset>
                    </form>

                    <ul class="am-comments-list am-comments-list-flip">
                    <?php if(!empty($coms)):foreach ($coms as $key => $value):?>
                      <li class="am-comment am-comment-primary">
                        <a href="#link-to-user-home">
                          <img src="" alt="" class="am-comment-avatar" width="48" height="48">
                        </a>
                        <div class="am-comment-main">
                          <header class="am-comment-hd">
                            <div class="am-comment-meta">
                              <a href="#link-to-user" class="am-comment-author"><?php echo $value['nkname'] ?>
                              </a> 评论于 
                              <time><?php echo $value['postdate'] ?></time>
                            </div>
                          </header>
                          <div class="am-comment-bd">
                            <p>
                              <a href="#lin-to-user">@某人</a> <?php echo $value['content'] ?>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php endforeach;?>
                  <?php endif;?>
                    </ul>
           </div>
     
         </div>
         <!--end left -->
         <!--right-->
          <div class="right" id="c_right">
          <div class="s_about">
          <h2>关于博主</h2>
           <img src="views/images/my.jpg" width="230" height="230" alt="博主"/>
           <p>博主：XX</p>
           <p>职业：web前端、视觉设计</p>
           <p>简介：</p>
           <p>
           <a href="#" title="联系博主"><span class="left b_1"></span></a><a href="#" title="加入QQ群，一起学习！"><span class="left b_2"></span></a>
           <div class="clear"></div>
           </p>
          </div>
          <!--栏目分类-->
           <div class="lanmubox">
              <div class="hd">
               <ul><li>精心推荐</li><li>最新文章</li><li class="hd_3">随机文章</li></ul>
              </div>
              <div class="bd">
                <ul>
					<li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
					<li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
					<li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
					<li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
					<li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
				</ul>
                 <ul>
					<li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
					<li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
					<li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
					<li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
					<li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
				</ul>
                 <ul>
					<li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
					<li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
					<li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
					<li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
					<li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
				</ul>
                 
                
              </div>
           </div>
           <!--end-->
         </div>
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
<?php include 'views/foot.php'; ?>


