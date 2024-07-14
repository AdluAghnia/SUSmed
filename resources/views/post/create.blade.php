<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
    class="bg-white shadow-md rounded-lg p-4 mb-6 dark:bg-gray-800 dark:border-2 border-indigo-500">
    @csrf
    <div class="mb-4">
        <label for="caption" class="block text-gray-700 dark:text-gray-200">Caption</label>
        <textarea name="caption" id="caption" class="textarea textarea-primary textarea-lg w-full max-w-xs"
            placeholder="Type here ...."></textarea>
        <x-input-error :messages="$errors->get('caption')" class="mt-2" />
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 dark:text-gray-200">Image</label>
        <input type="file" id="image" name="image"
            class="file-input file-input-bordered file-input-primary rounded w-full max-w-lg"
            onchange="previewImage(event)" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
        <!-- Image preview -->
        <div class="mt-4">
            <img id="image-preview" src="#" alt="Image Preview" class="hidden w-full max-w-xs rounded-md"
                style="max-width: 150px; max-height: 150px;">
        </div>
    </div>
    <div class="flex justify-end">
        <button class="btn btn-primary rounded">Create Post</button>
    </div>
</form>

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const dataURL = reader.result;
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = dataURL;
            imagePreview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
