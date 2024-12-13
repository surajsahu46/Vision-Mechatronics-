<?php
// Initialize variables for form fields and error messages
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$formSubmitted = false;

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  // Validate Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Validate Message
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }

  // If no errors, process the form
  if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
    // Here you would typically send an email or save to database
    // For this example, we'll just set a flag
    $formSubmitted = true;
  }
}

// Function to sanitize input data
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Vision Mechatronics</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

  body {
    font-family: 'Poppins', sans-serif;
  }

  .bg-pattern {
    background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
  }
  </style>
</head>

<body class="bg-gray-100 bg-pattern">
  <!-- Navbar -->
  <nav class="bg-blue-600 text-white shadow-lg" x-data="{ open: false }">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <a href="index.php" class="text-lg font-bold hover:text-yellow-300 transition duration-300"> <img
            src="images/VMLOGO.png" alt="Vision Mechatronics" class="h-8">
          Vision Mechatronics</a>
        <button @click="open = !open" class="md:hidden">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
        <div class="hidden md:flex space-x-4">
          <a href="index.php" class="hover:text-yellow-300 transition duration-300">HOME</a>
          <a href="about.php" class="hover:text-yellow-300 transition duration-300">What We Do</a>
          <a href="#" class="hover:text-yellow-300 transition duration-300">Products And Services</a>
          <a href="#" class="hover:text-yellow-300 transition duration-300">Industries</a>
          <a href="#" class="hover:text-yellow-300 transition duration-300">Essentials</a>
          <a href="contact.php" class="hover:text-yellow-300 transition duration-300">Contact Us</a>
        </div>
      </div>
      <div class="md:hidden" x-show="open" @click.away="open = false">
        <a href="homepage.php" class="block py-2 hover:bg-blue-700">HOME</a>
        <a href="about.php" class="block py-2 hover:bg-blue-700">What We Do</a>
        <a href="#" class="block py-2 hover:bg-blue-700">Products And Services</a>
        <a href="#" class="block py-2 hover:bg-blue-700">Industries</a>
        <a href="#" class="block py-2 hover:bg-blue-700">Essentials</a>
        <a href="contact.php" class="block py-2 hover:bg-blue-700">Contact Us</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto mt-8 px-4">
    <div class="bg-white p-8 rounded-lg shadow-xl transform transition duration-500 hover:scale-105">
      <h1 class="text-3xl font-bold mb-4 text-center text-blue-600">Let's Talk...</h1>
      <p class="mb-6 text-center text-gray-700">We're here to help and answer any question you might have.</p>
    </div>

    <div class="mt-12 grid md:grid-cols-2 gap-8">
      <!-- Contact Form -->
      <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-blue-600">Send us a message</h2>
        <?php if ($formSubmitted): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Thank you!</strong>
          <span class="block sm:inline">Your message has been sent successfully.</span>
        </div>
        <?php else: ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo $nameErr ? 'border-red-500' : ''; ?>">
            <?php if ($nameErr): ?>
            <p class="text-red-500 text-xs italic"><?php echo $nameErr; ?></p>
            <?php endif; ?>
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo $emailErr ? 'border-red-500' : ''; ?>">
            <?php if ($emailErr): ?>
            <p class="text-red-500 text-xs italic"><?php echo $emailErr; ?></p>
            <?php endif; ?>
          </div>
          <div class="mb-6">
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
            <textarea id="message" name="message" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo $messageErr ? 'border-red-500' : ''; ?>"><?php echo $message; ?></textarea>
            <?php if ($messageErr): ?>
            <p class="text-red-500 text-xs italic"><?php echo $messageErr; ?></p>
            <?php endif; ?>
          </div>
          <div class="flex items-center justify-between">
            <button type="submit"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
              Send Message
            </button>
          </div>
        </form>
        <?php endif; ?>
      </div>

      <!-- Contact Information -->
      <div>
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
          <h2 class="text-2xl font-bold mb-4 text-blue-600">Contact Information</h2>
          <p class="text-gray-700 mb-2"><strong>Vision Mechatronics Pvt. Ltd.</strong></p>
          <p class="text-gray-700 mb-4">Punjani Industrial Estate, 70-72, Khopat Rd, Hans Nagar, Thane West, Thane,
            Maharashtra 400601</p>
          <div class="mb-4">
            <p class="text-gray-700"><strong>Email:</strong> sales@vmechatronics.com</p>
            <p class="text-gray-700"><strong>Phone:</strong> +91 22-25477750</p>
            <p class="text-gray-700"><strong>Mobile:</strong> +91 9869009235, +91 9867118412</p>
          </div>
          <div class="flex space-x-4">
            <a href="#" class="text-blue-500 hover:text-blue-700 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>
            <a href="#" class="text-blue-400 hover:text-blue-600 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
              </svg>
            </a>
            <a href="#" class="text-red-500 hover:text-red-700 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
              </svg>
            </a>
            <a href="#" class="text-blue-700 hover:text-blue-900 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
              </svg>
            </a>
          </div>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-blue-600">Our Location</h2>
          <div class="aspect-w-16 aspect-h-9">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.926899323915!2d72.97087795035829!3d19.198361152281934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b91e4e6fbd65%3A0x2e3f8e0e9f8d9a3f!2sVision%20Mechatronics%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1630562219055!5m2!1sen!2sin"
              width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
              class="rounded-lg shadow-md"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white mt-12">
    <div class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="font-bold text-lg mb-4">Vision Mechatronics</h3>
          <p class="mb-2">sales@vmechatronics.com</p>
          <p class="mb-2">careers@vmechatronics.com</p>
          <p class="mb-2">+91 22-25477750</p>
          <p class="mb-2">+91 9869009235</p>
          <p>+91 9867118412</p>
        </div>
        <div>
          <h3 class="font-bold text-lg mb-4">Quick Links</h3>
          <a href="#" class="block mb-2 hover:underline">Micro-Grid</a>
          <a href="#" class="block mb-2 hover:underline">Sustainability</a>
          <a href="#" class="block mb-2 hover:underline">Renewable Energy</a>
          <a href="#" class="block mb-2 hover:underline">Products And Services</a>
          <a href="#" class="block hover:underline">Press Release</a>
        </div>
        <div>
          <h3 class="font-bold text-lg mb-4">Where To</h3>
          <a href="#" class="block mb-2 hover:underline">Events</a>
          <a href="#" class="block mb-2 hover:underline">Careers</a>
          <a href="#" class="block mb-2 hover:underline">About Us</a>
          <a href="#" class="block mb-2 hover:underline">Contact Us</a>
          <a href="#" class="block hover:underline">Privacy Policy</a>
        </div>
        <div>
          <h3 class="font-bold text-lg mb-4">Social Links</h3>
          <div class="flex space-x-4">
            <a href="#" class="hover:text-yellow-300 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>
            <a href="#" class="hover:text-yellow-300 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
              </svg>
            </a>
            <a href="#" class="hover:text-yellow-300 transition duration-300">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1