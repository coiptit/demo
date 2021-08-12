<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function detail($id){
        $categories=Category::get();
        $products=Product::whereId($id)->get();
        $product=$products[0];
        return view('pages.detail',compact('product','categories'));
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

    public function updateCart(Request $request){
        if ($request->id && $request->quantity){
            $carts=session()->get('cart');
            $carts[$request->id]['quantity']=$request->quantity;
            session()->put('cart',$carts);
            $carts=session()->get('cart');
            $cartComponent=view('pages.partial.cart_component',compact('carts'))->render();
            return response()->json(['cart_component'=>$cartComponent,'code'=>200],200);
        }
    }

    public function deleteCart(Request $request){
        if ($request->id ){
            $carts=session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts=session()->get('cart');
            $cartComponent=view('pages.partial.cart_component',compact('carts'))->render();
            return response()->json(['cart_component'=>$cartComponent,'code'=>200],200);
        }
    }
    public function cart(){
        $categories=Category::get();
        $carts=session()->get('cart');
        return view('pages.cart',compact('categories','carts'));


    }

    public function order(Request $request){
        $email=Auth::user()->email;
        $categories=Category::get();
        $carts=session()->get('cart');
        $orders=[
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'message'=>$request->input('message'),
            'carts'=>$carts
        ];

        Mail::to($email)->send(new OrderMail($orders));
        Mail::to('coi7420@gmail.com')->send(new OrderMail($orders));
        session()->forget('cart');
        return view('pages.order_success',compact('categories'));
    }

    public function contact(){
        $categories=Category::get();
        return view('pages.contact',compact('categories'));
    }

    public function contactPost(Request $request){
        $categories=Category::get();
        $email=Auth::user()->email;
        $contacts=[
            'name'=>$request->input('name'),
            'email'=>$email,
            'message'=>$request->input('message')
        ];
        Mail::to($email)->send(new ContactMail($contacts));
        Mail::to('coi7420@gmail.com')->send(new ContactMail($contacts));
        return view('pages.contact_success',compact('categories'));
    }

}
