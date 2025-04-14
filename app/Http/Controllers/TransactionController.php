<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactions = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->orderBy('transaction_date', 'desc')
            ->get();

        $totalIncome = Transaction::where('user_id', Auth::id())
            ->where('type', 'income')
            ->sum('amount');

        $totalBursary = Transaction::where('user_id', Auth::id())
            ->where('type', 'bursary')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', Auth::id())
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome + $totalBursary - $totalExpense;

        return view('transactions.index', compact('transactions', 'totalIncome', 'totalBursary', 'totalExpense', 'balance'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('transactions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense,bursary',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'transaction_date' => 'required|date'
        ]);

        $transaction = new Transaction($validated);
        $transaction->user_id = Auth::id();
        $transaction->save();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        $categories = Category::all();
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense,bursary',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'transaction_date' => 'required|date'
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);
        
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }

    public function report()
    {
        $monthlyData = Transaction::where('user_id', Auth::id())
            ->selectRaw('MONTH(transaction_date) as month, YEAR(transaction_date) as year, 
                        SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) as total_income,
                        SUM(CASE WHEN type = "bursary" THEN amount ELSE 0 END) as total_bursary,
                        SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as total_expense')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('transactions.report', compact('monthlyData'));
    }
} 