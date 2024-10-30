<!-- default script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Swiper js cdn link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


<!-- For search animation -->
<script>
  document.getElementById("search-button").addEventListener("click", function() {
      const container = document.querySelector(".search-container");
      container.classList.toggle("active");
      if (container.classList.contains("active")) {
          document.getElementById("search-input").focus();
      }
  });
</script>