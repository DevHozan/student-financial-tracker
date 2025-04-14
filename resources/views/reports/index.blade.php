<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Financial Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Summary Cards in One Row -->
            <div class="flex flex-row gap-6 flex-wrap">
                <!-- Income Card (Green) -->
                <div style="background-color:dodgerblue" class="flex-1 min-w-[280px] bg-green-600 text-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-white bg-opacity-20">
                                <i class="fas fa-arrow-up text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">Total Income</p>
                                <p class="text-2xl font-semibold">
                                    ${{ number_format($totalIncome, 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('reports.income') }}" class="text-sm text-white underline hover:text-gray-100">
                                View Details <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Expenses Card (Dark) -->
                <div style="background:skyblue" class="flex-1 min-w-[280px] bg-gray-900 text-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-white bg-opacity-20">
                                <i class="fas fa-arrow-down text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">Total Expenses</p>
                                <p class="text-2xl font-semibold">
                                    ${{ number_format($totalExpenses, 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <!-- <a href="{{ route('reports.expenses') }}" class="text-sm text-white underline hover:text-gray-200">
                                View Details <i class="fas fa-arrow-right ml-1"></i>
                            </a> -->
                        </div>
                    </div>
                </div>

                <!-- Balance Card (Blue) -->
                <div  style="background:green" class="flex-1 min-w-[280px] bg-blue-600 text-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-white bg-opacity-20">
                                <i class="fas fa-wallet text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">Current Balance</p>
                                <p class="text-2xl font-semibold">
                                    ${{ number_format($balance, 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <!-- <a href="{{ route('reports.balance') }}" class="text-sm text-white underline hover:text-gray-100">
                                View Details <i class="fas fa-arrow-right ml-1"></i>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Quick Actions</h3>
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="{{ route('transactions.create') }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <i class="fas fa-plus mr-2"></i> Add New Transaction
                    </a>
                    <!-- <a href="{{ route('categories.create') }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <i class="fas fa-tag mr-2"></i> Manage Categories
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
