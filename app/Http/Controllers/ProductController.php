<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Product;


class ProductController extends Controller
{
    function index (Product $products){
        $products =  Product::all()->take(-4);
       
        // $data=table::take(4);
        return view('welcome',compact('products'));
    }

    // function search(Request $request){
    //     $search = $request -> search;
    //     $products = product::where('name','like','%'.$search.'%')->get();
    //     return view('welcome',compact('products'));
    // }
    function search(Request $request){
        $output = '';
        if($request->ajax()){
        $products = product::where('name','like','%'.$request->search.'%')
                            ->orWhere('price','like','%'.$request->search.'%')
                            ->get();

        if($products){
            foreach($products as $product){
                $output .=
                ' 
                    <div class="product">
                        <img src="'.$product->image.'"alt="">
                        <div class="p-details">
                            <h2><a href="">'.$product->name.'</a></h2>
                            <h3>Rs.'.$product->price.'</h3>
                            <a href="{{ route(product.show, [id => $product->id]) }}">
                           
                        </div>
                    </div>
                ';
            }
            return response()->json( $output);

        }

            }
            return view('search');

 
    }
   
   

    function plantprotein (Product $products){
        $products = Product::where('name','=','Honest Plant Protein')->get();
        return view('plantprotein',compact('products'));
    }

    function gut (Product $products){
        $products = Product::where('name','=','Gut Reset Blend')->get();
        return view('gut',compact('products'));
    }

    function hair (Product $products){
        $products = Product::where('name','=','Hair Growth Blend')->get();
        return view('hair',compact('products'));
    }
    function skin (Product $products){
        $products = Product::where('name','=','Skin Boost Blend')->get();
        return view('skin',compact('products'));
    }
    function sleep (Product $products){
        $products = Product::where('name','=','Sleep Aid Blend')->get();
        return view('sleep',compact('products'));
    }
    function  men_multi  (Product $products){
        $products = Product::where('name','=','Multivitamin Men 18+')->get();
        return view(' men_multi ',compact('products'));
    }
    
  
 
    function men_category (){
        // $data = Product::all();
        // return view('plantprotein',compact('data'));
        return view('men_category');
    }
    function women_category (){
        // $data = Product::all();
        // return view('plantprotein',compact('data'));
        return view('women_category');
    }
    
    function women_multi (){
        // $data = Product::all();
        // return view('plantprotein',compact('data'));
        return view('women_multi');
    }
     function pcos (){
        // $data = Product::all();
        // return view('plantprotein',compact('data'));
        return view('pcos');
    }
    function teen_multi (){
        // $data = Product::all();
        // return view('plantprotein',compact('data'));
        return view('teen_multi');
    }

    // <<------------------------------------   cart  ---------------------------------->>
    function cart(){
        
        return view('cart');
    }
   
    function addToCart($id){
        $product = Product::findOrFail($id);

        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Cart successfully added!');

    }
    function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product remove successfully');
        }
    }

    function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            session()->flash('success','Cart successfully updated!');
        }
    }


}
