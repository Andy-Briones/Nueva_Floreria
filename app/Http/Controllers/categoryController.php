<?php

namespace App\Http\Controllers;

use App\Models\alsproduct_category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
     public function index()
    {
        $categories['alsproduct_categories'] = alsproduct_category::paginate(5);
        return view('productsGeneral.productCategorys.index', $categories);
    }
    public function create()
    {
        return view('productsGeneral.productCategorys.create');
    }
    public function store(Request $request)
    {
        $category = $request->except('_token');
        alsproduct_category::insert($category);
        return response()->json(['success' => true]);//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        $category = alsproduct_category::findOrFail($id);
        return view('productsGeneral.productCategorys.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = request()->except(['_token', '_method']);
        alsproduct_category::where('id', '=', $id)->update($category);
        return redirect()->route('productsGeneral.productCategorys.index');
    }
    public function destroy($id)
    {
        
    }
}
