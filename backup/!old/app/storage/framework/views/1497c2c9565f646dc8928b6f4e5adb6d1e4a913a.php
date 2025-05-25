<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', config('app.name', 'Laravel')); ?></title>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body>
    <!--
        <div class="min-h-screen bg-gray-100">
-->
    <!--
        <div class="h-screen flex flex-col">
            <div class="h-screen flex flex-col">
-->
    <!--
<div class="h-screen flex flex-col">
-->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if(View::hasSection('scroll')): ?>
        <main class="list-container">
        <?php else: ?>
            <main class="main-container">
    <?php endif; ?>


    <!-- Page Content -->

    <?php if(View::hasSection('content')): ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?>
    </main>

    <!--
</div>
-->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/scroll.js']); ?>
    </div>


</body>

</html>
<?php /**PATH /home/dev/app/resources/views/layouts/app.blade.php ENDPATH**/ ?>