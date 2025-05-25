<?php $__env->startSection('content'); ?>  <!-- Define o conteúdo específico da página -->
<!--
<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
-->

<!--
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
--> 
<?php echo e($slot); ?>

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/layouts/guest.blade.php ENDPATH**/ ?>