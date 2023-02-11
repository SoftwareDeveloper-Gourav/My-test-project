<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  
use App\Models\PaymentModel;  
use Razorpay\Api\Api;

class App extends Controller
{
   public function store(Request $request){
    // echo "pre";
    // return print_r($data->all());
    // die();
    $data=new Product;
    $data->product=$request->product;
    $data->price=$request->price;
    
    $file=$request->file;
    // dd($file);
    $ex=$file->getClientOriginalExtension();
    $file_name=time().'.'.$ex;
    $file->move('product/',$file_name);
    $data->photo=$file_name;
    $data->save();
    return response()->json([
     'title'=>'Upload Successfull..!',
     'icon'=>'success'
    ]);

   }

   public function all(){
    $all=Product::all();
    return view('test.product',['data'=>$all]);
   }

   public function buy($id){
    $api_key="rzp_test_4oyOo04IN4PKIA";
    $api_secret="GFQke1Ze9QQ8flRuOGejOAte";
    $api = new Api($api_key, $api_secret);
    
    $data=Product::find($id);
    session()->put('product',$data->product);
    session()->put('price',$data->price*100);
    $order=$api->order->create(array('amount'=>session('price'),'currency'=>'INR' ));
    $order_id=$order['id'];
    session()->put('order',$order_id);
    

    return redirect('Payment');
    
   }
   public function payment(Request $request){
    $api_key="rzp_test_4oyOo04IN4PKIA";
    $api_secret="GFQke1Ze9QQ8flRuOGejOAte";
    $api = new Api($api_key, $api_secret);
    $payment=$api->payment->fetch($request->input('razorpay_payment_id'));
    if($payment->captured!=0){
        session()->flash('scc',1);
        $save=new PaymentModel;
        $save->amount=session('price')/100;
        $save->pay_id=$payment->id;
        $save->order_id=$payment->order_id;
        $save->mobile=$payment->contact;
        $save->save();
        return redirect('Products');

        
    }else{
        session()->flash('err',1);
        return redirect('Products');


    }
   
    
   }
   
}

// rzp_test_4oyOo04IN4PKIA
// GFQke1Ze9QQ8flRuOGejOAte