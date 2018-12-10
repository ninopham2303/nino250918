<div class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
            <div class="shop-inner">
              <div class="page-title">
                <h2><?= $title ?></h2>
              </div>

              <div class="product-grid-area">
                <ul class="products-grid">
                <?php foreach ($data['product'] as $v): ?>

                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                        <?php if ($v->promotion_price != 0): ?>
                          <div class="icon-sale-label sale-left">Sale</div>
                        <?php endif ?>
                          <?php if ($v->new == 1): ?>
                          <div class="icon-new-label new-right">New</div>
                          <?php endif ?>
                          
                          <div class="pr-img-area">
                            <a title="<?= $v->name ?>" href="<?= $v->url ?>-<?= $v->id ?>.html">
                              <figure>
                                <img class="first-img" src="public/images/products-images/<?= $v->image ?>" alt="">
                                <img class="hover-img" src="public/images/products-images/<?= $v->image ?>" alt="">
                              </figure>
                            </a>
                            <button type="button" class="add-to-cart-mt">
                              <i class="fa fa-shopping-cart"></i>
                              <span>Thêm vào giỏ hàng</span>
                            </button>
                          </div>

                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title">
                              <a title="<?= $v->name ?>" href="<?= $v->url ?>-<?= $v->id ?>.html"><?= $v->name ?></a>
                            </div>
                            <div class="item-content">

                              <div class="item-price">
                                <div class="price-box">
                                <?php if ($v->promotion_price != 0): ?>
                                    <p class="special-price">
                                      <span class="price"><?= number_format($v->promotion_price) ?></span>
                                    </p>
                                    <p class="old-price">
                                      <span class="price"><?= number_format($v->price) ?></span>
                                    </p>
                                <?php else: ?>
                                    <p class="special-price">
                                      <span class="price"><?= number_format($v->price) ?></span>
                                    </p>
                                <?php endif ?>
                                    
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                                
                <?php endforeach ?>

                </ul>
              </div>
              <div class="pagination-area ">
                <?=$data['pagination']?>
              </div>
            </div>
          </div>
          <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="block shop-by-side">
              <div class="sidebar-bar-title">
                <h3>Sản phẩm theo:</h3>
              </div>
              <div class="block-content">
                <div class="layered-Category">
                  <h2 class="saider-bar-title">Thể loại</h2>
                  <div class="layered-content">
                    <ul class="check-box-list">
                      <?php foreach ($data['cate'] as $v): ?>
                        <li>
                          <input type="checkbox" id="<?= $v->id ?>" name="<?= $v->name ?>">
                          <label for="<?= $v->id ?>">
                            <span class="button"></span><?= $v->name ?>
                            <span class="count">(<?= $v->count ?>)</span>
                          </label>
                        </li>
                      <?php endforeach ?>
                      
                    </ul>
                  </div>
                </div>
                <div class="layered-Category">
                  <h2 class="saider-bar-title">Giá</h2>
                  <div class="layered-content">
                    <ul class="check-box-list">
                      <?php foreach ($data['count'] as $v): ?>
                        <li>
                          <input type="checkbox" id="<?= $v[1].'10' ?>" name="<?= $v[1] ?>" />
                          <label for="<?= $v[1].'10' ?>">
                            <span class="button"></span><?= $v[0] ?>
                            <span class="count">(<?= $v[1] ?>)</span>
                          </label>
                        </li>
                      <?php endforeach ?>
                      
                    </ul>
                  </div>
                </div>

              </div>
            </div>
            <div class="single-img-add sidebar-add-slider ">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="public/images/add-slide1.jpg" alt="slide1">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">shopping Now</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="public/images/add-slide2.jpg" alt="slide2">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Smartwatch Collection</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">All Collection</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="public/images/add-slide3.jpg" alt="slide3">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Summer Sale</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                </div>

                <!-- Controls -->

              </div>
            </div>
            <div class="block special-product">
              <div class="sidebar-bar-title">
                <h3>Sản phẩm đặc biệt</h3>
              </div>
              <div class="block-content">
                <ul>
                <?php foreach ($data['spePro'] as $var): ?>
                  <li class="item">
                      <div class="products-block-left">
                        <a href="<?= $var->url ?>-<?= $var->id ?>.html" title="<?= $var->name ?>" class="product-image">
                          <img src="public/images/products-images/<?= $var->image ?>" alt="<?= $var->name ?>">
                        </a>
                      </div>
                      <div class="products-block-right">
                        <p class="product-name">
                          <a href="<?= $var->url ?>-<?= $var->id ?>.html"><?= $var->name ?></a>
                        </p>
                        <?php if ($var->promotion_price != 0): ?>
                          <span class="price"><?= $var->promotion_price ?></span>
                        <?php else: ?>
                          <span class="price"><?= $var->price ?></span>
                        <?php endif ?>
                        
                        <div class="rating">
                        <?php 
                          $star = ceil($var->sum / 8); 
                          for ($i=1; $i <= $star ; $i++) { 
                            echo "<i class='fa fa-star'></i>";
                          }
                          for ($i=1; $i <= (5 - $star) ; $i++) { 
                            echo "<i class='fa fa-star-o'></i>";
                          }
                        ?>
                        </div>
                      </div>
                  </li>
                <?php endforeach ?>
                </ul>
                <a class="link-all" href="shop_grid.html">All Products</a>
              </div>
            </div>


          </aside>
        </div>
      </div>
    </div>