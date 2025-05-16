<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction Website</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'auction-red': '#d32f2f',
            'auction-dark-red': '#9a0007',
            'auction-light-red': '#ff6659',
            'auction-yellow': '#ffb300',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100">
  <nav class="bg-gradient-to-r from-auction-dark-red to-auction-red shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between h-16">
        <!-- Logo and Brand -->
        <div class="flex items-center">
          <a href="index.php" class="text-white text-3xl font-bold">مزاد</a>
        </div>
        
        <!-- Desktop Nav Links -->
        <div class="hidden md:flex items-center space-x-4">
          <a href="inde.php" class="text-white hover:bg-auction-light-red px-3 py-2 rounded-md text-sm font-medium transition duration-300">Accueil</a>
          <a href="objects.php" class="text-white hover:bg-auction-light-red px-3 py-2 rounded-md text-sm font-medium transition duration-300">Enchères</a>
          <a href="#" class="text-white hover:bg-auction-light-red px-3 py-2 rounded-md text-sm font-medium transition duration-300">Catégories</a>
        </div>
        
        <!-- Search Bar -->
       
        
        <!-- Desktop Auth Buttons -->
        <div class="hidden md:flex items-center">
          <a href="login.php" class="bg-white text-auction-red hover:bg-gray-100 ml-4 px-4 py-1 rounded-full text-sm font-medium transition duration-300">Connexion</a>
          <a href="sign.php"class="bg-auction-yellow text-white hover:bg-yellow-600 ml-2 px-4 py-1 rounded-full text-sm font-medium transition duration-300">S'inscrire</a>
        </div>
        
        <!-- Mobile menu button -->
        <div class="md:hidden flex items-center">
          <button id="menuBtn" class="text-white hover:bg-auction-light-red p-2 rounded-md focus:outline-none">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Mobile menu, hidden by default -->
    <div id="mobileMenu" class="hidden md:hidden bg-auction-red border-t border-auction-dark-red">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="#" class="text-white block hover:bg-auction-light-red px-3 py-2 rounded-md text-base font-medium">Accueil</a>
        <a href="objects.php" class="text-white block hover:bg-auction-light-red px-3 py-2 rounded-md text-base font-medium">Enchères</a>
        <a href="#" class="text-white block hover:bg-auction-light-red px-3 py-2 rounded-md text-base font-medium">Catégories</a>
      </div>
      
      <!-- Mobile Search -->
      <div class="px-2 pt-2 pb-3 border-t border-auction-dark-red">
        <div class="relative">
          <input
            type="text"
            placeholder="Rechercher..."
            class="bg-auction-dark-red text-white w-full rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-white"
          />
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-red-300 text-sm"></i>
          </div>
        </div>
      </div>
      
      <!-- Mobile Auth -->
      <div class="px-2 pt-2 pb-3 border-t border-auction-dark-red">
        
      <a href="sign.php"class="bg-white text-auction-red hover:bg-gray-100 w-full mb-2 px-4 py-2 rounded-full text-sm font-medium transition duration-300" >Connexion</a>
      <a href="login.php"class="bg-auction-yellow text-white hover:bg-yellow-600 w-full px-4 py-2 rounded-full text-sm font-medium transition duration-300"></a>  

      </div>
    </div>
  </nav>
</body>
<script src="scripts/script.js"></script>
</html>