    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Blog</h1>
                            <p>Blog with right sidebar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <?php foreach ($data["posts"] as $post): ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="single-blog single-column">
                                    <div class="post-thumb">
                                        <a href="/blog/?route=blog_details&id=<?= $post["id"] ?>"><img src="/blog/web/uploads/<?= $post["imageFileName"] ?>" class="img-responsive" alt=""></a>
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                       </div>
                                    </div>
                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="/blog/?route=blog_details&id=<?= $post["id"] ?>"><?= $post["title"] ?></a></h2>
                                        <h3 class="post-author"><a href="#">Posted by <?= $post["author"] ?></a></h3>
                                        <p><?= $post["content"] ?></p>
                                        <a href="#" class="read-more">View More</a>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="tpl"></div> -->
                        <script>
                            // $.get('/blog/app.php?ajax')
                            // .success(function(response) {
                            //     var res = JSON.parse(response);
                            //     Object.keys(res).forEach(function(value) {
                            //         $.get('/blog/blog.html')
                            //         .success(function (template) {
                            //             var tpl = $.parseHTML(template);
                            //             $(".tpl").append(tpl)
                            //             $(".post-title a").html(res[value]["title"])
                            //         });
                            //     })
                            //     console.log(typeof res );
                            // })
                            // .fail(function(response) {
                            //     console.error(response);
                            // })
                        </script>
                    </div>
                    <div class="blog-pagination">
                        <ul class="pagination">
                          <li><a href="#">left</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li class="active"><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">6</a></li>
                          <li><a href="#">7</a></li>
                          <li><a href="#">8</a></li>
                          <li><a href="#">9</a></li>
                          <li><a href="#">right</a></li>
                        </ul>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Comments</h3>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="web/images/portfolio/project1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="web/images/portfolio/project2.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="web/images/portfolio/project3.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Tag Cloud</h3>
                            <ul class="nav nav-pills">
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Joomla</a></li>
                                <li><a href="#">Abstract</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Product</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item popular">
                            <h3>Latest Photos</h3>
                            <ul class="gallery">
                                <li><a href="#"><img src="web/images/portfolio/popular1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="web/images/portfolio/popular2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="web/images/portfolio/popular3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="web/images/portfolio/popular4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="web/images/portfolio/popular5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="web/images/portfolio/popular1.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
