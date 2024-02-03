
<?php $__env->startSection('content'); ?>
    <div>

        <div class="container">
            <h1>Create Product</h1>
        </div>

        <div class="container">
            <form action="<?php echo e(route('product.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>

                <div>
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product name">
                </div> <br>

                <div>
                    <label for="">Quantity:</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                </div> <br>

                <div>
                    <label for="">Price:</label>
                    <input type="text" class="form-control" name="price" placeholder="Price">
                </div> <br>

                <div class="form-group">
                    <label for="category">category</label>
                    <select class="form-control" name="category[]" multiple="multiple" id="category">
                        <option value="name">search a product</option>
                    </select>
                </div><br>

                <div>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        // Use jQuery.noConflict() if necessary
        jQuery(document).ready(function($) {
            $("#category").select2({
                ajax: {
                    url: '<?php echo e(URL('get')); ?>',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\practis_CRUD\resources\views/products/create.blade.php ENDPATH**/ ?>