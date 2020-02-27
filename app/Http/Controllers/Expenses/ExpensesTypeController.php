<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expenses\ExpensesType;
use App\Models\Expenses\Party;

class ExpensesTypeController extends Controller
{
    
    public function index() 
    {    
        $data = ExpensesType::all();
        
        return view('expenses.expenses_type.index',compact('data'));
    }
    public function create()
    {
        return view('expenses.expenses_type.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([ 'expense_type' => 'required|unique:expenses_type_details' ]);
        $data['expense_type'] = strtoupper($data['expense_type']);
        ExpensesType::create($data);
        return redirect()->route('expense_type.index');

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
       $data = ExpensesType::find($id);
        return view('expenses.expense_type.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([ 'expense_type' => 'required' ]);
        $data['expense_type'] = strtoupper($data['expense_type']);
        ExpensesType::where('id',$id)->update($data);
        return redirect()->route('expense_type.index');
    }
    public function destroy($id)
    {
        ExpensesType::destroy($id);
        return redirect()->route('expense_type.index');
    }
    public function add_expense_in_expense(Request $request)
    {
        $data = $request->validate([ 'expense_type' => 'required|unique:expenses_type_details' ]);
        $data['expense_type'] = strtoupper($data['expense_type']);
        ExpensesType::create($data);
        return redirect()->route('expanses.create');
    }
    public function add_expense_in_party(Request $request)
    {
        $data = $request->validate([ 'expense_type' => 'required|unique:expenses_type_details' ]);
        $data['expense_type'] = strtoupper($data['expense_type']);
        ExpensesType::create($data);
        return redirect()->route('party.create');
    }
}
