<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Product Details") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="w-[400px] rounded-md overflow-hidden shrink-0">
                    <img src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg?size=626&ext=jpg&ga=GA1.2.911816988.1685113774&semt=ais"
                        alt="image" />
                </div>
                <div class="space-y-2">
                    <div class="text-5xl font-bold dark:text-white flex space-x-6">
                        <div>

                            {{$product->name}}
                        </div>
                        <div>

                            <a href="{{ route('products.edit', $product) }}">
                                <i class="fa fa-pencil-square-o dark:text-white/70" style="font-size: 26px" aria-hidden="true"></i>
                            </a>
                        </div>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i class="fa fa-trash-o dark:text-white/70" style="font-size: 26px" aria-hidden="true"></i>
                            </button>
                        </form>

                    </div>
                    <div class="text-3xl dark:text-white">
                        Rp {{number_format($product->price, 2, ',', '.')}}
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="text-lg dark:text-white">
                            Total stok: {{$product->stock}}
                        </div>
                        <div class="flex space-x-1 dark:text-white">
                            <form action="{{ route('stock',$product) }}" method="POST">
                                @csrf @method('PUT')
                                <input name="stock" type="hidden" value="{{$product->stock-1}}">
                                <button type="submit" class="rounded-md bg-red-500/10 hover:bg-red-500 px-3 py-1">
                                    -
                                </button>
                            </form>
                            <form action="{{ route('stock',$product) }}" method="POST">
                                @csrf @method('PUT')
                                <input name="stock" type="hidden" value="{{$product->stock+1}}">
                                <button class="rounded-md bg-green-500/10 hover:bg-green-500 px-3 py-1">
                                    +
                                </button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="text-lg dark:text-white">Deskripsi produk</div>
                        <div class="text-md dark:text-white/60">
                            {{$product->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>