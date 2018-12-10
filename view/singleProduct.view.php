    <!-- Main Container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view-area" style="width:100%">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <div class="icon-sale-label sale-left">Sale</div>
                <div class="large-image">
                  <a href="public/images/products-images/<?= $data['product']->image ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img class="zoom-img" src="public/images/products-images/<?= $data['product']->image ?>" style="width:100%" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1><?= $data['product']->name ?></h1>
                </div>
                <?php if ($data['product']->promotion_price != 0): ?>
                  <div class="price-box">
                    <p class="special-price">
                      <span class="price-label">Special Price</span>
                      <span class="price"><?= number_format($data['product']->promotion_price) ?></span>
                    </p>
                    <p class="old-price">
                      <span class="price-label">Regular Price:</span>
                      <span class="price"><?= number_format($data['product']->price) ?></span>
                    </p>
                  </div>
                <?php else: ?>
                <div class="price-box">
                  <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price"><?= number_format($data['product']->price) ?></span>
                  </p>
                </div>
                <?php endif ?>
                

                <div class="short-description">
                  <h2>Chi tiết</h2>
                  <?= $data['product']->detail ?>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Số lượng:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button">
                      <span>
                        <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Sản phẩm cùng loại</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                <?php foreach ($data['ralateProducts'] as $v): ?>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                      <?php if ($v->promotion_price != 0): ?>
                        <div class="icon-sale-label sale-left">Sale</div>
                      <?php endif ?>
                      <?php if ($v->new == 1): ?>
                        <div class="icon-new-label new-right">New</div>
                      <?php endif ?>  
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products-images/<?= $v->image ?>" alt="">
                          <img class="hover-img" src="public/images/products-images/<?= $v->image ?>" alt="">
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
                <?php endforeach ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->