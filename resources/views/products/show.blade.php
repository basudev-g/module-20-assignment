@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header"><span class="h4 text-secondary">Product Details</span>

                        <a href="{{ route('products.index') }}" class="btn btn-secondary float-end ms-2">Back</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary float-end">Edit</a>

                    </div>
                    <div class="card-body">
                        <b>Name:</b>
                        <p>{{ $product->name }}</p>
                        <b>Description:</b>
                        <p>{{ $product->description }}</p>
                        <b>Price:</b>
                        <p>{{ $product->price }}</p>
                        <b>Stock:</b>
                        <p>{{ $product->stock }}</p>
                        <b>Image:</b><br>
                        <img height="200" width="80%" src="{{asset('images/'.$product->image)}}" alt="{{$product->image . $product->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
