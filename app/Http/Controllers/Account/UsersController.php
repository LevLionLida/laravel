<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Auth\UpdateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('account/index', ['user' => auth()->user()]);
    }

    public function edit(User $user)
    {
        return view('account/users/edit', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->update($request->validated())) {
            return redirect()->route('account.index');
        } else {
            return redirect()->back()->withInput();
        }

    }


    public function list (User $user){

      $orders = Order::all()->where('user_id', $user->id);
      return view('account/orders/index', compact('user', 'orders'));
    }
    public function show(Order $order)
    {

     $products = $order->products()->get();

   return view('account/orders/show', compact('order', 'products'));

    }


}
