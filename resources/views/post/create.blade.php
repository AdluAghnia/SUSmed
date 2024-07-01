<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-4 mb-6 dark:bg-gray-800 dark:border-2 dark:border-sky-500">
    @csrf
    <div class="mb-4">
       <label for="caption" class="block text-gray-700 dark:text-gray-200">Caption</label>
       <input type="text" name="caption" id="caption" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 border-transparent focus:border-gray-500 focus:bg-white dark:focus:bg-gray-600 dark:text-gray-200">
       <x-input-error :messages="$errors->get('caption')" class="mt-2" /> 
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 dark:text-gray-200">Image</label>
        <input
         type="file"
         class="file-input file-input-bordered file-input-primary w-full max-w-xs"
         onchange="previewImage(event)"/>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />     
        <!-- Image preview -->
        <div class="mt-4">
            <img id="image-preview" src="#" alt="Image Preview" class="hidden w-full max-w-xs rounded-md" style="max-width: 150px; max-height: 150px;">
        </div>
    </div>
    <div class="flex justify-end">
        <x-primary-button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300 dark:bg-blue-700 dark:hover:bg-blue-800">
            {{ __('Create') }}
        </x-primary-button>
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

