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
            <h1 class="pt-2 fw-bolder">Add New Product</h1>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3 mb-1">Back</a>
        </div>
        <div class="create-form text-left">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3 text-left">
                    <label for="name" class="form-label text-left fw-bolder">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bolder">Price:</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.0001" style="-webkit-appearance: none; -moz-appearance: textfield;" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label">Detail:</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details">{{ old('details') }}</textarea>
                    @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Publish:</label>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="is_published" id="publish_yes" value="1" {{ old('is_published') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_yes">Yes</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="is_published" id="publish_no" value="0" {{ old('is_published') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_no">No</label>
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
