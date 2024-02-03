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
    <h1>Edite Category</h1>
    <div>
        <form method="post" action="{{route('category.update', ['category' => $category])}}">
            @csrf
            @method('put')
            
            <div>
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Category name" value="{{$category->name}}">
            </div> <br>

            <div>
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
    </div>
</body>
</html>