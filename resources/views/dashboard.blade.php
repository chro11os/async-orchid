<div class="backdrop-blur-lg bg-[#0b1f35]/60 border border-white/20 shadow-2xl rounded-2xl p-6">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-bold text-3xl text-gray-900 dark:text-white leading-tight drop-shadow-md">
                {{ __('Brags Pogi') }}
            </h2>
        </x-slot>

        <div class="py-12 bg-gradient-to-br from-white to-gray-100 dark:from-[#0b1f35] dark:to-[#101f3c] min-h-screen">
            <div class="max-w-5xl mx-auto px-6">
                <div class="backdrop-blur-lg bg-white/70 dark:bg-white/5 border border-gray-200 dark:border-white/10 shadow-2xl rounded-2xl p-10 transition duration-300">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8">Generate Official Receipt</h3>

                    <form action="{{ route('receipt.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Project Name</label>
                            <input type="text" name="projectName" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:placeholder-gray-300 dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Customer Name</label>
                            <input type="text" name="customerName" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:placeholder-gray-300 dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Amount</label>
                            <input type="number" name="customerBalance" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:placeholder-gray-300 dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Description</label>
                            <input type="text" name="description" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:placeholder-gray-300 dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Project Start</label>
                            <input type="date" name="projectStart" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-200 mb-1">Project End</label>
                            <input type="date" name="projectEnd" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 border border-gray-300
                                   dark:bg-white/10 dark:text-white dark:border-white/10
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                    class="w-full mt-4 bg-blue-600 hover:bg-blue-700 transition-all duration-200 text-white px-6 py-3 rounded-xl font-semibold shadow-lg shadow-blue-900">
                                Download Receipt PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
