<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-4">Financial Summary</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-green-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-green-800">Total Income</h3>
                        <p class="text-2xl font-bold text-green-600">${{ number_format($totalIncome, 2) }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-blue-800">Total Bursary</h3>
                        <p class="text-2xl font-bold text-blue-600">${{ number_format($totalBursary, 2) }}</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-red-800">Total Expenses</h3>
                        <p class="text-2xl font-bold text-red-600">${{ number_format($totalExpense, 2) }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Balance</h3>
                        <p class="text-2xl font-bold {{ $balance >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            ${{ number_format($balance, 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Transactions</h2>
                <a href="{{ route('transactions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Transaction
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    {{ $transaction->transaction_date->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    {{ $transaction->category->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    {{ $transaction->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <span class="text-{{ $transaction->category->type === 'expense' ? 'red' : 'green' }}-600">
                                        ${{ number_format($transaction->amount, 2) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this transaction?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 