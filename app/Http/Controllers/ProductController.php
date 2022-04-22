<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->where('client_id', auth()->user()->id)->paginate(5);
        return view('client/dashboard', compact('products'));
    }
    public function display()
    {
        
        $category = DB::table('categories')->where('client_id', auth()->user()->id)->get();
        return view('client/displaycategory', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'quantity'=> 'required',
            'pricePerUnit'=> 'required',

        ]);

        $products = new Product;
        $paths = $request->file('image')->store('public/images');
        
        if ($paths) {
            $path = explode('/',$paths);
            $file = end($path);
            $products->name = $request->input('name');
            $products->description = $request->input('description');
            $products->quantity = $request->input('quantity');
            $products->price_per_unit = $request->input('pricePerUnit');
            $products->category = $request->input('category');
            $products->image = $file;
            $products->client_id = auth()->user()->id; 
            
            $products->save();
            
            return redirect('dashboard')->with('success', 'product added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }
    }
    public function category(Request $request)
    {
        $this->validate($request, [
            'category'=> 'required',
            

        ]);
        $category = new Category;
            $category->category = $request->input('category');
            $category->client_id = auth()->user()->id; 
            
            $category->save();
         if($category)   {
            return redirect('dashboard')->with('success', 'product added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
