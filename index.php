

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Auctions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
  <style>
    
  </style>
</head>
<body class="bg-gray-50">
  <nav>
    <?php include_once 'includes/nav.php' ?>
  </nav>
  <!-- Section 1: Hero Section with Website Presentation -->
  <section class="hero-gradient py-20 px-4 sm:px-6 lg:px-8 text-white overflow-hidden">
    <div class="max-w-6xl mx-auto">
      <div class="md:flex md:items-center md:justify-between">
        <div class="md:w-1/2 space-y-6">
          <h1 class="text-4xl md:text-5xl font-bold tracking-tight">
            Discover Unique Items at <span class="text-yellow-300">Premium Auctions</span>
          </h1>
          <p class="text-lg md:text-xl max-w-md">
            Join thousands of collectors and enthusiasts in the world's most exciting online auction platform.
          </p>
          <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
            <a href="" class="bg-white text-indigo-700 px-6 py-3 rounded-md font-medium shadow-lg hover:bg-gray-100 transition duration-200"> Browse Auctions</a>
          </div>
        </div>
        
        <div class="hidden md:block md:w-1/2 relative">
          <div class="absolute -right-20 -bottom-20 w-72 h-72 bg-indigo-500 rounded-full opacity-20"></div>
          <div class="absolute right-40 -top-10 w-40 h-40 bg-purple-500 rounded-full opacity-20"></div>
          <div class="relative z-10 mt-10 md:mt-0">
            
          </div>
        </div>
      </div>
      
      <div class="mt-16 grid grid-cols-1 gap-6 sm:grid-cols-3 text-center">
        <div class="bg-white bg-opacity-10 rounded-lg p-4 backdrop-filter backdrop-blur-sm">
          <p class="text-3xl font-bold count-animation" id="active-users">12,453</p>
          <p class="text-sm uppercase tracking-wider mt-1">Active Users</p>
        </div>
        <div class="bg-white bg-opacity-10 rounded-lg p-4 backdrop-filter backdrop-blur-sm">
          <p class="text-3xl font-bold count-animation" id="items-sold">45,789</p>
          <p class="text-sm uppercase tracking-wider mt-1">Items Sold</p>
        </div>
        <div class="bg-white bg-opacity-10 rounded-lg p-4 backdrop-filter backdrop-blur-sm">
          <p class="text-3xl font-bold count-animation" id="total-auctions">89,234</p>
          <p class="text-sm uppercase tracking-wider mt-1">Total Auctions</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 2: Featured Auctions -->
  <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Featured Auctions</h2>
        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
          Discover our hand-picked selection of the most exciting items currently up for bidding
        </p>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Auction Item 1 -->
        <div class="auction-card bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md transition-all duration-300">
          <div class="relative">
            <img 
              src="/api/placeholder/320/200" 
              alt="Vintage Rolex Watch" 
              class="w-full h-48 object-cover"
            />
            <div class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 m-2 rounded">
              <div class="flex items-center">
                <i class="fas fa-clock mr-1"></i>
                2h 45m
              </div>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-semibold text-lg text-gray-900 mb-2">Vintage Rolex Watch</h3>
            <div class="flex justify-between items-center">
              <div>
                <p class="text-gray-500 text-sm">Current Bid</p>
                <p class="text-xl font-bold text-indigo-600">$4,200</p>
              </div>
              <div class="text-right">
                <p class="text-gray-500 text-sm">23 bids</p>
                <button class="mt-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm py-1 px-3 rounded-md transition duration-200">
                  Bid Now
                </button>
              </div>
            </div>
          </div>
        </div>

     