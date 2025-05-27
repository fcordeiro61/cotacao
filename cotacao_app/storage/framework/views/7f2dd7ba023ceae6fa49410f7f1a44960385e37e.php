<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', __('Quotation List')); ?>

    <?php $__env->startSection('scroll', ''); ?>

    <div class="list-header">
        <h3><?php echo e(__('Quotation List')); ?></h3>


    </div>

    <div class="list-alert">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="list-scroll">
        <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="list-card">
                <div class="list-detail">
                    
                    <p><strong>Cliente:</strong>
                        <?php echo e($quotation->customer->name ?? 'N/A'); ?></p>
                    <p><strong>CPF:</strong> <?php echo e($quotation->customer->cpf ?? 'N/A'); ?>

                    </p>
                    <p><strong>Telefone:</strong>
                        <?php echo e($quotation->customer->phone ?? 'N/A'); ?></p>
                    <p><strong>E-mail:</strong>
                        <?php echo e($quotation->customer->email ?? 'N/A'); ?></p>

                    
                    <p><strong>Placa:</strong> <?php echo e($quotation->vehicle_plate ?? 'N/A'); ?>

                    </p>
                    <p><strong>Marca:</strong> <?php echo e($quotation->vehicle_brand ?? 'N/A'); ?>

                    </p>
                    <p><strong>Modelo:</strong> <?php echo e($quotation->vehicle_model ?? 'N/A'); ?>

                    </p>
                    <p><strong>Ano:</strong> <?php echo e($quotation->manufacture_year ?? 'N/A'); ?>

                    </p>

                    <!-- <p><strong>Valor:</strong> R$
                        <?php echo e(number_format($quotation->value ?? 0, 2, ',', '.')); ?>

                    </p> -->

                    <div class="list-actions">
                        <a href="<?php echo e(route('quotation.edit', $quotation->id)); ?>" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>&nbsp;Editar
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/dev/cotacao_app/resources/views/quotation/list.blade.php ENDPATH**/ ?>