@extends('admin.layout')
@section('content')
    <div class="flex justify-end">
        <a href="{{ route('products.create') }}" type="button"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            New Product
        </a>
    </div>

    <div class="my-8 overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    Product Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6 text-center"
                    colspan="2">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 w-32">
                        <img src="{{ asset('/images/'.$product->image) }}" alt="Apple Watch">
                    </td>
                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                        {{ $product->name }}
                    </td>
                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                        ${{ $product->price }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('products.edit',$product->slug) }}"
                           class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit</a>
                    </td>
                    <td class="py-4 px-6 text-left">
                        <form action="{{ route('products.destroy',$product->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
