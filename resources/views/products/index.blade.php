<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto py-8">
                        <div class="flex justify-end mb-2">

                            @can('create product')
                            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                 Add Product
                            </a>
                            @endcan


                        </div>
                        <div class="flex flex-wrap">
                        <div class="grid grid-cols-3 gap-4 justify-center">
                            @foreach($products as $product)
                                <div class="bg-slate-200 border p-4 rounded-lg shadow-md mt-4 w-[23rem]">
                                    <h2 class="text-3xl font-semibold mt-4 uppercase" style="margin-left: 10px;">{{ $product->name }}</h2>
                                    <p class="text-gray-600 italic " style="margin-left: 10px;">{{ $product->description }}</p>
                                    <p class="text-gray-600 font-bold text-2xl" style="margin-left: 10px;">{{ $product->category }}</p>
                                    <p class="text-xl font-light mt-2 text-right" style="margin-left: 10px;">P{{ number_format($product->price, 2) }}</p>
                                    <div class="flex justify-end space-x-1 my-4">

                                        @can('edit product')
                                        <a href="{{ route('products.edit', $product->id) }}" class="rounded-md py-2 px-3 bg-blue-300 hover:bg-blue-500 duration-300 text-blue-600 hover:text-blue-900" style="margin-right: 10px;">
                                            EDIT
                                        </a>
                                        @endcan

                                        @can('delete product')
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md py-2 px-3 bg-red-300 hover:bg-red-500 duration-300 text-red-600 hover:text-red-900" style="margin-right: 10px;">
                                                DELETE
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                        
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
