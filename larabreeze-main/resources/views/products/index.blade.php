<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __("Products") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="flex text-md space-x-8 mb-4 items-baseline">
                    <a href="{{ route('products.index') }}">
                        <div
                            class="{{Request::is('products')? 'dark:text-white border-b-2 pb-2 font-bold' :'dark:text-white/60'}}"
                        >
                            All Products
                        </div>
                    </a>
                    <a href="{{ route('available') }}">
                        <div
                            class="{{Request::is('products/available')? 'dark:text-white border-b-2 pb-2 font-bold' :'dark:text-white/60'}}"
                        >
                            Available
                        </div>
                    </a>
                    <a href="{{ route('unavailable') }}">
                        <div
                            class="{{Request::is('products/unavailable')? 'dark:text-white border-b-2 pb-2 font-bold' :'dark:text-white/60'}}"
                        >
                            Unavailable
                        </div>
                    </a>
                    <div>
                        <a href="{{ route('products.create') }}">
                            <button
                                class="bg-green-700 text-white px-2 py-1 rounded"
                            >
                                Add Product
                            </button>
                        </a>
                    </div>
                </div>
                @if (count($products) == 0)
                <div class="text-center dark:text-white mx-auto text-4xl my-10">
                    Product not found
                </div>
                @endif
                <div
                    class="grid grid-cols-4 gap-4 text-gray-900 dark:text-gray-100"
                >
                    @foreach ($products as $p)

                    <a href="{{ route('products.show', $p) }}">
                        <div
                            class="rounded-lg bg-slate-100 dark:bg-slate-700 overflow-hidden hover:outline hover:outline-green-600"
                        >
                            <div class="">
                                <img
                                    src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg?size=626&ext=jpg&ga=GA1.2.911816988.1685113774&semt=ais"
                                    alt="image"
                                />
                            </div>
                            <div class="p-3">
                                <div class="dark:text-white text-xl">
                                    {{$p->name}}
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="font-bold text-xl">
                                        Rp
                                        {{number_format($p->price, 2, ',', '.')}}
                                    </div>
                                    <div
                                        class="text-xs rounded-md dark:bg-slate-500 px-2 py-1"
                                    >
                                        {{$p->stock}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
