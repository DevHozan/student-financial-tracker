<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->sum('amount');
        $totalExpenses = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->sum('amount');
        $totalBursary = Transaction::where('user_id', $user->id)
            ->where('type', 'bursary')
            ->sum('amount');
        $balance = $totalIncome + $totalBursary - $totalExpenses;

        return view('reports.index', compact('totalIncome', 'totalExpenses', 'totalBursary', 'balance'));
    }

    public function income()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->with('category')
            ->latest('transaction_date')
            ->get();

        $categories = Category::where('type', 'income')->get();
        $totalIncome = $transactions->sum('amount');

        return view('reports.income', compact('transactions', 'categories', 'totalIncome'));
    }

    public function expenses()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->with('category')
            ->latest('transaction_date')
            ->get();

        $categories = Category::where('type', 'expense')->get();
        $totalExpenses = $transactions->sum('amount');

        return view('reports.expenses', compact('transactions', 'categories', 'totalExpenses'));
    }

    public function balance()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)
            ->with('category')
            ->latest('transaction_date')
            ->get();

        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpenses = $transactions->where('type', 'expense')->sum('amount');
        $totalBursary = $transactions->where('type', 'bursary')->sum('amount');
        $balance = $totalIncome + $totalBursary - $totalExpenses;

        return view('reports.balance', compact('transactions', 'totalIncome', 'totalExpenses', 'totalBursary', 'balance'));
    }
}
