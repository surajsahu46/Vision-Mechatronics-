<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vision Mechatronics - Innovative Energy Solutions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .slide-container {
      position: relative;
      width: 100vw;
      height: calc(100vh - 64px);
      overflow: hidden;
    }

    .slides {
      display: flex;
      height: 100%;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      height: 100%;
      position: relative;
      background-size: cover;
      background-position: center;
    }

    .slide-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80%;
      max-width: 800px;
      text-align: center;
      background-size: cover;
      background-position: center;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .content-overlay {
      background: rgba(255, 255, 255, 0.9);
      padding: 2rem;
    }

    .nav-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 1rem;
      cursor: pointer;
      border-radius: 50%;
      z-index: 10;
      transition: all 0.3s ease;
    }

    .nav-arrow:hover {
      background: rgba(0, 0, 0, 0.8);
    }

    .nav-arrow.prev {
      left: 20px;
    }

    .nav-arrow.next {
      right: 20px;
    }

    .action-button {
      display: inline-block;
      background: #1a56db;
      color: white;
      padding: 0.75rem 2rem;
      border-radius: 9999px;
      font-weight: bold;
      transition: all 0.3s ease;
      text-decoration: none;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .action-button:hover {
      background: #1e40af;
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .slide-indicator {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .indicator {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.5);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .indicator.active {
      background: white;
      transform: scale(1.2);
    }
  </style>
</head>

<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <a href="index.php" class="flex items-center">
          <img src="images/VMLOGO.png" alt="Vision Mechatronics" class="h-8">
        </a>
        <div class="hidden md:flex space-x-8">
          <a href="index.php" class="hover:text-yellow-300 transition duration-300">Home</a>
          <a href="about.php" class="hover:text-yellow-300 transition duration-300">What We Do</a>
          <a href="#" class="hover:text-yellow-300 transition duration-300">Products And Services</a>
          <a href="#" class.ph="hover:text-yellow-300 transition duration-300">Industries</a>
          <a href="#" class="hover:text-yellow-300 transition duration-300">Essentials</a>
          <a href="contact.php" class="hover:text-yellow-300 transition duration-300">Contact Us</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="slide-container">
    <div class="slides">
      <!-- Slide 1 -->
      <div class="slide" style="background-image: url('images/pexels1.jpg')">
        <div class="slide-content">
          <div class="content-overlay">
            <h2 class="text-4xl font-bold mb-4 text-blue-600">ENERGY IS TRANSFORMING</h2>
            <p class="mb-6 text-gray-700">And in this transformation, we are here to support you in achieving your
              sustainable energy goals....</p>
            <a href="about.php" class="action-button">About Us</a>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="slide" style="background-image: url('images/pexels2.jpg')">
        <div class="slide-content">
          <div class="content-overlay">
            <h2 class="text-4xl font-bold mb-4 text-blue-600">WHAT WE OFFER</h2>
            <p class="mb-6 text-gray-700">A leading name in the Energy Storage Industry, we provide premium lithium-ion
              batteries, customised battery packs and efficient energy storage solutions, and robotics. Explore our
              diverse range of solutions and products tailor made to suit your needs.</p>
            <a href="products.php" class="action-button">Explore Products</a>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="slide" style="background-image: url('images/pexels3.jpg')">
        <div class="slide-content">
          <div class="content-overlay">
            <h2 class="text-4xl font-bold mb-4 text-blue-600">COMMITMENT TO FUTURE</h2>
            <p class="mb-6 text-gray-700">We believe in the power of energy and are committed to providing Sustainable
              Energy Solutions to ensure access to affordable, reliable, sustainable, and modern energy for all.</p>
            <a href="solutions.php" class="action-button">Know More...</a>
          </div>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="slide" style="background-image: url('images/pexels4.jpg')">
        <div class="slide-content">
          <div class="content-overlay">
            <h2 class="text-4xl font-bold mb-4 text-blue-600">RENEWABLE ENERGY</h2>
            <p class="mb-6 text-gray-700">We are assisting domestic, commercial, and industrial users shift from
              conventional ways to new renewable and green ways of generating and using power.</p>
            <a href="renewable.php" class="action-button">Know More...</a>
          </div>
        </div>
      </div>

      <!-- Slide 5 -->
      <div class="slide" style="background-image: url('images/pexels5.jpg')">
        <div class="slide-content">
          <div class="content-overlay">
            <h2 class="text-4xl font-bold mb-4 text-blue-600">COFFEE CORNER</h2>
            <p class="mb-6 text-gray-700">"If you want to go fast, go alone, if you want to go far, go together" -
              Martha Goedert</p>
            <p class="mb-6 text-gray-700">We are on a lookout to explore and discuss mutual synergies with institutions
              as partners, suppliers or more. Reach out to us with your brilliant ideas!</p>
            <a href="contact.php" class="action-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation Arrows -->
    <div class="nav-arrow prev" onclick="moveSlide(-1)">
      <i class="fas fa-chevron-left"></i>
    </div>
    <div class="nav-arrow next" onclick="moveSlide(1)">
      <i class="fas fa-chevron-right"></i>
    </div>

    <!-- Slide Indicators -->
    <div class="slide-indicator">
      <div class="indicator active" onclick="goToSlide(0)"></div>
      <div class="indicator" onclick="goToSlide(1)"></div>
      <div class="indicator" onclick="goToSlide(2)"></div>
      <div class="indicator" onclick="goToSlide(3)"></div>
      <div class="indicator" onclick="goToSlide(4)"></div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white py-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-lg font-bold mb-4">Vision Mechatronics</h3>
          <p class="mb-2">sales@vmechatronics.com</p>
          <p class="mb-2">careers@vmechatronics.com</p>
          <p class="mb-2">+91 22-25477750</p>
          <p class="mb-2">+91 9869009235</p>
          <p>+91 9867118412</p>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Micro-Grid</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Sustainability</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Renewable Energy</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Products And Services</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Press Release</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Where To</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Events</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Careers</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">About Us</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Contact Us</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition duration-300">Privacy Policy</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Social Links</h3>
          <div class="flex space-x-4">
            <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-yellow-300 transition duration-300"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      <div class="mt-8 text-center">
        <p>&copy; <?php echo date("Y"); ?> Vision Mechatronics. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    let currentSlide = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;
    const indicators = document.querySelectorAll('.indicator');
    const slideContents = document.querySelectorAll('.slide-content');

    function moveSlide(direction) {
      currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
      updateSlidePosition();
    }

    function goToSlide(index) {
      currentSlide = index;
      updateSlidePosition();
    }

    function updateSlidePosition() {
      slides.style.transform = `translateX(-${currentSlide * 100}%)`;
      updateIndicators();
    }

    function updateIndicators() {
      indicators.forEach((indicator, index) => {
        if (index === currentSlide) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
    }

    function loadRandomImages() {
      slideContents.forEach((content) => {
        const randomImage = `https://source.unsplash.com/800x600/?abstract,texture&${Math.random()}`;
        content.style.backgroundImage = `url('${randomImage}')`;
      });
    }

    // Load random images on page load
    loadRandomImages();

    // Auto-advance slides
    setInterval(() => moveSlide(1), 5000);

    // Touch support for mobile devices
    let touchStartX = 0;
    let touchEndX = 0;

    slides.addEventListener('touchstart', e => {
      touchStartX = e.changedTouches[0].screenX;
    });

    slides.addEventListener('touchend', e => {
      touchEndX = e.changedTouches[0].screenX;
      if (touchStartX - touchEndX > 50) {
        moveSlide(1); // Swipe left
      } else if (touchEndX - touchStartX > 50) {
        moveSlide(-1); // Swipe right
      }
    });
  </script>
</body>

</html>