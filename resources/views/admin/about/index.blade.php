@extends('admin.layouts.app')

@section('title', 'Manage About Page')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Manage About Page</h1>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- General Info --}}
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">General Information</h2>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Page Title --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Page Title</label>
                        <input type="text" name="page_title" value="{{ old('page_title', $aboutContent->page_title) }}"
                            class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        @error('page_title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Header Title --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Header Title</label>
                        <input type="text" name="header_title"
                            value="{{ old('header_title', $aboutContent->header_title) }}"
                            class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        @error('header_title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Page Description</label>
                    <textarea name="page_description" rows="3"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('page_description', $aboutContent->page_description) }}</textarea>
                    @error('page_description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Rector Section --}}
            <div class="bg-white shadow rounded-lg p-6 mb-8 border-l-4 border-blue-500">
                <h2 class="text-xl font-bold text-blue-800 mb-4 border-b pb-2 flex items-center">
                    <i class="fas fa-user-tie mr-2"></i> Message from Leadership (Rector)
                </h2>

                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Image --}}
                    <div class="md:col-span-1 text-center">
                        <label class="block text-gray-700 font-semibold mb-2">Rector Image</label>

                        <div class="mb-4 relative group w-full h-64 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center border-2 border-dashed border-gray-300 hover:border-blue-400 text-gray-400 hover:text-blue-500 transition-colors cursor-pointer"
                            onclick="document.getElementById('rector_image').click()">
                            @if($aboutContent->rector_image)
                                <img src="{{ asset('storage/' . $aboutContent->rector_image) }}"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition-opacity">
                                    <span>Change Image</span>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-image text-4xl mb-2"></i>
                                    <span>Upload Image</span>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="rector_image" id="rector_image" class="hidden" accept="image/*"
                            onchange="previewImage(this)">
                        @error('rector_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Fields --}}
                    <div class="md:col-span-2 space-y-4">
                        {{-- Name --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Rectors Name</label>
                            <input type="text" name="rector_name"
                                value="{{ old('rector_name', $aboutContent->rector_name) }}"
                                class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="e.g. Dr. John Doe">
                            @error('rector_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Message Content</label>
                            <textarea name="rector_message" rows="8"
                                class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Enter the welcome message...">{{ old('rector_message', $aboutContent->rector_message) }}</textarea>
                            @error('rector_message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Find existing img or create one
                    let container = input.previousElementSibling;
                    let img = container.querySelector('img');

                    if (img) {
                        img.src = e.target.result;
                    } else {
                        // Replace placeholder with image
                        container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">
                                               <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition-opacity">
                                                   <span>Change Image</span>
                                               </div>`;
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection