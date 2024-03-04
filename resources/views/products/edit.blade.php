<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style type="text/css">
        i{
            font-size: 50px;
        }
    </style>
</head>
<body>
    @include('products.navbar')
    <div class="container w-50 border rounded-3 mt-5">
        <div class="header d-flex justify-content-between mt-5">
            <h1 class="pt-2 fw-bolder">Edit Product</h1>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3 mb-1">Back</a>
        </div>
        <div class="edit-form">
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bolder">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bolder">Price (RM):</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.0001">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bolder">Detail:</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" id="detail" name="details">{{ old('details', $product->details) }}</textarea>
                    @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bolder">Publish:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_published" id="publish_true" value="1" {{ old('is_published', $product->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_true">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_published" id="publish_false" value="0" {{ !old('is_published', $product->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_false">No</label>
                    </div>
                    @error('is_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mt-4 mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
