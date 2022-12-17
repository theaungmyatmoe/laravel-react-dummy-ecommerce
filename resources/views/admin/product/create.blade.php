@extends('admin.layout')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <h1 class="font-bold text-2xl mb-8">Create new product</h1>
    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
            <input
                name="name"
                type="text"
                id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                Product Image
            </label>
            <input
                name="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file">
        </div>

        {{--        Category list --}}
        <div class="mb-8">

            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Select Category
            </label>
            <select id="categories"
                    name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>

        {{--        Brands --}}
        <div class="mb-8">
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Select Brand
            </label>
            <select id="categories"
                    name="brand"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a band</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>

        </div>

        {{--        Colors --}}
        <div class="mb-8">
            <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Select Product Colors
            </label>
            <select multiple
                    name="colors[]"
                    id="countries_multiple"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($colors as $color)
                    <option value="{{ $color->name }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Price --}}
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                Product Price
            </label>
            <input
                name="price"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="number">
        </div>
        {{--         Rich text editor here --}}
        <div class="mb-8">

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                Description</label>
            <textarea
                name="body"
                id="body" rows="10"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>

        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create
        </button>
    </form>

@endsection


@section('scripts')
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#body').summernote({
                callbacks: {
                    async onImageUpload(files) {
                        const formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}')
                        formData.append('editor_image', files[0])

                        const res = await fetch('/admin/editor-image-upload', {
                            method: 'POST',
                            body: formData,
                        })
                        const data = await res.json()
                        $('#body').summernote('insertImage', data.image_url);
                    }
                }
            });
        });
    </script>
@endsection
