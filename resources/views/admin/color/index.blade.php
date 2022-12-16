@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold">Category</h1>

    {{-- Bread crumb --}}
    <nav class="my-4 flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/admin') }}"
                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <a href="#"
                       class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        Category
                    </a>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Category list --}}

    <div class="mb-4 flex justify-end">
        <a href="{{ route('categories.create') }}" type="button"
           class="text-white bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-700 dark:border-green-700">
            Create Category
        </a>
    </div>

    <div class="overflow-x-auto relative shadow-sm sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Category name
                </th>
                <th scope="col" colspan="2" class="py-3 px-6 text-center">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->name }}
                    </th>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('categories.edit',$category->slug) }}"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="py-4 px-6 text-left">
                        <form action="{{ route('categories.destroy',$category->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>

@endsection
