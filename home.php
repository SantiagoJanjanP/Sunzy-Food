<div class="container">
        <!-- <div class="arrow l" onclick="prev()">
            <img src="img/l.png" alt="l">
        </div> -->
        <div class="slide slide-1">
        <div class="caption">
                <h3>Welcome to Sunzy food cuisine <br>Food Provider</h3>
                <p>A Healthier, Delicious Food</p>
                <a href="./?page=products" class="btn btn-primary"> Order Now </a>
            </div>
        </div>
        <div class="slide slide-2">
            <div class="caption">
            <h3>The Best Chef <br>Exploring different flavors, ingredients, and cooking techniques that make each cuisine unique.</h3>
                <p>From savory Italian pastas to spicy Indian curries<br>mouth-watering recipes</p>
                <a href="./?page=products" class="btn btn-primary"> Order Now </a>
            </div>
       </div>
       <div class="slide slide-3">
            <div class="caption">
                <h3>Buy Now</h3>
                <p>We are the Sunzy</p>
            </div>
       </div>
       <!-- <div class="arrow r" onclick="next()">
            <img src="img/r.png" alt="r">
        </div> -->
</div>
    <section class="features" id="feautures">

        <h1 class="heading"> Sparkle<span>Features</span> </h1>
        <div class="box-container">
        <div class="box-container">
            <div class="box">
                <img src="img/latest.png" alt="">
                <h3>New Cuisine Meals </h3>
                <p>Innovative artistry tantalizes taste buds with bold fusion of exotic flavors </p>
                <a href="menu.php" class="btn"> Read more</a>

                </div>

                <div class="box">
                <img src="img/popular.png" alt="">
                <h3>Popular </h3>
                <p>Authentic flavors and culinary craftsmanship entice palates worldwide with diverse traditions</p>
                <a href="popular.php" class="btn"> Read more</a>
                
                </div>
                
                <div class="box">
                <img src="img/popular.png" alt="">
                <h3>Popular </h3>
                <p>Authentic flavors and culinary craftsmanship entice palates worldwide with diverse traditions</p>
                <a href="popular.php" class="btn"> Read more</a>
                
                </div>

                <div class="box">
                <img src="img/delivery.png" alt="">
                <h3>Free Delivery </h3>
                <p>Delicious food delivered fresh to your door, hassle-free and free! </p>
                <a href="cart.php" class="btn"> Read more</a>
                
                </div>
        </div>

       

   
    
</section>

    <script src="javascript/slider.js"></script>


        <div class="clear-fix mb-3"></div>
        <h1 class="heading"> Sunzy<span>Food</span> </h1>
        <center><hr class="w-25"></center>
        <div class="row" id="product_list">
            <?php 
            $products = $conn->query("SELECT p.*, v.shop_name as vendor, c.name as `category` FROM `product_list` p inner join vendor_list v on p.vendor_id = v.id inner join category_list c on p.category_id = c.id where p.delete_flag = 0 and p.`status` =1 order by RAND() limit 4");
            while($row = $products->fetch_assoc()):
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 product-item">
                <a href="./?page=products/view_product&id=<?= $row['id'] ?>" class="card shadow rounded-0 text-reset text-decoration-none">
                <div class="product-img-holder position-relative">
                    <img src="<?= validate_image($row['image_path']) ?>" alt="Product-image" class="img-top product-img bg-gradient-gray">
                </div>
                    <div class="card-body border-top border-gray">
                        <h5 class="card-title text-truncate w-100"><?= $row['name'] ?></h5>
                        <div class="d-flex w-100">
                            <div class="col-auto px-0"><small class="text-muted">Vendor: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?= $row['vendor'] ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Category: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="text-truncate m-0"><small class="text-muted"><?= $row['category'] ?></small></p></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-auto px-0"><small class="text-muted">Price: </small></div>
                            <div class="col-auto px-0 flex-shrink-1 flex-grow-1"><p class="m-0 pl-3"><small class="text-primary"><?= format_num($row['price']) ?></small></p></div>
                        </div>
                        <p class="card-text truncate-3 w-100"><?= strip_tags(html_entity_decode($row['description'])) ?></p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="clear-fix mb-2"></div>
        <div class="text-center">
            <a href="./?page=products" class="btn btn-large btn-primary rounded-pill col-lg-3 col-md-5 col-sm-12">Explore More Services</a>
        </div>
    </div>
</div>