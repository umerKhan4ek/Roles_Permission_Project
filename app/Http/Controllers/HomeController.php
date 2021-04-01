<?php

namespace App\Http\Controllers;

use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use AshAllenDesign\LaravelExchangeRates\Classes\RequestBuilder;
use AshAllenDesign\LaravelExchangeRates\Exceptions\ExchangeRateException;
use AshAllenDesign\LaravelExchangeRates\Exceptions\InvalidCurrencyException;
use AshAllenDesign\LaravelExchangeRates\Exceptions\InvalidDateException;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function mail()
    {
        // dd(public_path());
        // \Mail::to('umerkhan4ek@gmail.com')->send(new \App\Mail\UserEmails('umerkhan4ek@gamil.com', '12345678'));
        $to_name = 'umer';
        $to_email = '03409150077.m1@gmail.com';
        $data = array('name'=>'ali khan', 'body' => 'a test mail');
        Mail::send('mail.useremail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('dfdsf');
            $message->from('03409150077.m1@gmail.com','This is the emil');
            $message->attach(public_path('/121212.jpeg'));

        });
    }
    public function validation(Request $request)
    {

            // $str = currency(1, 'EUR', currency()->getUserCurrency());


        $request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users'
            ], 
            [
                'name.required' => 'Nameeee is required',
                'password.required' => 'Passwordsssss is required',
                'email.required' => 'unique email needed'
            ]
          );
   
    }
    public function googlepayintent(Request $request)
    {
 
        $exchangeRates = new ExchangeRate();
        // echo OpenExchange::convert('GBP');
        // return $str;
        // return ;
        $result = $exchangeRates->exchangeRate('USD', 'EUR');
        $reqtotal = $result * $request->totalamount;

        \Stripe\Stripe::setApiKey('sk_test_51HP4bFHQ9AejsTuz29H3xBaVHEWxxj84bFRLrqKvWBgtaBj51UbgAreOtsYNJlGlSd6EORhsfzfC2PEXihViF6VT00Tt7997PJ');
        //domain configuration
  
        //payment Intent
        $intent = \Stripe\PaymentIntent::create([
          
          'amount' => floor( $reqtotal),
          'currency' => 'eur',
          'setup_future_usage' => 'off_session',
        ]);
        return response()->json(['status' => 200,'client_secret'=> $intent->client_secret, "currency"=>'usd']);
    

    }

}
