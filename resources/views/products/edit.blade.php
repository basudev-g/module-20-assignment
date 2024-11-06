@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span class="h4 text-secondary">Edit Product</span>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary float-end ms-2">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')??$product->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="product_id">Product ID</label>
                                <input type="text" class="form-control" id="product_id" name="product_id" value="{{ old('product_id')??$product->product_id }}" readonly>
                                @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price')??$product->price }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock')??$product->stock }}">
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image')??$product->image }}">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <img height="200px" width="200px" src="{{asset('images/'.$product->image) }}" alt="Image Not Found">
                            </div>
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description')??$product->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary text-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
