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

<!-- Slier scripts -->

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>


<script>
    function updateValue(id, delta) {
      const input = document.getElementById(id);
      const currentValue = parseInt(input.value, 10);
      const newValue = currentValue + delta;
      if (newValue >= parseInt(input.min) && newValue <= parseInt(input.max)) {
        input.value = newValue;
      }
    }
  </script>

<script>
  // Select elements
const wishlistIcon = document.getElementById('wishlistIcon');
const wishlistPanel = document.getElementById('wishlistPanel');
const closePanel = document.getElementById('closePanel');

// Show wishlist panel
wishlistIcon.addEventListener('click', () => {
  wishlistPanel.classList.add('active');
});

// Hide wishlist panel
closePanel.addEventListener('click', () => {
  wishlistPanel.classList.remove('active');
});

</script>