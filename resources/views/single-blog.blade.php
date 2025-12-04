@extends('layouts.app')

@section('title', 'Single Blog - Mamas Craft - Everyday Fashion Wear')

@section('content')
<div class="site-section blog-header-section">
        <div class="site-container">
            <div class="section-header">
                <div class="blog-tags">
                    <a href="#" class="site-btn bg-full-black text-white">Category</a>
                    <a href="#" class="text-black">5 min read</a>
                </div>
                
                <h1 class="site-title-h1 text-black">Blog title heading will go here</h1>
            </div>

            <img src="assets/images/blog-single-page-img.png" alt="" data-sr-id="14">
            
            <div class="single-blog-head">
                <div class="blog-admin">
                    <div class="admin-info dflex align-center">
                        <ul class="">
                            <li class="small-text text-black outfit-font upper-case text-bold-600">Written By</li>
                            <li class="body-text text-black admin-name">Full Name</li> <!-- Optional: create this function -->
                        </ul>

                        <ul class="">
                            <li class="small-text text-black outfit-font upper-case text-bold-600">Published on</li>
                            <li class="body-text text-black admin-name">22 January 2021</li> <!-- Optional: create this function -->
                        </ul>
                    </div>
                </div>

                <ul class="socials">
                                        
                    <!-- Instagram (No direct sharing link, just link to profile) -->
                    <li>
                        <a href="" target="_blank" rel="">
                            <img src="assets/images/blog-social-icn-01.svg" alt="">
                        </a>
                    </li>

                    <!-- LinkedIn Share -->
                    <li>
                        <a href="" target="_blank" rel="">
                            <img src="assets/images/blog-social-icn-02.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a href="" target="_blank" rel="">
                            <img src="assets/images/blog-social-icn-03.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a href="" target="_blank" rel="">
                            <img src="assets/images/blog-social-icn-04.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="site-section bg-grey">
        <div class="site-container single-content">
            <div class="site-row">
                <div class="site-col">
                    <div class="site-common-content">
                        <h2 class="site-title-h2 text-black">Introduction</h2>

                        <div class="body-text body-text-color">
                            <p class="body-text body-text-color">Eget quis mi enim, leo lacinia pharetra, semper. Eget in volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat.</p>

                            <p class="body-text body-text-color">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-row">
                <div class="site-col">
                    <img src="assets/images/blog-intro-img.png" class="single-full-img" alt="">
                    <div class="blog-caption body-text">Image caption goes here</div>
                </div>
            </div>

            <div class="site-row my-20">
                <div class="site-col">
                    <div class="site-common-content">
                        <p>Dolor enim eu tortor urna sed duis nulla. Aliquam vestibulum, nulla odio nisl vitae. In aliquet pellentesque aenean hac vestibulum turpis mi bibendum diam. Tempor integer aliquam in vitae malesuada fringilla.</p>

                        <p class="body-text body-text-color">Elit nisi in eleifend sed nisi. Pulvinar at orci, proin imperdiet commodo consectetur convallis risus. Sed condimentum enim dignissim adipiscing faucibus consequat, urna. Viverra purus et erat auctor aliquam. Risus, volutpat vulputate posuere purus sit congue convallis aliquet. Arcu id augue ut feugiat donec porttitor neque. Mauris, neque ultricies eu vestibulum, bibendum quam lorem id. Dolor lacus, eget nunc lectus in tellus, pharetra, porttitor.</p>

                        <div class="blog-caption body-text"><strong>“Ipsum sit mattis nulla quam nulla. Gravida id gravida ac enim mauris id. Non pellentesque congue eget consectetur turpis. Sapien, dictum molestie sem tempor. Diam elit, orci, tincidunt aenean tempus.”</strong></div>

                        <p class="body-text body-text-color">Tristique odio senectus nam posuere ornare leo metus, ultricies. Blandit duis ultricies vulputate morbi feugiat cras placerat elit. Aliquam tellus lorem sed ac. Montes, sed mattis pellentesque suscipit accumsan. Cursus viverra aenean magna risus elementum faucibus molestie pellentesque. Arcu ultricies sed mauris vestibulum.</p>
                    </div>
                </div>
            </div>

            <div class="site-row my-20">
                <div class="site-col">
                    <div class="site-common-content">
                        <h2 class="site-title-h2 text-black">Conclusion</h2>

                        <div class="body-text body-text-color">
                            <p class="body-text body-text-color">Eget quis mi enim, leo lacinia pharetra, semper. Eget in volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat.</p>

                            <p class="body-text body-text-color">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.</p>

                            <p class="body-text body-text-color">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.</p>

                            <p class="body-text body-text-color">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.</p>
                        </div>
                        

                        <div class="site-row row-middle-gap">
                            <div class="site-col">
                                <div class="blog-single-footer">
                                    <div class="share-blog">
                                        <h4>Share this post</h4>

                                        <ul class="socials blog-socials">
                                            <li><a href="#" target="_blank"><img src="assets/images/blog-dark-social-icn-01.svg" alt=""></a></li>
                                            <li><a href="#" target="_blank"><img src="assets/images/blog-dark-social-icn-02.svg" alt=""></a></li>
                                            <li><a href="#" target="_blank"><img src="assets/images/blog-dark-social-icn-03.svg" alt=""></a></li>
                                            <li><a href="#" target="_blank"><img src="assets/images/blog-dark-social-icn-04.svg" alt=""></a></li>
                                        </ul>
                                    </div>

                                    <div class="blog-tags">
                                        <a href="" class="site-btn bg-full-black text-white">Tag</a>
                                        <a href="" class="site-btn bg-full-black text-white">Tag2</a>
                                        <a href="" class="site-btn bg-full-black text-white">Tag3</a>
                                        <a href="" class="site-btn bg-full-black text-white">Tag4</a>
                                    </div>
                                </div>

                                <div class="site-divider bg-full-black my-40"></div>

                                <div class="blog-footer single-blog-footer-wrap dflex align-center">
                                    <img src="assets/images/blogger-img-01.png" class="blog-img-01" alt="">
                                    <div class="blogger-info dflex">
                                        <p class="small-text text-black text-bold-600 upper-case">Full name</p>
                                        <div class="blog-post-time text-grey dflex align-center">
                                            <p class="small-text">11 Jan 2022</p>
                                            <p class="small-text"><img src="assets/images/dot-light-icn.svg" alt=""></p>
                                            <p class="small-text">5 min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section for-desktop">
        <div class="site-container trending-section">
            <div class="site-row align-center row-gap-big">
                <div class="site-col flex-8">
                    <div class="section-header">
                        <p class="body-text text-black text-bold-600 upper-case tagline">Tagline</p>
                        <h2 class="site-title-h2 text-black">Related Products</h2>
                        <p class="body-text text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
                    </div>
                </div>

                <div class="site-col flex-3 for-desktop">
                    <div class="site-common-content">                        
                        <a href="#" class="site-btn bg-black text-white dflex align-center gap-2 small-text">View All <img src="assets/images/arrow-up-icn.svg" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="swiper product-swiper row-middle-gap">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-box">
                            <img src="assets/images/blog-img-01.png" class="img-full" alt="site-admin">
                            <div class="site-common-content">
                                <p class="subtitle-text text-black">Category</p>
                                <h3 class="text-black site-title-h3">Blog title heading will go here</h3>
                                <p class="blog-body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>

                                <div class="blog-footer dflex align-center">
                                    <img src="assets/images/blogger-img-01.png" class="blog-img-01" alt="">
                                    <div class="blogger-info dflex">
                                        <p class="subtitle-text text-black">Full name</p>
                                        <div class="blog-post-time dflex align-center">
                                            <p class="blog-body-text">11 Jan 2022</p>
                                            <img src="assets/images/dot.svg" alt="">
                                            <p class="blog-body-text">5 min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-box">
                            <img src="assets/images/blog-img-01.png" class="img-full" alt="site-admin">
                            <div class="site-common-content">
                                <p class="subtitle-text text-black">Category</p>
                                <h3 class="text-black site-title-h3">Blog title heading will go here</h3>
                                <p class="blog-body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>

                                <div class="blog-footer dflex align-center">
                                    <img src="assets/images/blogger-img-01.png" class="blog-img-01" alt="">
                                    <div class="blogger-info dflex">
                                        <p class="subtitle-text text-black">Full name</p>
                                        <div class="blog-post-time dflex align-center">
                                            <p class="blog-body-text">11 Jan 2022</p>
                                            <img src="assets/images/dot.svg" alt="">
                                            <p class="blog-body-text">5 min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-box">
                            <img src="assets/images/blog-img-01.png" class="img-full" alt="site-admin">
                            <div class="site-common-content">
                                <p class="subtitle-text text-black">Category</p>
                                <h3 class="text-black site-title-h3">Blog title heading will go here</h3>
                                <p class="blog-body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>

                                <div class="blog-footer dflex align-center">
                                    <img src="assets/images/blogger-img-01.png" class="blog-img-01" alt="">
                                    <div class="blogger-info dflex">
                                        <p class="subtitle-text text-black">Full name</p>
                                        <div class="blog-post-time dflex align-center">
                                            <p class="blog-body-text">11 Jan 2022</p>
                                            <img src="assets/images/dot.svg" alt="">
                                            <p class="blog-body-text">5 min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-box">
                            <img src="assets/images/blog-img-01.png" class="img-full" alt="site-admin">
                            <div class="site-common-content">
                                <p class="subtitle-text text-black">Category</p>
                                <h3 class="text-black site-title-h3">Blog title heading will go here</h3>
                                <p class="blog-body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>

                                <div class="blog-footer dflex align-center">
                                    <img src="assets/images/blogger-img-01.png" class="blog-img-01" alt="">
                                    <div class="blogger-info dflex">
                                        <p class="subtitle-text text-black">Full name</p>
                                        <div class="blog-post-time dflex align-center">
                                            <p class="blog-body-text">11 Jan 2022</p>
                                            <img src="assets/images/dot.svg" alt="">
                                            <p class="blog-body-text">5 min read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
            <div class="row-middle-gap swiper-view-bttn for-mobile">
                <a href="#" class="site-btn bg-black text-white dflex align-center gap-2 small-text">View All <img src="assets/images/arrow-up-icn.svg" alt=""></a>
            </div>

        </div>
    </div>


    <div class="site-section for-mobile">
        <div class="site-container trending-section">
            <div class="site-row align-center row-gap-big">
                <div class="site-col flex-8">
                    <div class="site-common-content">
                        <h2 class="site-title-h2 text-black">Trending Wears</h2>
                    </div>
                </div>
                <div class="site-col flex-3 for-desktop">
                    <div class="site-common-content">                        
                        <a href="#" class="site-btn bg-black text-white dflex align-center gap-2 small-text">View All <img src="assets/images/arrow-up-icn.svg" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="swiper single-product-swiper product-swiper row-middle-gap">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-showcase">
                                <img src="assets/images/trend-img-01.png" class="product-box-base img-full" alt="">
                            </div>

                            <div class="product-info text-black">
                                <div class="single-product-content">
                                    <h3 class="site-title-h3 product-title">relaxed striped t shirt</h3>
                                    <p class="product-price text-black">$55</p>
                                </div>

                                <div class="color-varients">
                                    <span class="color-1"></span>
                                    <span class="color-2"></span>
                                    <span class="color-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-showcase">
                                <img src="assets/images/trend-img-01.png" class="product-box-base img-full" alt="">
                            </div>

                            <div class="product-info text-black">
                                <div class="single-product-content">
                                    <h3 class="site-title-h3 product-title">relaxed striped t shirt</h3>
                                    <p class="product-price text-black">$55</p>
                                </div>

                                <div class="color-varients">
                                    <span class="color-1"></span>
                                    <span class="color-2"></span>
                                    <span class="color-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-showcase">
                                <img src="assets/images/trend-img-01.png" class="product-box-base img-full" alt="">
                            </div>

                            <div class="product-info text-black">
                                <div class="single-product-content">
                                    <h3 class="site-title-h3 product-title">relaxed striped t shirt</h3>
                                    <p class="product-price text-black">$55</p>
                                </div>

                                <div class="color-varients">
                                    <span class="color-1"></span>
                                    <span class="color-2"></span>
                                    <span class="color-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-showcase">
                                <img src="assets/images/trend-img-01.png" class="product-box-base img-full" alt="">
                            </div>

                            <div class="product-info text-black">
                                <div class="single-product-content">
                                    <h3 class="site-title-h3 product-title">relaxed striped t shirt</h3>
                                    <p class="product-price text-black">$55</p>
                                </div>

                                <div class="color-varients">
                                    <span class="color-1"></span>
                                    <span class="color-2"></span>
                                    <span class="color-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <div class="row-middle-gap swiper-view-bttn for-mobile">
                <a href="#" class="site-btn bg-black text-white dflex align-center gap-2 small-text">View All <img src="assets/images/arrow-up-icn.svg" alt=""></a>
            </div>

        </div>
    </div>

@endsection 