
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

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->product_name); ?></td>
                    <td><?php echo e($product->quantity); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td>
                        <?php $__currentLoopData = $product->catgories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($category->name); ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo e(route('product.edit', ['product' => $product])); ?>">Edit</a>

                        <form method="POST" action="<?php echo e(route('product.destroy', ['product' => $product])); ?>">
                            <?php echo method_field('delete'); ?>
                            <?php echo csrf_field(); ?>

                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>


</body>

</html>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\practis_CRUD\resources\views/products/index.blade.php ENDPATH**/ ?>