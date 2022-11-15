@extends('layouts.app')

@section('content')
    @include('account.parts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Order #' . $order->id) }}</h3>
            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table align-self-center">
                                    <thead>
                                    <tr>
                                        <td><h4 class="text-center">Order data</h4></td>
                                    </tr>

                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td scope="row" class="text-center">{{__('Status')}}</td>
                                        <td class="text-center"> {{ $order->status->name }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('Name')}}</td>
                                        <td class="text-center"> {{ $order->name }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('Surname')}}</td>
                                        <td class="text-center"> {{ $order->surname }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('E-Mail')}}</td>
                                        <td class="text-center"> {{ $order->email }} </td>
                                    </tr>
                                    <tr>
                                        <td><h4 class="text-center">Delivery address</h4></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('City')}}</td>
                                        <td class="text-center"> {{ $order->city }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('Address')}}</td>
                                        <td class="text-center"> {{ $order->address }} </td>
                                    </tr>
                                    <tr>
                                        <td><h4 class="text-center">Goods</h4></td>
                                    </tr>




                                    @foreach($products as $key => $product)

                                        <tr>
                                            <td scope="row" class="text-center">{{__('Number from list')}}</td>
                                            <td class="text-center" scope="row">{{ ($key + 1) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"> <a href="{{ route('products.show', $product->id) }}"> <img src="{{  $product->thumbnailUrl  }}"
                                                                         style="max-width: 50px;"></a></td>
                                            <td class="text-center">{{ __($product->title) }}</td>
                                        </tr>

                                        <tr>
                                            <td scope="row" class="text-center">{{__('Price for 1')}}</td>
                                            <td class="text-center">{{ __($product->pivot->single_price . '$') }}</td>
                                        </tr>
                                        <td scope="row" class="text-center">{{__('Quantity of goods')}}</td>
                                        <td class="text-center">{{ __($product->pivot->quantity) }}</td>
                                        <tr>
                                            <td scope="row"
                                                class="text-center">{{__('Price for all: ')}}{{__($product->pivot->quantity)}}</td>
                                            <td class="text-center">{{ __($product->pivot->single_price * $product->pivot->quantity . '$') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td scope="row" class="text-center">{{__('Country')}}</td>
                                        <td class="text-center"> {{ $order->country }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('City')}}</td>
                                        <td class="text-center"> {{ $order->city }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text-center">{{__('Address')}}</td>
                                        <td class="text-center"> {{ $order->address }} </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="text-center" scope="col"> Total:</th>
                                        <th class="text-center" scope="col"> {{ $order->total }}$</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <a href="{{ route('orders.generate.invoice', $order) }}" class="btn btn-outline-primary">Download Invoice</a>
                                @if(!$order->is_completed && !$order->is_canceled)
                                    <form method="POST" class="w-100 text-right"
{{--                                          action="{{ route('account.orders.cancel', $order) }}">--}}
                                        @csrf
                                        <input type="submit" class="btn btn-outline-danger" value="Cancel order"/>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
