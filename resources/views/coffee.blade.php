@extends('layouts.app')

@section('title', 'CAEDA Coffee Shop | Premium Coffee & Cafe')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-amber-900 via-amber-800 to-gray-900">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
             alt="Coffee beans background" 
             class="w-full h-full object-cover opacity-30">
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500/20 backdrop-blur-sm rounded-full text-amber-200 text-sm font-semibold mb-6 border border-amber-500/30">
                <i class="fas fa-mug-hot"></i>
                Brewing Excellence Since 2023
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Freshly Roasted<br>
                <span class="text-amber-300">Campus Coffee</span>
            </h1>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl">
                Artisan coffee crafted with passion. Perfect for your study sessions, meetings, or just a quiet moment.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#menu" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl hover:from-amber-700 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-coffee"></i>
                    Explore Our Menu
                </a>
                <a href="#order" class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl hover:bg-white/20 transition-all border border-white/20">
                    <i class="fas fa-mobile-alt"></i>
                    Order Online
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">100+</div>
                <div class="text-gray-600 font-medium">Coffee Varieties</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">24/7</div>
                <div class="text-gray-600 font-medium">Open During Exams</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">15%</div>
                <div class="text-gray-600 font-medium">Student Discount</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">4.9★</div>
                <div class="text-gray-600 font-medium">Student Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section id="menu" class="py-20 bg-amber-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                STUDENT FAVORITES
            </span>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Signature Drinks</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Perfect companions for your academic journey</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Espresso" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-amber-500 text-white text-sm font-semibold rounded-full shadow-lg">BESTSELLER</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-gray-900">Double Shot Espresso</h3>
                        <div class="text-right">
                            <span class="text-2xl font-bold text-amber-600">$3.50</span>
                            <div class="text-sm text-gray-500 line-through">$4.00</div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Two shots of our finest espresso for that extra kick during late-night studies.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star-half-alt text-amber-400"></i>
                            <span class="ml-2 text-sm text-gray-600">(248)</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-semibold rounded-lg hover:bg-amber-200 transition-colors">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1570197788417-0e82375c9371?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Cappuccino" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full shadow-lg">STUDENT PICK</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-gray-900">Vanilla Cappuccino</h3>
                        <div class="text-right">
                            <span class="text-2xl font-bold text-amber-600">$4.75</span>
                            <div class="text-sm text-green-600 font-semibold">With Student ID: $4.05</div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Smooth espresso with steamed milk, vanilla syrup, and a light foam topping.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <span class="ml-2 text-sm text-gray-600">(312)</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-semibold rounded-lg hover:bg-amber-200 transition-colors">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Iced Coffee" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full shadow-lg">TRENDING</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold text-gray-900">Iced Caramel Macchiato</h3>
                        <div class="text-right">
                            <span class="text-2xl font-bold text-amber-600">$5.25</span>
                            <div class="text-sm text-green-600 font-semibold">With Student ID: $4.46</div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Perfect study companion - cold brew with caramel drizzle and milk.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star text-amber-400"></i>
                            <i class="fas fa-star-half-alt text-amber-400"></i>
                            <span class="ml-2 text-sm text-gray-600">(189)</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-semibold rounded-lg hover:bg-amber-200 transition-colors">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Full Menu Button -->
        <div class="text-center mt-16">
       <a href="{{ route('menu.index') }}"
   class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl hover:from-amber-700 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
    View Full Menu
    <i class="fas fa-arrow-right"></i>
</a>

        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Coffee beans" class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 bg-amber-500 p-6 rounded-2xl shadow-xl">
                        <div class="text-white">
                            <div class="text-3xl font-bold">15% OFF</div>
                            <div class="text-sm">For CAEDA Students</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                    CAMPUS PERKS
                </span>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Why Students Love Our Coffee</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-bolt text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Study Power Boost</h3>
                            <p class="text-gray-600">Specially brewed for concentration and focus during study sessions.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-wifi text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Free High-Speed WiFi</h3>
                            <p class="text-gray-600">Unlimited high-speed internet for all your research and assignments.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Group Study Friendly</h3>
                            <p class="text-gray-600">Large tables, power outlets, and quiet zones for productive group work.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Order Online Section -->
<section id="order" class="py-20 bg-gradient-to-r from-amber-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Skip the Line, Order Online</h2>
            <p class="text-xl text-amber-200 mb-8 max-w-2xl mx-auto">
                Order ahead and pick up your coffee without waiting. Perfect for busy class schedules!
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-mobile-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">1. Browse Menu</h3>
                    <p class="text-amber-100">View our complete menu online</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-shopping-cart text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">2. Customize Order</h3>
                    <p class="text-amber-100">Choose your preferences</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">3. Pick Up & Enjoy</h3>
                    <p class="text-amber-100">Ready when you arrive</p>
                </div>
            </div>
            
            <div class="mt-12">
                <button class="inline-flex items-center gap-2 px-8 py-4 bg-white text-amber-700 font-bold rounded-xl hover:bg-amber-50 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-play-circle"></i>
                    Start Your Order Now
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Location & Hours -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Visit Our Campus Cafe</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-amber-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Location</h3>
                            <p class="text-gray-600">CAEDA University Campus<br>Building B, Ground Floor<br>Next to the Library</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-amber-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Hours</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Weekdays</span>
                                    <span class="font-semibold">6:30 AM - 10:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Weekends</span>
                                    <span class="font-semibold">8:00 AM - 8:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-amber-600 font-semibold">Exam Period</span>
                                    <span class="font-bold text-amber-600">24 HOURS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-phone text-amber-500 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Contact</h3>
                            <p class="text-gray-600">+855 12 345 678<br>cafe@caeda.edu.kh</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.0138882091787!2d104.8924793153644!3d11.55085804758059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951add5e2cd81%3A0x171e0b69c7c6f7ba!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2s!4v1678880000000!5m2!1sen!2s" 
                    width="100%" 
                    height="100%" 
                    style="min-height: 400px; border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    /* Custom animation for coffee beans */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Custom scroll behavior */
    html {
        scroll-behavior: smooth;
    }
    
    /* Coffee gradient text */
    .coffee-gradient {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #92400e 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add to cart functionality
        document.querySelectorAll('button:contains("Add to Cart")').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.bg-white');
                const itemName = card.querySelector('h3').textContent;
                const itemPrice = card.querySelector('.text-2xl').textContent;
                
                // Create success toast
                createToast(`${itemName} added to cart! ${itemPrice}`);
                
                // Add animation effect
                this.innerHTML = '<i class="fas fa-check"></i> Added!';
                this.classList.add('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = 'Add to Cart';
                    this.classList.remove('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                }, 2000);
            });
        });
        
        // Order button animation
        document.querySelector('button:contains("Start Your Order Now")').addEventListener('click', function() {
            createToast('Redirecting to online ordering system...');
        });
        
        // Helper function to create toast notifications
        function createToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 z-50 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 animate-slideIn';
            toast.innerHTML = `
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-medium">${message}</span>
            `;
            
            document.body.appendChild(toast);
            
            // Remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove('animate-slideIn');
                toast.classList.add('animate-slideOut');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
        
        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
            
            .animate-slideIn {
                animation: slideIn 0.3s ease-out forwards;
            }
            
            .animate-slideOut {
                animation: slideOut 0.3s ease-in forwards;
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection