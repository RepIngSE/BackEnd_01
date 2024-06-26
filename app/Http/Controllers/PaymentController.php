<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay; 
use Illuminate\Support\Facades\DB; 

class PaymentController extends Controller
{
    private $gateway; 

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ))->send();
            $this ->crearTransaccion($request -> user_id, $request -> qrcode_id, "Paypal", "Pago generado", $request -> amount, "Pagado"); 
            if ($response->isRedirect()) {
                $response->redirect();
            }
            else {
                return $response->getMessage();
            }
        }catch (\Throwable $th){
            return $th->getMessage();
        }
    }

    public function crearTransaccion ($user_id, $qrcode_id, $payment_method, $message, $amount, $status){
        // Sentencia de insersión de chat
        DB::table('transactions')->insert([
            'user_id'=>$user_id, 
            'qrcode_id'=> $qrcode_id,
            'payment_method'=> $payment_method,
            'message' => $message,
            'amount' => $amount,
            'status' => $status
        ]); 
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            )); 

            $response = $transaction->send(); 

            if($response->isSuccessful()){
                $arr = $response->getData(); 
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id =
                $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email =
                $arr['payer']['payer_info']['email'];
                $payment->amount =
                $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save(); 
                
                return redirect()->route('transactions.index')->with('success', 'Payment is Successful. Your Transaction Id is: ' . $arr['id']);
            }
            else {
                return $response->getMessage(); 
            }
        }
        else {
            return 'Payment declined!!'; 
        }
    }

    public function error()
    {
        return 'User declined the payment!'; 
    }

}
