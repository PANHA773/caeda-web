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




@php
    // Render dynamic menu categories and their items
    $first = true;
@endphp

@foreach($menuCategories as $category)
    <section id="{{ $category->slug }}" class="py-16 {{ $loop->index % 2 ? 'bg-amber-50' : 'bg-white' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-12">
                <div class="p-3 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl">
                    @if($category->icon)
                        <i class="{{ $category->icon }} text-white text-2xl"></i>
                    @else
                        <i class="fas fa-coffee text-white text-2xl"></i>
                    @endif
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $category->name }}</h2>
                    <p class="text-gray-600">{{ $category->description ?? '' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($category->items && $category->items->isNotEmpty())
                    @foreach($category->items as $item)
                        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-48 overflow-hidden">
                                @if($item->image && file_exists(public_path('storage/' . $item->image)))
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-gray-900">{{ $item->title }}</h3>
                                        <p class="text-gray-600 text-sm mt-1">{{ $item->description }}</p>
                                    </div>
                                    <div class="text-right ml-4">
                                        <div class="text-xl font-bold text-amber-600 price-animate">${{ number_format($item->price, 2) }}</div>
                                        @if($item->old_price)
                                            <div class="text-sm text-gray-400 line-through">${{ number_format($item->old_price,2) }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($item->rating ?? 0))
                                                <i class="fas fa-star text-amber-400 text-sm"></i>
                                            @else
                                                <i class="far fa-star text-amber-400 text-sm"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-500">{{ $item->rating ?? '0.0' }} ({{ $item->reviews ?? 0 }})</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button 
                                            onclick="openDetailModal(this)" 
                                            data-title="{{ $item->title }}"
                                            data-description="{{ $item->description }}"
                                            data-price="{{ number_format($item->price, 2) }}"
                                            data-old-price="{{ $item->old_price ? number_format($item->old_price, 2) : '' }}"
                                            data-image="{{ $item->image && file_exists(public_path('storage/' . $item->image)) ? asset('storage/'.$item->image) : '' }}"
                                            data-rating="{{ $item->rating ?? 0 }}"
                                            data-reviews="{{ $item->reviews ?? 0 }}"
                                            class="px-3 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors text-sm" 
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="px-4 py-2 bg-amber-100 text-amber-700 font-medium rounded-lg hover:bg-amber-200 transition-colors text-sm">
                                            Add to Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center text-gray-500 py-20">No items found in this category.</div>
                @endif
            </div>
        </div>
    </section>
@endforeach





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

<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeDetailModal()"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate-slideIn">
            <div class="relative">
                <button onclick="closeDetailModal()" class="absolute top-4 right-4 bg-white/80 rounded-full p-2 text-gray-500 hover:text-gray-700 z-10">
                    <i class="fas fa-times"></i>
                </button>
                <div class="h-64 overflow-hidden bg-gray-100">
                    <img id="modalImage" src="" alt="" class="w-full h-full object-cover">
                    <div id="modalNoImage" class="w-full h-full flex items-center justify-center text-gray-400 hidden">
                        <i class="fas fa-coffee text-4xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-2" id="modalTitle"></h3>
                
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                         <div class="text-2xl font-bold text-amber-600" id="modalPrice"></div>
                         <div class="text-base text-gray-400 line-through" id="modalOldPrice"></div>
                    </div>
                </div>

                <div class="flex items-center mb-4" id="modalRating">
                     <!-- Stars injected here -->
                </div>

                <div class="prose prose-sm text-gray-600 mb-6">
                    <p id="modalDescription"></p>
                </div>

                <div class="flex gap-3">
                    <button type="button" class="flex-1 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent shadow-lg px-4 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-base font-medium text-white hover:from-amber-700 hover:to-orange-700 focus:outline-none transition-all hover:scale-[1.02]" onclick="addToOrderFromModal()">
                        <i class="fas fa-shopping-cart"></i> Add to Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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

    // Make these functions available globally
    window.openDetailModal = function(button) {
        const modal = document.getElementById('detailModal');
        const dataset = button.dataset;
        
        // Populate data
        document.getElementById('modalTitle').textContent = dataset.title;
        document.getElementById('modalDescription').textContent = dataset.description;
        document.getElementById('modalPrice').textContent = '$' + dataset.price;
        
        const oldPriceEl = document.getElementById('modalOldPrice');
        if (dataset.oldPrice) {
            oldPriceEl.textContent = '$' + dataset.oldPrice;
            oldPriceEl.classList.remove('hidden');
        } else {
            oldPriceEl.classList.add('hidden');
        }

        const img = document.getElementById('modalImage');
        const noImg = document.getElementById('modalNoImage');
        if (dataset.image) {
            img.src = dataset.image;
            img.classList.remove('hidden');
            noImg.classList.add('hidden');
        } else {
            img.classList.add('hidden');
            noImg.classList.remove('hidden');
        }

        // Generate stars
        const rating = parseFloat(dataset.rating);
        const reviews = dataset.reviews;
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= Math.floor(rating)) {
                starsHtml += '<i class="fas fa-star text-amber-400 text-sm"></i>';
            } else {
                starsHtml += '<i class="far fa-star text-amber-400 text-sm"></i>';
            }
        }
        starsHtml += `<span class="ml-2 text-sm text-gray-500">${rating} (${reviews} reviews)</span>`;
        document.getElementById('modalRating').innerHTML = starsHtml;

        // Show modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    window.closeDetailModal = function() {
        const modal = document.getElementById('detailModal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    window.addToOrderFromModal = function() {
        const title = document.getElementById('modalTitle').textContent;
        const price = document.getElementById('modalPrice').textContent;
        
        // Create a temporary simplified toast function usage or trigger the existing one if possible
        // Since showToast is scoped inside DOMContentLoaded, we typically can't access it unless we move it out or trigger an event.
        // For simplicity, let's just duplicate the toast logic or make showToast global.
        
        // Better yet, let's find the "Add to Order" button for this item and click it?? 
        // No, that's hard to find back. 
        // Let's just create a toast here directly for now.
        
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 z-50 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 animate-slideIn';
        toast.innerHTML = `
            <i class="fas fa-shopping-cart text-xl"></i>
            <span class="font-medium">${title} added to cart! ${price}</span>
        `;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.remove();
        }, 3000);

        closeDetailModal();
    }
</script>
@endsection