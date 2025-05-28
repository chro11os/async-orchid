<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('receipt.generate') }}" method="POST">
                        @csrf
                        <div>
                            <label>Customer Name:</label>
                            <input type="text" name="customer_name" required class="border rounded p-2 w-full">
                        </div>
                        <div class="mt-4">
                            <label>Amount:</label>
                            <input type="number" name="amount" required class="border rounded p-2 w-full">
                        </div>
                        <div class="mt-4">
                            <label>Description:</label>
                            <input type="text" name="description" required class="border rounded p-2 w-full">
                        </div>
                        <button type="submit" class="mt-6 bg-blue-500 text-white px-4 py-2 rounded">
                            Download Receipt PDF
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
