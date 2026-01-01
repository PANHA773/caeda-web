@extends('layouts.app')

@section('title', 'Full Menu | CAEDA Coffee Shop')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-amber-900 via-amber-800 to-gray-900">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
             alt="Coffee menu background" 
             class="w-full h-full object-cover opacity-30">
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-3xl text-center mx-auto">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500/20 backdrop-blur-sm rounded-full text-amber-200 text-sm font-semibold mb-6 border border-amber-500/30">
                <i class="fas fa-book-open"></i>
                Complete Menu Guide
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Our Complete <span class="text-amber-300">Coffee Menu</span>
            </h1>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Explore our extensive collection of handcrafted beverages, delicious pastries, and signature drinks.
            </p>
        </div>
    </div>
</section>
<!-- Menu Navigation -->
<section class="sticky top-0 z-40 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex overflow-x-auto py-4 space-x-6">
            @foreach($menuCategories as $category)
                <a href="#{{ $category->slug }}"
                   class="menu-nav-link flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-amber-50 transition-colors">
                    
                    @if($category->icon)
                        <i class="{{ $category->icon }} {{ $category->icon_color }}"></i>
                    @endif

                    <span class="font-medium text-gray-700 whitespace-nowrap">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </nav>
    </div>
</section>



<!-- Hot Coffee Section -->
<section id="hot-coffee" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl">
                <i class="fas fa-fire text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Hot Coffee</h2>
                <p class="text-gray-600">Warm up with our perfectly brewed hot beverages</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Classic Espresso', 'desc' => 'A single shot of our finest espresso', 'price' => '3.00', 'student_price' => '2.55', 'rating' => '4.8', 'reviews' => '156', 'image' => 'https://images.unsplash.com/photo-1510707577719-ae7c9b788690?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Double Shot Espresso', 'desc' => 'Two shots for an extra caffeine boost', 'price' => '3.50', 'student_price' => '2.98', 'rating' => '4.9', 'reviews' => '248', 'image' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Americano', 'desc' => 'Espresso shots with hot water', 'price' => '3.75', 'student_price' => '3.19', 'rating' => '4.7', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1558645836-e44122a743ee?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Cappuccino', 'desc' => 'Espresso with steamed milk and foam', 'price' => '4.25', 'student_price' => '3.61', 'rating' => '4.9', 'reviews' => '312', 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Latte', 'desc' => 'Smooth espresso with steamed milk', 'price' => '4.50', 'student_price' => '3.83', 'rating' => '4.8', 'reviews' => '278', 'image' => 'https://images.unsplash.com/photo-1561047029-3000c68339ca?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Mocha', 'desc' => 'Chocolate-infused espresso with steamed milk', 'price' => '5.00', 'student_price' => '4.25', 'rating' => '4.9', 'reviews' => '196', 'image' => 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9a?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Macchiato', 'desc' => 'Espresso "marked" with a dollop of foam', 'price' => '4.00', 'student_price' => '3.40', 'rating' => '4.6', 'reviews' => '134', 'image' => 'https://images.unsplash.com/photo-1621265113764-46d0eacca6e4?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Flat White', 'desc' => 'Ristretto shots with velvety steamed milk', 'price' => '4.75', 'student_price' => '4.04', 'rating' => '4.8', 'reviews' => '167', 'image' => 'https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Cortado', 'desc' => 'Equal parts espresso and warm milk', 'price' => '3.75', 'student_price' => '3.19', 'rating' => '4.7', 'reviews' => '89', 'image' => 'https://images.unsplash.com/photo-1511537190424-bbbab87ac5eb?w=500&h=300&fit=crop&crop=center'],
            ] as $coffee)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $coffee['image'] }}" 
                         alt="{{ $coffee['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $coffee['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $coffee['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-xl font-bold text-amber-600 price-animate">${{ $coffee['price'] }}</div>
                            <div class="text-sm text-green-600 font-semibold">Student: ${{ $coffee['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($coffee['rating']))
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                @elseif($i == ceil($coffee['rating']) && str_contains($coffee['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $coffee['rating'] }} ({{ $coffee['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Cold Coffee Section -->
<section id="cold-coffee" class="py-16 bg-amber-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl">
                <i class="fas fa-snowflake text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Cold Coffee</h2>
                <p class="text-gray-600">Refresh yourself with our chilled specialties</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Iced Americano', 'desc' => 'Espresso shots poured over ice', 'price' => '3.75', 'student_price' => '3.19', 'rating' => '4.7', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Cold Brew', 'desc' => 'Slow-steeped for 24 hours', 'price' => '4.50', 'student_price' => '3.83', 'rating' => '4.9', 'reviews' => '234', 'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Iced Caramel Macchiato', 'desc' => 'Vanilla syrup, milk, espresso, caramel', 'price' => '5.25', 'student_price' => '4.46', 'rating' => '4.8', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Iced Mocha', 'desc' => 'Chocolate, espresso, milk over ice', 'price' => '5.00', 'student_price' => '4.25', 'rating' => '4.7', 'reviews' => '156', 'image' => 'https://images.unsplash.com/photo-1561047029-3000c68339ca?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Frappé', 'desc' => 'Blended coffee beverage', 'price' => '5.50', 'student_price' => '4.68', 'rating' => '4.9', 'reviews' => '278', 'image' => 'https://images.unsplash.com/photo-1470790376778-a9fbc86d70e2?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Nitro Cold Brew', 'desc' => 'Infused with nitrogen for creamy texture', 'price' => '5.75', 'student_price' => '4.89', 'rating' => '4.8', 'reviews' => '145', 'image' => 'https://images.unsplash.com/photo-1534789115568-3b5d41c6a7e9?w=500&h=300&fit=crop&crop=center'],
            ] as $coffee)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $coffee['image'] }}" 
                         alt="{{ $coffee['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $coffee['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $coffee['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-xl font-bold text-amber-600 price-animate">${{ $coffee['price'] }}</div>
                            <div class="text-sm text-green-600 font-semibold">Student: ${{ $coffee['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($coffee['rating']))
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                @elseif($i == ceil($coffee['rating']) && str_contains($coffee['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $coffee['rating'] }} ({{ $coffee['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tea Section -->
<section id="tea" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl">
                <i class="fas fa-leaf text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Tea & More</h2>
                <p class="text-gray-600">Herbal, green, black, and specialty teas</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Green Tea', 'desc' => 'Classic Japanese green tea', 'price' => '3.00', 'student_price' => '2.55', 'rating' => '4.5', 'reviews' => '89', 'image' => 'https://images.unsplash.com/photo-1559177697-4607c8c10c85?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Chai Latte', 'desc' => 'Spiced black tea with steamed milk', 'price' => '4.25', 'student_price' => '3.61', 'rating' => '4.8', 'reviews' => '167', 'image' => 'https://images.unsplash.com/photo-1561336313-0bd5e0b27ec8?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'English Breakfast', 'desc' => 'Robust black tea blend', 'price' => '3.00', 'student_price' => '2.55', 'rating' => '4.6', 'reviews' => '78', 'image' => 'https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Matcha Latte', 'desc' => 'Japanese green tea powder with milk', 'price' => '5.00', 'student_price' => '4.25', 'rating' => '4.9', 'reviews' => '245', 'image' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Herbal Mint Tea', 'desc' => 'Refreshing peppermint infusion', 'price' => '3.25', 'student_price' => '2.76', 'rating' => '4.7', 'reviews' => '112', 'image' => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Hot Chocolate', 'desc' => 'Rich cocoa with steamed milk', 'price' => '4.00', 'student_price' => '3.40', 'rating' => '4.9', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=500&h=300&fit=crop&crop=center'],
            ] as $item)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $item['image'] }}" 
                         alt="{{ $item['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $item['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $item['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-xl font-bold text-amber-600 price-animate">${{ $item['price'] }}</div>
                            <div class="text-sm text-green-600 font-semibold">Student: ${{ $item['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($item['rating']))
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                @elseif($i == ceil($item['rating']) && str_contains($item['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $item['rating'] }} ({{ $item['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pastries Section -->
<section id="pastries" class="py-16 bg-amber-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl">
                <i class="fas fa-cookie-bite text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Pastries & Snacks</h2>
                <p class="text-gray-600">Freshly baked goods to accompany your coffee</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Croissant', 'desc' => 'Buttery, flaky French pastry', 'price' => '2.50', 'student_price' => '2.13', 'rating' => '4.8', 'reviews' => '278', 'image' => 'https://images.unsplash.com/photo-1555507036-ab794f27d2e9?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Chocolate Chip Muffin', 'desc' => 'Freshly baked with chocolate chips', 'price' => '3.00', 'student_price' => '2.55', 'rating' => '4.7', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1576866209830-589e1bfbaa4d?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Blueberry Scone', 'desc' => 'Tender, buttery scone with berries', 'price' => '3.25', 'student_price' => '2.76', 'rating' => '4.6', 'reviews' => '145', 'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Cinnamon Roll', 'desc' => 'Freshly baked with cream cheese icing', 'price' => '4.00', 'student_price' => '3.40', 'rating' => '4.9', 'reviews' => '234', 'image' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Chocolate Brownie', 'desc' => 'Rich, fudgy chocolate brownie', 'price' => '3.50', 'student_price' => '2.98', 'rating' => '4.8', 'reviews' => '167', 'image' => 'https://images.unsplash.com/photo-1564355808539-22fda35c7f0c?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Bagel with Cream Cheese', 'desc' => 'Fresh bagel with cream cheese', 'price' => '3.75', 'student_price' => '3.19', 'rating' => '4.5', 'reviews' => '134', 'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=500&h=300&fit=crop&crop=center'],
            ] as $item)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $item['image'] }}" 
                         alt="{{ $item['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $item['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $item['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-xl font-bold text-amber-600 price-animate">${{ $item['price'] }}</div>
                            <div class="text-sm text-green-600 font-semibold">Student: ${{ $item['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($item['rating']))
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                @elseif($i == ceil($item['rating']) && str_contains($item['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $item['rating'] }} ({{ $item['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Breakfast Section -->
<section id="breakfast" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl">
                <i class="fas fa-egg text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Breakfast</h2>
                <p class="text-gray-600">Start your day right with our breakfast options</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Avocado Toast', 'desc' => 'Smashed avocado on artisanal bread', 'price' => '6.50', 'student_price' => '5.53', 'rating' => '4.8', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1541519227354-08fa5d50c44d?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Breakfast Sandwich', 'desc' => 'Egg, cheese, and bacon on ciabatta', 'price' => '7.00', 'student_price' => '5.95', 'rating' => '4.9', 'reviews' => '234', 'image' => 'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Greek Yogurt Parfait', 'desc' => 'With granola and fresh berries', 'price' => '5.50', 'student_price' => '4.68', 'rating' => '4.7', 'reviews' => '156', 'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Oatmeal Bowl', 'desc' => 'Steel-cut oats with toppings', 'price' => '4.75', 'student_price' => '4.04', 'rating' => '4.6', 'reviews' => '112', 'image' => 'https://images.unsplash.com/photo-1548690312-e3b507d8c110?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Breakfast Burrito', 'desc' => 'Eggs, cheese, potatoes, and salsa', 'price' => '7.50', 'student_price' => '6.38', 'rating' => '4.8', 'reviews' => '178', 'image' => 'https://images.unsplash.com/photo-1551782450-17144efb9c50?w=500&h=300&fit=crop&crop=center'],
                ['name' => 'Fruit Salad Bowl', 'desc' => 'Seasonal fresh fruits', 'price' => '5.00', 'student_price' => '4.25', 'rating' => '4.7', 'reviews' => '134', 'image' => 'https://images.unsplash.com/photo-1519996529931-28324d5a630e?w=500&h=300&fit=crop&crop=center'],
            ] as $item)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $item['image'] }}" 
                         alt="{{ $item['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $item['name'] }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ $item['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-xl font-bold text-amber-600 price-animate">${{ $item['price'] }}</div>
                            <div class="text-sm text-green-600 font-semibold">Student: ${{ $item['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($item['rating']))
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                @elseif($i == ceil($item['rating']) && str_contains($item['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $item['rating'] }} ({{ $item['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Specials Section -->
<section id="specials" class="py-16 bg-gradient-to-r from-amber-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl">
                <i class="fas fa-crown text-white text-2xl"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white">Signature Specials</h2>
                <p class="text-amber-200">Exclusive creations you won't find anywhere else</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach([
                ['name' => 'CAEDA Caramel Dream', 'desc' => 'Our signature caramel-infused espresso with vanilla cold foam and caramel drizzle', 'price' => '6.50', 'student_price' => '5.53', 'rating' => '4.9', 'reviews' => '312', 'image' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=600&h=350&fit=crop&crop=center'],
                ['name' => 'Study Break Latte', 'desc' => 'Hazelnut-infused latte with chocolate shavings and whipped cream', 'price' => '6.00', 'student_price' => '5.10', 'rating' => '4.8', 'reviews' => '278', 'image' => 'https://images.unsplash.com/photo-1570196911492-4c4bf6e6c6a1?w=600&h=350&fit=crop&crop=center'],
                ['name' => 'Midnight Oil Espresso', 'desc' => 'Triple espresso shot with dark chocolate and orange zest', 'price' => '5.75', 'student_price' => '4.89', 'rating' => '4.7', 'reviews' => '189', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=600&h=350&fit=crop&crop=center'],
                ['name' => 'Campus Chai Delight', 'desc' => 'Spiced chai latte with honey and oat milk', 'price' => '5.50', 'student_price' => '4.68', 'rating' => '4.9', 'reviews' => '245', 'image' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=600&h=350&fit=crop&crop=center'],
            ] as $item)
            <div class="bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 overflow-hidden hover:bg-white/15 transition-colors">
                <div class="h-56 overflow-hidden">
                    <img src="{{ $item['image'] }}" 
                         alt="{{ $item['name'] }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">{{ $item['name'] }}</h3>
                            <p class="text-amber-100 text-sm mt-1">{{ $item['desc'] }}</p>
                        </div>
                        <div class="text-right ml-4">
                            <div class="text-2xl font-bold text-amber-300 price-animate">${{ $item['price'] }}</div>
                            <div class="text-sm text-green-300 font-semibold">Student: ${{ $item['student_price'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($item['rating']))
                                    <i class="fas fa-star text-amber-300 text-sm"></i>
                                @elseif($i == ceil($item['rating']) && str_contains($item['rating'], '.'))
                                    <i class="fas fa-star-half-alt text-amber-300 text-sm"></i>
                                @else
                                    <i class="far fa-star text-amber-300 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm text-amber-200">{{ $item['rating'] }} ({{ $item['reviews'] }})</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 transition-colors text-sm">
                            Add to Order
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Ready to Order?</h2>
            <p class="text-gray-600 mb-8">
                Place your order online and skip the line. Perfect for busy students!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-bold rounded-xl hover:from-amber-700 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl">
                    <i class="fas fa-mobile-alt"></i>
                    Start Online Order
                </button>
                <a href="/coffee" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all">
                    <i class="fas fa-arrow-left"></i>
                    Back to Coffee Shop
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    /* Active menu link */
    .menu-nav-link.active {
        background-color: #fef3c7;
        color: #92400e;
        font-weight: 600;
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 100px;
    }

    /* Section transition */
    section {
        scroll-margin-top: 80px;
    }

    /* Price tag animation */
    @keyframes pricePulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .price-animate:hover {
        animation: pricePulse 0.5s ease-in-out;
    }

    /* Image hover effects */
    .rounded-xl {
        transition: all 0.3s ease;
    }

    .rounded-xl:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Highlight active menu section
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.menu-nav-link');
        
        function highlightMenu() {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (window.scrollY >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', highlightMenu);
        
        // Add to cart functionality
        document.querySelectorAll('button:contains("Add to Order")').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.rounded-xl');
                const itemName = card.querySelector('h3')?.textContent || 'Item';
                const itemPrice = card.querySelector('.text-xl, .text-2xl')?.textContent || '$0.00';
                
                // Show success message
                showToast(`${itemName} added to cart! ${itemPrice}`);
                
                // Visual feedback
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Added!';
                this.classList.add('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                }, 2000);
            });
        });
        
        // Toast notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 z-50 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 animate-slideIn';
            toast.innerHTML = `
                <i class="fas fa-shopping-cart text-xl"></i>
                <span class="font-medium">${message}</span>
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('animate-slideIn');
                toast.classList.add('animate-slideOut');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }
        
        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            
            .animate-slideIn { animation: slideIn 0.3s ease-out forwards; }
            .animate-slideOut { animation: slideOut 0.3s ease-in forwards; }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection