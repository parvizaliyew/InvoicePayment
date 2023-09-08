<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Order;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice_payment()
    {
        $user=User::select('id','name','surname','father_name')->inRandomOrder()->first();
        $service=Service::select('id','name','amount')->inRandomOrder()->first();
        return view('invoice_payment',compact('user','service'));
    }

    public function invoice_post(Request $request)
    {
        
        $data=$request->all();
        $data['order_id']=rand(100000, 900000);
        $order=Order::create($data);

        $transaction=new Transaction;
        $transaction->order_id = $order->id;
        $transaction->amount = $order->service->amount;
        $transaction->status=0;  //pending
        $transaction->save();

        $order_id=$order->order_id;
        return redirect()->route('card_payment',['order_id'=>$order_id]);

    }

    public function card_payment()
    {
        return view('payment');
    }

    public function payment_post(PaymentRequest $request)
    {
        //  1-successful ;
        //  2-not enough money ; 
        // -1-the bank rejected the payment.

        $random_status=[1,2,-1];
        $order_id=Order::where('order_id',$request->order_id)->first()->id;
        $transaction=Transaction::where('order_id',$order_id)->first();
        if ($transaction) {
            //randomly status
            $random_index = array_rand($random_status);
            $selected_status = $random_status[$random_index];
        
            $transaction->update([
                'status' => $selected_status,
            ]);
        
           return redirect()->back()->with('status', $selected_status);
        } 
        else {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

    }
}
