<?php

include_once('includes/load.php');


include_once('header.php');?>

<div class="container">
    <div class="card col-md-5 h-100 mt-5 mx-auto w-100" >
        <div class="card-header bg-dark text-white text-center">
            <h4>Visitor Portal</h4>
        </div>
        <div class="card-body py-10 bg-secondary">
            <!-- CAROUSEL-->
            
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <img src="https://comlab.uniroma3.it/carousel/21762879_1677555798963531_67311200696742094_o.jpg" class="d-block mx-auto w-60" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <!--
                    <h5>Conference Room</h5>
                    <p>Where business and company meetings happens.</p>
                    -->
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="https://arizent.brightspotcdn.com/b8/a2/c85709054de68a30e080de9af9dd/san-francisco-ca-office.jpg" class="d-block mx-auto w-75" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <!--
                    <h5>Conference Room</h5>
                    <p>Where business and company meetings happens.</p>
                    -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://workspacegroup.ca/wp-content/uploads/2018/03/Mandrake-171215-027-LR-e1521485726396.jpg" class="d-block mx-auto w-50" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <!--
                    <h5>Conference Room</h5>
                    <p>Where business and company meetings happens.</p>
                    -->
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            
            
            
            
            
            
            
            
            <div class="col-md-3 mt-3 mx-auto">
                <a href="time_in.php" class="btn btn-primary mx-auto"><i class="bi bi-file-post"></i>Coming IN</a>
                <a href="time_out.php" class="btn btn-warning mx-auto float-end"><i class="bi bi-file-post"></i>Going OUT</a>
            </div>
        </div>
    </div>
</div>


 
</div>
<?php include_once('footer.php');?>

