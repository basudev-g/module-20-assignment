@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary">Create Product</h2>
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="product_id">Product ID</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="{{ 'PROD' . Str::random(5) }}" readonly>
            @error('product_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary text-right">Save</button>
    </form>
    </div>

@endsection