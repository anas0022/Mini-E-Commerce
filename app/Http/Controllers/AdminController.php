<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home()
    {
        $orderCount = order::count(); 
        $productsCount = Product::count();
        return view('Admin.Home', compact('orderCount','productsCount')); 
    }
   public function order(Request $request)
{
    
    $search = $request->input('search');


    $orders = Order::with('user')
        ->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })
        ->paginate(10); 

    return view('Admin.orders', compact('orders', 'search'));
}

    public function product()
    {
        $products = Product::all(); // Use the correct model name
        return view('Admin/product_list', compact('products'));
    }

    public function add_product()
    {
        $products = Product::all(); 
        return view('Admin/add_product',compact('products'));
    }

    public function add_product_post(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product(); // Use the correct model name

        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        if ($product->save()) {
            return back()->with('success', 'Product added successfully');
        } else {
            return back()->with('error', 'Product addition failed');
        }
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        

        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }
        
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }

    public function update($id)
    { $products = Product::all(); 
        $product = Product::findOrFail($id);
        return view('admin/update_product', compact('product','products'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

   
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->save();
        return back()->with('success', 'Product updated successfully');
    }
}
