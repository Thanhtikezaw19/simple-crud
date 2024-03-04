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
<body class="text-center">
    @include('products.navbar')
    <div class="container w-75 border mt-5 rounded-3">
        <div class="header d-flex justify-content-between mt-5">
            <h1 class="pt-2 fw-bolder">Products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success mt-3">Create New Product</a>
        </div>
        <div class="search-form text-end d-flex">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <form action="{{ route('products.index') }}" method="GET" class="mt-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="product-table mt-1">
            @if (count($products) > 0)
                <table class="table">
                    <thead class="border">
                        <tr class="border">
                            <th class="border">Id</id>
                            <th class="border">Name</th>
                            <th class="border">Price (RM)</th>
                            <th class="border">Detail</th>
                            <th class="border">Publish</th>
                            <th class="border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @foreach ($products as $product)
                            <tr>
                                <td class="border col-md-1">{{ $product->id }}</td>
                                <td class="border col-md-2">{{ $product->name }}</td>
                                <td class="border col-md-2">{{ $product->price }}</td>
                                <td class="border col-md-4">{{ $product->details }}</td>
                                <td class="border col-md-1">{{ $product->is_published ? 'Yes' : 'No' }}</td>
                                <td class="border col-md-2">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Show</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->links() }}
            @else
                <p class="text-center">No products found.</p>
            @endif
        </div>
    </div>
</body>
</html>
