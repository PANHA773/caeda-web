<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" value="{{ old('title', $program->title ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Level</label>
        <select name="level" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="beginner" {{ (old('level', $program->level ?? '') == 'beginner') ? 'selected' : '' }}>Beginner</option>
            <option value="intermediate" {{ (old('level', $program->level ?? '') == 'intermediate') ? 'selected' : '' }}>Intermediate</option>
            <option value="advanced" {{ (old('level', $program->level ?? '') == 'advanced') ? 'selected' : '' }}>Advanced</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Mode</label>
        <select name="mode" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="online" {{ (old('mode', $program->mode ?? '') == 'online') ? 'selected' : '' }}>Online</option>
            <option value="offline" {{ (old('mode', $program->mode ?? '') == 'offline') ? 'selected' : '' }}>On-campus</option>
            <option value="hybrid" {{ (old('mode', $program->mode ?? '') == 'hybrid') ? 'selected' : '' }}>Hybrid</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tuition</label>
        <input type="number" name="tuition" value="{{ old('tuition', $program->tuition ?? 0) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Final Price</label>
        <input type="number" name="final_price" value="{{ old('final_price', $program->final_price ?? 0) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Students</label>
        <input type="number" name="students" value="{{ old('students', $program->students ?? 0) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Short Description</label>
        <textarea name="short_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('short_description', $program->short_description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $program->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Program Image</label>
        @if(!empty($program->image))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $program->image) }}" alt="Current image" class="w-48 h-32 object-cover rounded-md border">
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <p class="text-gray-500 text-sm mt-1">Upload a new image to replace the current one (optional).</p>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Badge</label>
            <input type="text" name="badge" value="{{ old('badge', $program->badge ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Badge Color</label>
            <input type="text" name="badge_color" value="{{ old('badge_color', $program->badge_color ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
    </div>

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured ?? false) ? 'checked' : '' }} class="mr-2">
            Featured
        </label>
    </div>

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="has_discount" value="1" {{ old('has_discount', $program->has_discount ?? false) ? 'checked' : '' }} class="mr-2">
            Has Discount
        </label>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Application Deadline</label>
        <input type="date" name="application_deadline" value="{{ old('application_deadline', isset($program->application_deadline) ? $program->application_deadline->format('Y-m-d') : '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    </div>
</div>
