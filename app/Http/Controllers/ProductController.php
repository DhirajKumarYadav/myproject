<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//============================================================
    public function home()
{
    return view('product');
}
//============================================================
    public function product()
    {
         $data = Product::all();
        return view('product', ['products'=>$data]);
    }
//============================================================
    public function detail($id)
    {
            $data = Product::find($id);
        return view('detail', ['product'=>$data]);
        // return view('detail', compact('data','id'));

    }
    //=========================================================
    public function search(Request $req)
    {
             $data = Product::where('name','like','%'. $req->input('query').'%')->get();
               return view('search', ['products'=>$data]);
    }
    //=============================================================
    public function addToCart(Request $req)
    {
        if($req->session()->has('dbdata'))
        {
            $cart = new Cart;
            $cart->user_id= $req->session()->get('dbdata')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
        return redirect('login');
    }
    }
//==============================================================
    static function cartItem()
    {
        $userId = Session::get('dbdata')['id'];
        return Cart::where('user_id',$userId)->count();
    }
//==================================================================
    public function cartlist()
    {
        $userId=Session::get('dbdata')['id'];
        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
 
        return view('cartlist',['products'=>$products]);
    }
    //===============================================================
    //removes the cart items from the cartlist page
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    //===============================================================
    function orderNow()
    {
        $userId=Session::get('dbdata')['id'];
         $total=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
 
        return view('ordernow',['total'=>$total]);     
    }
    public function buynow(Request $req)
    {
            $req->input();
            $total = Product::where(['id'=>$req->product_id])->first();
             $req->session()->put('total',$total['price']);
             $req->session()->put('pid',$total['id']);
           return view('dk');
   }
    function dkorder(Request $req)
    {
          $uid=Session::get('dbdata')['id'];
          $pid=Session::get('pid');
        $req->input();
        $order = new Order;
       $order->product_id=$pid;
       $order->user_id=$uid;
       $order->fullname=$req->fullname;
       $order->mobileno=$req->mobileno;
       $order->country=$req->country;
       $order->city=$req->city;
       $order->state=$req->state;
       $order->zipcode=$req->zipcode;
       $order->status="pending";
       $order->payment_method=$req->payment;
       $order->payment_status="pending";
       $order->save();
    return redirect('/');
    }
    //=================================================================
    function orderPlace(Request $req)
    {
        $userId=Session::get('dbdata')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
      foreach($allCart as $cart)
      {
        $order = new Order;
       $order->product_id=$cart['product_id'];
       $order->user_id=$cart['user_id'];
       $order->fullname=$req->fullname;
       $order->mobileno=$req->mobileno;
       $order->country=$req->country;
       $order->city=$req->city;
       $order->state=$req->state;
       $order->zipcode=$req->zipcode;
       $order->status="pending";
       $order->payment_method=$req->payment;
       $order->payment_status="pending";
         $order->save();
//this will delete the products from the cart table once the order is placed
    Cart::where('user_id',$userId)->delete();  
    }
     $req->input();
    return redirect('/');
    }

    
    //=============================================================
    function myOrders()
    {
        $userId=Session::get('dbdata')['id'];
        $orders =DB::table('orders')
       ->join('products','orders.product_id','=','products.id')
       ->where('orders.user_id',$userId)
       ->get();

       return view('myorders',['orders'=>$orders]);   
    }
    public function addProducts()
    {
return view('admin.addproduct');
    }
}
