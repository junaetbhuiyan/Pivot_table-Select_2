
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
        <form method="post" action="<?php echo e(route('category.update', ['category' => $category])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            
            <div>
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Category name" value="<?php echo e($category->name); ?>">
            </div> <br>

            <div>
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
    </div>
</body>
</html>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\practis_CRUD\resources\views/categories/edite.blade.php ENDPATH**/ ?>