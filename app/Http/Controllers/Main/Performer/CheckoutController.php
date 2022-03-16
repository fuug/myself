<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Requests\Main\PaymentRequest;
use App\Models\Role;
use App\Models\Subscription;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CheckoutController
{

    public function __invoke(User $currentPerformer)
    {
        $subscriptions = $currentPerformer->subscriptions_performer->where('customer_id', '');
        $pricePerOne = $currentPerformer->performerDescription->pricePerOnceSession;
        $performers = Role::all()->where('title', 'performer')->first()->users;
        return view('user.checkout', compact('performers', 'currentPerformer', 'subscriptions', 'pricePerOne'));
    }

    public function payment(PaymentRequest $request)
    {
        $user = auth()->user();
        $performer_id = $request->performer_id;
        $subscription_id = $request->subscription_id;
        $sum = $request->hiddenSum;
        return view('user.testPayment', compact('performer_id', 'subscription_id', 'sum', 'user'));
    }

    public function done(User $customer, $subscription_id)
    {


        $res = Http::post('https://api.cloudpayments.ru/test');
        dd($res->reason());

//        $res = $client->request('POST', 'https://secure.wayforpay.com/pay', [
//            'merchantAccount' => 'test_merch_n1',
//            'merchantDomainName' => 'www.market.ua',
//            'merchantTransactionSecureType'=> 'AUTO',
//            'merchantSignature'=> '86c895ffa82bf2f1299bcede2292e02a',
//            'orderReference'=>'DH1644567493',
//            'orderDate'=> '1415379863',
//            'amount'=> '1547.36',
//            'currency' => 'UAH',
//            'productName[]' => 'Процессор Intel Core i5-4670 3.4GHz',
//            'productName[]' => 'Память Kingston DDR3-1600 4096MB PC3-12800',
//            'productPrice[]' => '1000',
//            'productPrice[]' => '547.36',
//            'productCount[]' => '1',
//
//        ]);
//
//        $string = "test_merchant;www.market.ua;DH783023;1415379863;1547.36;UAH;Процессор Intel Core i5-4670 3.4GHz;Память Kingston DDR3-1600 4096MB PC3-12800;1;1;1000;547.36";
//        $key = "dhkq3vUi94{Z!5frxs(02ML";
//        $hash = hash_hmac("md5",$string,$key);
//        $res = $client->request('POST', 'https://secure.wayforpay.com/pay', [$hash]);

//        $subscription->update([
//            'customer_id' => $customer->id
//        ]);
//        dd($subscription);
    }
}
