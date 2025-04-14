<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-bold mb-4">Financial Report</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Month</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Income</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bursary</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Expenses</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthlyData as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    {{ date('F Y', mktime(0, 0, 0, $data->month, 1, $data->year)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-green-600">
                                    ${{ number_format($data->total_income, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-600">
                                    ${{ number_format($data->total_bursary, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-red-600">
                                    ${{ number_format($data->total_expense, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <span class="text-{{ ($data->total_income + $data->total_bursary - $data->total_expense) >= 0 ? 'green' : 'red' }}-600">
                                        ${{ number_format($data->total_income + $data->total_bursary - $data->total_expense, 2) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 