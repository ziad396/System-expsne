<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
    use AuthorizesRequests;
    public function adminPanal()
    {
        $user = User::all();
        return view('admin.panal', compact('user'));
    }
    public function create()
    {
        $role = Role::all();
        return view('admin.insert', compact('role'));
    }
    public function insertUser(InsertUserRequest $request)
    {

        $validated = $request->validated();
        
        $validated['password']=Hash::make('$validated');
        $user = User::create($validated);
        $user->roles()->attach($validated['role']);
        return redirect('adminpanal/user')->with('success', 'User created successfully!');
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('admin.updateuser', compact('user', 'role'));
    }
    public function updateUser(UpdateUserRequest $request, string $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->roles()->sync($validated['role']);

        if (!empty($validated['password'] ?? null)) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect('adminpanal/user');
    }
    public function createExpense()
    {
        $expense = Expense::all();

        return view('admin.expense', compact('expense'));
    }
     public function editExpense(string $id)
    {
        //
        $expense = Expense::findOrFail($id);
        $category = Category::all();
        // $user = auth()->user();
        // if ($user->roles->contains('name', 'admin')) {
        //     # code...
        //     return view('expense.update', compact('expense', 'category'));
        // } 
          
            return view('admin.updateExpense', compact('expense', 'category'));
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateExpense(UpdateExpenseRequest $request, string $id)
    {
        //
        $validate = $request->validated();

        $expense = Expense::findOrFail($id);

        $expense->update($validate);
        return redirect()->route('expense.manage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteExpense(string $id)
    {
        //
        $expense = Expense::findOrFail($id);
        $user = auth()->user();
        
           
         $expense->delete();
        


        return redirect('manage/expense');

    }
    public function deleteUser(string $id)
    {
        //
        $user = User::findOrFail($id);
       
        
           
         $user->delete();
        


        return redirect('adminpanal/user');

    }
}
