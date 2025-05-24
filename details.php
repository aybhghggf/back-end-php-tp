<?php
require_once 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $objet=getObjectById( $id );
}else{
    header( 'Location: index.php' );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enchères - <?php echo htmlspecialchars($objet['title']); ?></title>
</head>

<body>
    <nav>
        <?php
        include 'includes/nav.php'
        ?>
    </nav>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enchères - <?php echo htmlspecialchars($objet['title']); ?></title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

            * {
                font-family: 'Inter', sans-serif;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .glass-effect {
                backdrop-filter: blur(20px);
                background: rgba(255, 255, 255, 0.9);
            }

            .pulse-animation {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.7;
                }
            }

            .floating-card {
                animation: float 6s ease-in-out infinite;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .shimmer {
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: shimmer 2s infinite;
            }

            @keyframes shimmer {
                0% {
                    background-position: -200% 0;
                }

                100% {
                    background-position: 200% 0;
                }
            }
        </style>
    </head>

    <body class="min-h-screen gradient-bg">
        <!-- Particles Background Effect -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-white opacity-5 rounded-full blur-2xl"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 py-12">
            <!-- Header with animated title -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-black text-white mb-4 tracking-tight">
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        Enchères Premium
                    </span>
                </h1>
                <p class="text-white/80 text-lg font-medium">Découvrez des produits d'exception</p>
            </div>

            <!-- Main Auction Card -->
            <div class="max-w-6xl mx-auto">
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden floating-card border border-white/20">

                    <!-- Image Section with enhanced design -->
                    <div class="relative">
                        <div class="grid md:grid-cols-2 gap-0">
                            <!-- Product Image -->
                            <div class="relative h-96 md:h-[600px] overflow-hidden">
                                <img src="<?php echo htmlspecialchars($objet['url_photo']); ?>" 
                                     alt="<?php echo htmlspecialchars($objet['title']); ?>"
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">

                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>

                                <!-- Status Badge -->
                                <div class="absolute top-6 right-6">
                                    <span class="inline-flex items-center gap-2 <?php echo $objet['validated'] ? 'bg-emerald-500' : 'bg-gray-500'; ?> text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                        <div class="w-2 h-2 bg-white rounded-full pulse-animation"></div>
                                        <?php echo $objet['validated'] ? 'Vérifié' : 'En attente'; ?>
                                    </span>
                                </div>

                                <!-- Live Badge -->
                                <div class="absolute top-6 left-6">
                                    <span class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                        <div class="w-2 h-2 bg-white rounded-full pulse-animation"></div>
                                        EN DIRECT
                                    </span>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="p-8 md:p-12 flex flex-col justify-between">
                                <!-- Title and Timer -->
                                <div class="mb-8">
                                    <h2 class="text-4xl font-black text-gray-900 mb-4">
                                        <?php echo htmlspecialchars($objet['title']); ?>
                                    </h2>
                                    <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-2xl inline-block">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold">Fermeture: <?php echo date('j F Y, H\hi', strtotime($objet['closing_date'])); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Cards -->
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200 hover:shadow-lg transition-all duration-300">
                                        <p class="text-blue-600 font-semibold mb-2">Prix Actuel</p>
                                        <p class="text-3xl font-black text-blue-900"><?php echo number_format($objet['price'], 2); ?>€</p>
                                        <div class="w-full bg-blue-200 rounded-full h-2 mt-3">
                                            <div class="bg-blue-500 h-2 rounded-full w-4/5"></div>
                                        </div>
                                    </div>

                                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-2xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                        <p class="text-gray-600 font-semibold mb-2">Prix Minimum</p>
                                        <p class="text-3xl font-black text-gray-900"><?php echo number_format($objet['price_min'], 2); ?>€</p>
                                        <p class="text-sm text-gray-500 mt-2">Prix de réserve</p>
                                    </div>

                                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl border border-green-200 hover:shadow-lg transition-all duration-300">
                                        <p class="text-green-600 font-semibold mb-2">Prix Maximum</p>
                                        <p class="text-3xl font-black text-green-900"><?php echo number_format($objet['price_max'], 2); ?>€</p>
                                        <p class="text-sm text-green-500 mt-2">Limite estimée</p>
                                    </div>
                                </div>

                                <!-- Bid Section -->
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-200">
                                    <h3 class="text-xl font-bold text-gray-900 mb-4">Placer une enchère</h3>
                                    <div class="flex gap-4">
                                        <div class="flex-1 relative">
                                            <input type="number"
                                                class="w-full bg-white border-2 border-purple-200 rounded-xl px-6 py-4 text-lg font-semibold focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all"
                                                placeholder="Montant de l'enchère"
                                                min="801">
                                            <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-semibold">$</span>
                                        </div>
                                        <button class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            Enchérir
                                        </button>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-3">Enchère minimum: $801.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            
        </div>
    </body>

    </html>
</body>




<footer>

</footer>

</html>