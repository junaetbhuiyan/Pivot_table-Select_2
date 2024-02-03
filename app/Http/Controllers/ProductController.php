<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));   

    }

    //select /
    public function Category(Request $request){
        $data=Category::where('name','like','%'.$request->searchItem.'%') ->get();

        return $data;
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    
    {
      
        // Validation rules
        $data = $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
           
        ]);


        // If validation passes, proceed to store the data in the database
        // Example: Store data in the 'your_table' table
        /*   $product =  neew Product */
     
       $product = Product::create([
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
           
            // Add more fields as needed
        ]);
        
              
        if ($request->input('category')) {
         
            $product->catgories()->sync($request->input('category'));
        }
          
        // Redirect or respond as needed after successful storage
        return redirect()->route('product.index')->with('success', 'Data has been successfully stored.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
    
        return view('products.edite', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
                'product_name' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                // 'category' => 'required',
            ]);


        $product->update($data);

        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         // Delete the product
         $product->delete();
 
         // Redirect or respond as needed after successful deletion
         return redirect(route('product.index'))->with('success', 'Product deleted successfully.');
     
    }
}
