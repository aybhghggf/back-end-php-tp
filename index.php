<?php 
require_once 'config.php';
$objects= getAllObjects();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Auctions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 pt-3">
                    <small class="text-uppercase" style="color:hsl(17, 100.00%, 34.70%);">Welcome</small>
                    <h1 class="h2 mb-4" style="font-weight: 600;"> Mazad.ma <span style="color:rgb(8, 8, 8);">مرحبا بك
                            في موق مزاد</span></h1>
                    <p class="text-secondary" style="line-height: 2;">مرحباً بكم فـ "مزاد" – المنصة الإلكترونية الأولى
                        فالمغرب لبيع وشراء السلع عن طريق المزادات! سواء كنت باغي تبيع حاجة مستعملة ولا جديدة، أو باغي
                        تشري حاجة مميزة بثمن مناسب، "مزاد" هو المكان لي يجمع بين البائعين والمشترين فجوّ تفاعلي وآمن.
                        كلشي واضح، سهل، وكيعتمد على التنافس الشريف فالعروض. سجل دابا وبدأ تجربتك معنا!</p>

                </div>
                <div class="col-md-6 text-center">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <img src="https://images.pexels.com/photos/3184433/pexels-photo-3184433.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                                class="w-100 rounded" alt="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <img src="https://images.pexels.com/photos/3184431/pexels-photo-3184431.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                                class="w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Featured Auctions -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">All Auctions</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover our hand-picked selection of the most exciting items currently up for bidding
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php 
          foreach($objects as $obj):
        ?>
                <!-- Auction Item 1 -->
                <div
                    class="auction-card bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md transition-all duration-300">
                    <div class="relative">
                        <img src="/api/placeholder/320/200" alt="Vintage Rolex Watch"
                            class="w-full h-48 object-cover" />
                        <div
                            class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 m-2 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-1"></i>
                                Live
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2"></h3>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm"><?php echo $obj['title'] ?></p>
                                <p class="text-xl font-bold text-indigo-600"><?php echo $obj['price'] ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500 text-sm"><?php echo $obj['description'] ?></p>
                                <button
                                    class="mt-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm py-1 px-3 rounded-md transition duration-200">
                                    Bid Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            endforeach
            ?>