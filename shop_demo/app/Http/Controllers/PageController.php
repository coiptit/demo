<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $categories=Category::get();
        if ($request->input('keyword')!= null) {
            $key=trim($request->input('keyword'));
            $products=Product::where('name','like',"%{$key}%")->paginate(12);
            return view('pages.search', compact(['products','categories']))->with('i', (request()->input('page', 1) - 1) * 5 + 1);
        }else{
            $products = Product::latest()->paginate(12);
        }

        return view('pages.index', compact(['products','categories']))->with('i', (request()->input('page', 1) - 1) * 5 + 1);
    }

    public  function category($id){
        $cate_id=$id;
        $categories=Category::get();
        $products=Product::where('cate_id','like',"%{$cate_id}%")->get();
        return view('pages.category',compact('products','categories'));
    }

    public function addToCart($id){
//        session()->flush();
        $product=Product::find($id);
        $cart=session()->get('cart');
        if (isset($cart[$id])){
            $cart[$id]['quantity']+=1;
        }else{
            $cart[$id]=[
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->image,
                'summary'=>$product->summary,
                'quantity'=>1
            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);

    }

    public function updateCart(){

    }

    public function cart(){
        $categories=Category::get();
        $carts=session()->get('cart');
//        echo "<pre>";
//        print_r($carts);
        return view('pages.cart',compact('categories','carts'));


    }

    public function contact(){
        $categories=Category::get();
        return view('pages.contact',compact('categories'));
    }

    public function detail($id){
        $categories=Category::get();
        $products=Product::whereId($id)->get();
        $product=$products[0];
        return view('pages.detail',compact('product','categories'));
    }


}
