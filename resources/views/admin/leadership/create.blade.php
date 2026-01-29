@extends('admin.layouts.app')

@section('title', 'Add Leadership Message')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Add New Message</h1>
            <a href="{{ route('admin.leadership.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>

        <div class="bg-white shadow rounded-xl border border-gray-100 p-6 md:p-8">
            <form action="{{ route('admin.leadership.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    {{-- Name --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm"
                            placeholder="e.g. Dr. John Doe">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Position</label>
                        <input type="text" name="position" value="{{ old('position') }}"
                            class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm"
                            placeholder="e.g. Rector of CAEDA">
                        @error('position') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Message --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea name="message" rows="10"
                        class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm"
                        placeholder="Type the message here...">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    {{-- Image --}}
                    <div class="md:col-span-1">
                        <label class="block text-gray-700 font-semibold mb-2">Leader Image</label>
                        <div class="relative group h-48 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200 flex items-center justify-center text-gray-400 hover:border-indigo-500 hover:text-indigo-500 transition-all cursor-pointer"
                            onclick="document.getElementById('image').click()">
                            <div id="preview-container" class="w-full h-full hidden">
                                <img id="image-preview" src="" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div id="upload-placeholder" class="text-center">
                                <i class="fas fa-image text-3xl mb-2"></i>
                                <p class="text-xs">Click to upload image</p>
                            </div>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*"
                            onchange="previewImage(this)">
                        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Order --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm">
                        @error('order') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Is Active --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Status</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:width-5 after:transition-all peer-checked:bg-indigo-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-600">Active</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4 border-t pt-6">
                    <button type="reset"
                        class="px-6 py-2 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50 transition">Reset</button>
                    <button type="submit"
                        class="px-8 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                        <i class="fas fa-save mr-2"></i> Save Message
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('preview-container').classList.remove('hidden');
                    document.getElementById('upload-placeholder').classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection