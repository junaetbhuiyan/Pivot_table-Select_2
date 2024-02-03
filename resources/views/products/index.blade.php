@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Product</h1>
            </div>
            <div class="col align-self-center d-flex justify-content-end">
                <a class="btn btn-success" href="http://127.0.0.1:8000/Product/create">Create Product</a>
            </div>
        </div>

        <table class="table table-bordered table-secondary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>category</th>
                    <th>Action</th>
                </tr>
            </thead>

            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @foreach($product->catgories as $category)
                        {{ $category->name}} 
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>

                        <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}">
                            @method('delete')
                            @csrf

                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            
            @endforeach
        </table>
    </div>


</body>

</html>
