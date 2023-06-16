<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __("New Product") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex space-x-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6"
            >
                <div class="w-[400px] rounded-md overflow-hidden shrink-0">
                    <img
                        src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg?size=626&ext=jpg&ga=GA1.2.911816988.1685113774&semt=ais"
                        alt="image"
                    />
                </div>
                <div class="space-y-2 text-white flex-col">
                    <form
                        class="text-2xl space-y-3"
                        action="{{ route('products.store') }}"
                        method="POST"
                    >
                        @csrf
                        <div>
                            <label
                                class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                            >
                                Name
                            </label>
                            <input
                                required
                                name="name"
                                type="text"
                                placeholder="Product name"
                                value=""
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            />
                        </div>
                        <div class="flex space-x-2">
                            <div>
                                <label
                                    class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                                >
                                    Harga
                                </label>
                                <input
                                    required
                                    name="price"
                                    type="number"
                                    value=""
                                    min="1"
                                    placeholder="0"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                />
                            </div>
                            <div>
                                <label
                                    class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                                >
                                    Stok
                                </label>
                                <input
                                    required
                                    name="stock"
                                    type="number"
                                    value=""
                                    min="1"
                                    placeholder="0"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                            >
                                Description
                            </label>
                            <textarea
                                name="description"
                                cols="10"
                                rows="3"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            >
Your product description </textarea
                            >
                        </div>
                        <button
                            type="submit"
                            class="bg-green-600 px-2 py-1 rounded-lg text-lg font-bold float-right"
                        >
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
