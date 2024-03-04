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
            <h1 class="pt-2 fw-bolder">Show Product</h1>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3 mb-1">Back</a>
        </div>
        <div class="show-panel text-left">
            <div class="mt-4 mb-4">
                <p class="card-text"><span style="font-weight: 900;">Name: </span> {{ $product->name }}</p>
                <p class="card-text"><span style="font-weight: 900;">Price: </span> RM {{ $product->price }}</p>
                <p class="card-text"><span style="font-weight: 900;">Detail: </span> {{ $product->details }}</p>
                <p class="card-text"><span style="font-weight: 900;">Publish: </span> <span class="{{ $product->is_published ? 'text-success' : 'text-danger' }}">{{ $product->is_published ? 'Yes' : 'No' }}</span></p>

            </div>
        </div>
    </div>

</body>
</html>
