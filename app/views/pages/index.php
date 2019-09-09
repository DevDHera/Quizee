<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead"><?php echo $data['description']; ?></p>
        </div>        
    </div>

    <!-- Carousel -->
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo URLROOT; ?>/img/carousel/img1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>GEAR UP</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo URLROOT; ?>/img/carousel/img2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>FEAR DOWN</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo URLROOT; ?>/img/carousel/img3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>MOVE</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- //.Carousel -->
    <hr>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-light border-0">
                <div class="card-body">
                    <h5 class="card-title">What is Textile?</h5>    
                    <p class="card-text">A textile is a flexible material consisting of a network of natural or artificial fibers (yarn or thread). Yarn is produced by spinning raw fibres of wool, flax, cotton, hemp, or other materials to produce long strands. Textiles are formed by weaving, knitting, crocheting, knotting or tatting, felting, or braiding. The related words "fabric" and "cloth" and "material" are often used in textile assembly trades (such as tailoring and dressmaking) as synonyms for textile.</p>
                    <a href="https://en.wikipedia.org/wiki/Textile" class="card-link">Reference</a>
                </div>
            </div>
        </div>    
        <div class="col-md-4">
            <div class="card bg-light border-0">
                <div class="card-body">
                    <h5 class="card-title">Textile Manufacturing</h5>    
                    <p class="card-text">Textile manufacturing is a major industry. It is based on the conversion of fibre into yarn, yarn into fabric. These are then dyed or printed, fabricated into clothes. Different types of fibres are used to produce yarn. Cotton remains the most important natural fibre, so is treated in depth. There are many variable processes available at the spinning and fabric-forming stages coupled with the complexities of the finishing and colouration processes to the production... </p>
                    <a href="https://en.wikipedia.org/wiki/Textile_manufacturing" class="card-link">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light border-0">
                <div class="card-body">
                    <h5 class="card-title">About us</h5>    
                    <p class="card-text">In 1997, Charith, Thushara and Rayan Fernando introduced textile manufacturing to australia and there began the CTS legacy. What began as a venture down an unconventional path has resulted in CTS being at the forefront of garment manufacture. CTS manages a portfolio of businesses with a revenue of AUD 60 million and is positioned as one of the world’s most recognized design to delivery solution providers in the realm of the...</p>
                    <a href="<?php echo URLROOT; ?>/pages/about" class="card-link">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row lbox">
            <a href="<?php echo URLROOT; ?>/img/lightbox/a.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="<?php echo URLROOT; ?>/img/lightbox/a.jpg" class="img-fluid rounded">
            </a>
            <a href="<?php echo URLROOT; ?>/img/lightbox/b.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="<?php echo URLROOT; ?>/img/lightbox/b.jpg" class="img-fluid rounded">
            </a>
            <a href="<?php echo URLROOT; ?>/img/lightbox/c.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="<?php echo URLROOT; ?>/img/lightbox/c.jpg" class="img-fluid rounded">
            </a>
        </div>        
    </div>

    <hr>

    <div class="card text-center border-0">
  <!-- <div class="card-header">
    Featured
  </div> -->
  <div class="card-body">
    <h2 class="card-title">Our Partners</h2>
    <div class="row mt-5">
        <div class="col">
            <img src="<?php echo URLROOT; ?>/img/partners/adi.png" class="img-fluid rounded">
        </div>
        <div class="col">
            <img src="<?php echo URLROOT; ?>/img/partners/ck.png" class="img-fluid rounded">
        </div>
        <div class="col">
            <img src="<?php echo URLROOT; ?>/img/partners/nike.png" class="img-fluid rounded">
        </div>
        <div class="col">
            <img src="<?php echo URLROOT; ?>/img/partners/vs.png" class="img-fluid rounded">
        </div>
    </div>
  </div>
  <!-- <div class="card-footer text-muted">
    2 days ago
  </div> -->
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>