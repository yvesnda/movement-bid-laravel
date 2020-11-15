<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::resource('/offers', \App\Http\Controllers\OfferController::class)
    ->names([
        'index'=>'offers.index',
        'create'=>'offers.create',
        'store'=>'offers.store',
        'show'=>'offers.show',
    ])->middleware(['auth']);

Route::resource('/bids', \App\Http\Controllers\BidController::class)
    ->names([
        'store'=>'bids.store'
    ])->middleware(['auth']);

Route::get('/login', function(){
    return view('auth.login');
})->name('login')->middleware(['guest']);

Route::get('/register', function(){
    return view('auth.register');
})->name('register')->middleware(['guest']);

Route::post('/login', function(){
    if(\Illuminate\Support\Facades\Auth::attempt(['email'=>\Illuminate\Support\Facades\Request::input('email'),'password'=>\Illuminate\Support\Facades\Request::input('password')])){
        return redirect()->intended(route('home'));
    } else {
        return back()->with('error',__('Cannot login'))->withInput();
    }
})->name('doLogin')->middleware(['guest']);

Route::post('/register', function(\App\Http\Requests\UserRequest $request){
    $user = new \App\Models\User();
    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->password = \Illuminate\Support\Facades\Hash::make($request->get('password'));
    $user->telephone = $request->get('telephone');
    $user->role = $request->get('role');
    $user->type = $request->get('type');
    if($user->save()){
        return back()->with('success',__('Registration Success'));
    } else {
        return back()->with('error',__('Could not register'));
    }

})->name('doRegister')->middleware(['guest']);

Route::post('/home',function(\App\Http\Requests\OfferRequest $request){
    $offer = new \App\Models\Offer();
    $offer->required_date = $request->get('required_date');
    $offer->type = $request->get('type');
    $offer->location = $request->get('location');
    $offer->destination = $request->get('destination');
    $offer->measure = $request->get('measure');
    $offer->mass = $request->get('mass');
    $offer->description = $request->get('description');
    $offer->status = 'open';
    session()->put('offer',$offer);
    return redirect(route('offer-confirm'));
})->name('doHome');

Route::get('/offer-confirm',function(){
    $offer = session('offer');
    return view('offer.confirm',['offer'=>$offer]);
})->name('offer-confirm')->middleware(['auth']);

Route::post('/offer-confirm', function(\Illuminate\Http\Request $request){
    $offer = session('$offer');
    $offer->user_id = \Illuminate\Support\Facades\Auth::user()->id;
    if($offer->save()){
        return redirect(route('offers.index'))->with('success','Offer Created');
    }else{
        return redirect(route('offers.index'))->with('error','Offer Could not be created');
    }
})->name('doOfferConfirm')->middleware(['auth']);

Route::get('/markSuccess/{bid}', function(\App\Models\Bid $bid){
    $offer = $bid->offer;
    $offer->success_bid_id = $bid->id;
    $offer->status = 'closed';
    if($offer->update()){
        return redirect(route('offers.index'));
    } else {
        return back().with('error','Cannot close the offer');
    }
})->name('offer.close');

Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(route('login'));
})->name('logout')->middleware(['auth']);

Route::get('/history', function(){
    $offers = \App\Models\Offer::where('status','closed')->where('user_id',\Illuminate\Support\Facades\Auth::user()->id);
    return view('offer.history',['offers'=>$offers]);
})->middleware(['auth'])->name('history');


