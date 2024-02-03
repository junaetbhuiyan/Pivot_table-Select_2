@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="container">
    <h1>Edite product</h1>
    <div>
        <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
            @csrf
            @method('put')

            <div>
                <label for="">Name:</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product name"
                    value="{{ $product->product_name }}">
            </div> <br>

            <div>
                <label for="">Quantity:</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity"
                    value="{{ $product->quantity }}">
            </div> <br>

            <div>
                <label for="">Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Price"
                    value="{{ $product->price }}">
            </div> <br>

             <div class="form-group">
                <label for="category">category</label>
                <select name="category[]" multiple="multiple" id="category" class="form-control w-100">
                    <option value="name">search a product</option>
                </select>
            </div><br> <br> 
            

                <div>
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
        </form>
    </div>
</body>

</html>

@section('scripts')
    <script>
        // Use jQuery.noConflict() if necessary
        jQuery(document).ready(function($) {
            $("#category").select2({
                ajax: {
                    url: '{{ URL('get') }}',
                    type: 'get',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            searchItem: params.term,
                            page: params.page,
                        };
                    },
                    processResults: function(data, params) {
                        return {
                            results: data.slice(0),
                        };
                    },
                    cache: true,
                },
                placeholder: 'Search for product...........',
                templateResult: templateResult,
                templateSelection: templateSelection
            })
        })

        function templateResult(data) {
            if (data.loading) {
                return data.text;
            }
            return data.name;
        }

        function templateSelection(data) {
            return data.name;
        }
    </script>
@endsection
