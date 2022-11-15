@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('products.index')}}" class="p-2 link-secondary"> All Products</a>
        <a href="{{ route('categories.index')}}" class="p-2 link-secondary"> All Categories</a>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                    @each('categories.parts.category_view', $categories, 'category')
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="col-md-12">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row">
                                    @each('products.parts.product_view', $products, 'product')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
