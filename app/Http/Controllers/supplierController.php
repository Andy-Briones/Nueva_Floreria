<?php

namespace App\Http\Controllers;

use App\Models\alssupllier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    //
    public function index()
    {
        $supplier['alssuplliers'] = alssupllier::paginate(5);
        return view('supplier.index', $supplier);
    }
    public function create()
    {
        return view('supplier.create');
    }
    public function store(Request $request)
    {
        $supplier = request()->except('_token');
        alssupllier::insert($supplier);
        return response()->json(['success' => true]);//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        $supplier = alssupllier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }
    public function update(Request $request, $id)
    {
        $supplier = request()->except(['_token', '_method']);
        alssupllier::where('id', '=', $id)->update($supplier);
        return redirect()->route('supplier.index');
    }
    public function destroy($id)
    {
        
    }
}
