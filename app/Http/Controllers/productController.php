<?php

namespace App\Http\Controllers;

use App\Models\alsproduct;
use App\Models\alsproduct_category;
use App\Models\alssupllier;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function index(Request $request)
    {
        // Cargar relaciones correctas (por ejemplo: categories y supplier)
        $query = alsproduct::with(['categories', 'supplier']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->paginate(5);

        return view('productsGeneral.products.vistauser.secindex', compact('products'));
    }
    // 'productsGeneral.products.vistauser.secindex'
    // 'productsGeneral.products.index'

    public function create()
    {
        $categorys = alsproduct_category::all();   // todas las categorías
        $suppliers = alssupllier::all();   // todos los proveedores

        return view('productsGeneral.products.create', [
            'Modo' => 'crearP',
            'categorys' => $categorys,
            'suppliers' => $suppliers
        ]);
    }
    public function store(Request $request)
    {
        $product = request()->except('_token');
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);
        alsproduct::insert($product);
        return redirect('products');//->with('mensaje', 'Categoría agregada con éxito');
    }
    public function show()
    {
        
    }
    public function edit($id)
    {
        $product = alsproduct::findOrFail($id);
        $categorys = alsproduct_category::all();   // categorías
        $suppliers = alssupllier::all();           // proveedores
        
        return view('productsGeneral.products.edit', [
        'products' => $product,
        'categorys' => $categorys,
        'suppliers' => $suppliers,
        'Modo' => 'editarP'
        ]);
    }
    public function update(Request $request, $id)
    {
        $product = request()->except(['_token', '_method']);
        Product::where('id', '=', $id)->update($product);
        return redirect()->route('productsGeneral.products.index');
    }
    public function destroy($id)
    {
        
    }
}

