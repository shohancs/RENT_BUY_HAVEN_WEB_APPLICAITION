<?php include"inc/header.php"; ?>

<main>
    <!-- START: Bannner Carousel Slider -->
     <section>
        <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
        speed="600" parallax="true" pagination="true" pagination-clickable="true" navigation="true">
        <div slot="container-start" class="parallax-bg"
        style="background-image: linear-gradient(to left, rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(assets/images/banner_slider.jpg); background-size:cover;" data-swiper-parallax="-23%"></div>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Rent to Buy: Save for Your Dream Home</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Affordable Rentals with a Path to Ownership</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100" >
                Explore our discounted rental properties that help you save for a future home purchase. Start your journey toward homeownership today!
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Stay in Style: Hotel Rentals</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Luxury Stays at Unbeatable Prices</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">              
                Discover our curated selection of hotels available for rent. Enjoy comfort, convenience, and exceptional service during your stay.                
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Prime Retail Spaces for Rent</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Your Business Deserves the Best Location</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">
                Browse our commercial properties for rent—perfect for stores, boutiques, and businesses. Secure your ideal space today!
            </div>
        </swiper-slide>
        </swiper-container>
     </section>
    <!-- End: Bannner Carousel Slider -->

    
</main>
    
<?php include"inc/footer.php"; ?>