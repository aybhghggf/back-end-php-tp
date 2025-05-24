<?php
session_start();
if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
}
require_once 'config.php';
$objects = getAllObjects();
if(isset($_POST['idlot'])){
    $id= $_POST['idlot'];
$AllBids= getAllBids($id);
}

if (isset($_GET['message']) && $_GET['message'] == "login") {
    echo "
<div class=\"fixed top-8 left-1/2 transform -translate-x-1/2 z-50\">
    <div class=\"flex items-center gap-3 bg-white border-2 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-lg backdrop-blur-sm\" role=\"alert\">
        <div class=\"w-8 h-8 bg-green-100 rounded-full flex items-center justify-center\">
            <span class=\"text-green-600 font-bold\">✓</span>
        </div>
        <span class=\"font-semibold\">تم تسجيل الدخول بنجاح!</span>
        <button onclick=\"this.parentElement.parentElement.style.display='none'\" class=\"ml-4 text-green-700 hover:text-green-900 focus:outline-none text-xl font-bold\">
            ×
        </button>
    </div>
</div>
  ";
}
if (isset($_GET['message']) && $_GET['message'] == "bid") {
    echo "
<div class=\"fixed top-8 left-1/2 transform -translate-x-1/2 z-50\">
    <div class=\"flex items-center gap-3 bg-white border-2 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-lg backdrop-blur-sm\" role=\"alert\">
        <div class=\"w-8 h-8 bg-green-100 rounded-full flex items-center justify-center\">
            <span class=\"text-green-600 font-bold\">✓</span>
        </div>
        <span class=\"font-semibold\">Bid placed successfully!</span>
        <button onclick=\"this.parentElement.parentElement.style.display='none'\" class=\"ml-4 text-green-700 hover:text-green-900 focus:outline-none text-xl font-bold\">
            ×
        </button>
    </div>
</div>
  ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazad.ma - Premium Auctions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-40">
        <?php include_once 'includes/nav.php' ?>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl floating-animation"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl floating-animation" style="animation-delay: -3s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-white opacity-5 rounded-full blur-2xl"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="text-white space-y-8">
                    <div class="space-y-4">
                        <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm">
                            مرحباً بك - Welcome
                        </span>
                        <h1 class="text-5xl lg:text-6xl font-black leading-tight">
                            <span class="text-white">Mazad.ma</span>
                            <br>
                            <span class="text-yellow-300">مزاد المغرب</span>
                        </h1>
                        <p class="text-xl text-white/90 leading-relaxed max-w-2xl">
                            مرحباً بكم فـ "مزاد" – المنصة الإلكترونية الأولى فالمغرب لبيع وشراء السلع عن طريق المزادات! 
                            سواء كنت باغي تبيع حاجة مستعملة ولا جديدة، أو باغي تشري حاجة مميزة بثمن مناسب، 
                            "مزاد" هو المكان لي يجمع بين البائعين والمشترين فجوّ تفاعلي وآمن.
                        </p>
                    </div>
                    
                </div>

                <!-- Images Side -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl floating-animation">
                                <img src="https://images.pexels.com/photos/3184433/pexels-photo-3184433.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                     class="w-full h-64 object-cover hover:scale-110 transition-transform duration-700" alt="Auction Item">
                            </div>
                        </div>
                        <div class="space-y-6 pt-12">
                            <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl floating-animation" style="animation-delay: -2s;">
                                <img src="https://images.pexels.com/photos/3184431/pexels-photo-3184431.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                     class="w-full h-64 object-cover hover:scale-110 transition-transform duration-700" alt="Auction Item">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="absolute -bottom-6 -left-6 glass-effect rounded-2xl p-6 shadow-2xl">
                        <div class="text-center">
                            <div class="text-3xl font-black text-purple-600">1,200+</div>
                            <div class="text-sm text-gray-600 font-semibold">مزادات نشطة</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Auctions Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.3) 1px, transparent 0); background-size: 20px 20px;"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block bg-gradient-to-r from-purple-100 to-pink-100 px-6 py-3 rounded-full mb-6">
                    <span class="text-gradient font-bold">المزادات المتاحة</span>
                </div>
                <h2 class="text-5xl font-black text-gray-900 mb-6">All Auctions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    اكتشف مجموعتنا المختارة بعناية من أكثر العناصر إثارة المعروضة حالياً للمزايدة
                </p>
            </div>

            <!-- Auctions Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($objects as $obj): ?>
                    <div class="auction-card bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl group">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <img src="<?php echo htmlspecialchars($obj['url_photo']); ?>" 
                                 alt="<?php echo htmlspecialchars($obj['title']); ?>" 
                                 class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700" />
                            
                            <!-- Live Badge -->
                            <div class="absolute top-4 right-4">
                                <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-2 rounded-full shadow-lg">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-white rounded-full pulse-animation"></div>
                                        <span class="text-sm font-bold">LIVE</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-4">
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-200">
                                <?php echo htmlspecialchars($obj['title']); ?>
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm line-clamp-2">
                                <?php echo htmlspecialchars($obj['description']); ?>
                            </p>

                            <!-- Price -->
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-4 rounded-xl">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 text-sm font-medium">السعر الحالي</span>
                                    <span class="text-2xl font-black text-gradient">
                                        <?php echo htmlspecialchars($obj['price']); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-3 pt-2">
                                <button onclick="openModal()"
                                        class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-4 rounded-xl font-bold hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                                    <i class="fas fa-gavel mr-2"></i>
                                    زايد الآن
                                </button>
                                <a href="details.php?id=<?php echo $obj['lot']; ?>"
                                   class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-3 rounded-xl transition-all duration-200 hover:shadow-md">
                                    <i class="fas fa-info-circle text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Bid Modal -->
    <form action="checklot.php" method="post">
        <div id="bidModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-white p-8 rounded-3xl shadow-2xl w-96 mx-4 transform scale-95 transition-transform duration-300">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gavel text-white text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">ضع عرضك</h2>
                    <p class="text-gray-600">أدخل مبلغ المزايدة الخاص بك</p>
                </div>
                
                <input type="hidden" name="lotobj" value="<?php echo $obj['lot'] ?>">
                <input type="hidden" name="userid" value="<?php echo $id_user ?>">
                
                <div class="space-y-4">
                    <div class="relative">
                        <input type="number" 
                               id="bidAmount" 
                               name="bid" 
                               placeholder="أدخل مبلغ المزايدة" 
                               class="w-full border-2 border-gray-200 rounded-xl px-4 py-4 text-lg font-semibold focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-bold">$</span>
                    </div>
                    
                    <div class="flex gap-3">
                        <button type="button" 
                                onclick="closeModal()" 
                                class="flex-1 bg-gray-100 text-gray-700 py-3 px-6 rounded-xl font-semibold hover:bg-gray-200 transition-colors">
                            إلغاء
                        </button>
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105">
                            تأكيد المزايدة
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- View Bids Modal -->
    <div id="viewBidsModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-3xl shadow-2xl w-96 mx-4 max-h-96 overflow-y-auto">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-list text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">قائمة المزايدات</h2>
            </div>
            
            <div class="space-y-3">
                <?php if(isset($AllBids)): ?>
                    <?php foreach($AllBids as $bid): ?>
                        <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-purple-50 hover:to-pink-50 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-sm"><?php echo substr($bid['name'], 0, 1); ?></span>
                                </div>
                                <span class="font-semibold text-gray-700"><?php echo htmlspecialchars($bid['name']); ?></span>
                            </div>
                            <div class="text-gradient text-lg font-black">
                                $<?php echo number_format($bid['amount'], 2); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <button onclick="closeViewBidsModal()" 
                    class="w-full mt-6 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-colors">
                إغلاق
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="scripts/modal.js"></script>
    <script src="scripts/modal3.js"></script>
    

    </script>
</body>
</html>