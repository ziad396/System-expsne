<?php

namespace App\Http\Controllers;


use App\Http\Requests\ExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExpenseController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userId = auth()->id();
        $expense = Expense::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();


        $totalExpense = Expense::where('user_id', $userId)->sum('amount');
        return view('expense.expense', compact('expense', 'totalExpense'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('expense.insert', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        //
        $validated = $request->validated();


        $validated['user_id'] = auth()->id();
        $validated['category_id'] = $validated['category'];
        $expense = Expense::create($validated);
        return redirect('/expense');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $expense = Expense::findOrFail($id);
        $category = Category::all();
        $user = auth()->user();
        if ($user->roles->contains('name', 'admin')) {
            # code...
            return view('expense.update', compact('expense', 'category'));
        } else {
            $this->authorize('update', $expense);
            return view('expense.update', compact('expense', 'category'));
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, string $id)
    {
        //
        $validate = $request->validated();

        $expense = Expense::findOrFail($id);

        $expense->update($validate);
        return redirect('expense');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $expense = Expense::findOrFail($id);
        $user = auth()->user();
        if ($user->roles->contains('name', 'role')) {
            # code...
            $expense->delete();
        } else {
            $this->authorize('delete', $expense);
            $expense->delete();
        }


        return redirect('expense');

    }

}
