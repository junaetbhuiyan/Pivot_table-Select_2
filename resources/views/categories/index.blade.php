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
                <h1>Category</h1>
            </div>
            <div class="col align-self-center d-flex justify-content-end">
                <a class="btn btn-success" href="http://127.0.0.1:8000/Category/create">Create Category</a>
            </div>
        </div>

        <table class="table table-bordered table-secondary">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            @foreach ($categories as $category)
                <tr>
                    
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('category.edit', ['category' => $category]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


</body>

</html>
