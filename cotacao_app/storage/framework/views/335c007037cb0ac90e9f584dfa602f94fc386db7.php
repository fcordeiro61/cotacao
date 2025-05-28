<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php $__env->startSection('title', __('User List')); ?>

<?php $__env->startSection('scroll', ''); ?>



  <div class="list-header">
      <h3><?php echo e(__('User List')); ?></h3>


    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['onclick' => 'window.location=\''.e(route('user.create')).'\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'window.location=\''.e(route('user.create')).'\'']); ?>
<i class="fas fa-user-plus"></i>&nbsp;<?php echo e(__('New')); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<div class="list-alert">
<!-- Exibindo Mensagem de Sucesso -->
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<!-- Exibindo Mensagem de Erro -->
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<!-- Exibindo Erros de Validação -->
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





<div  class="list-scroll">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="list-card">
<div class="list-detail">
<?php if($user->active): ?>
<?php else: ?>
<div style="color: gray;">
  <?php endif; ?>
<h4><?php echo e($user->name); ?></h4>
          <p>Email: <?php echo e($user->email); ?></p>
          
          <p>Perfil: <span class="perfil <?php echo e(strtolower($user->role->name ?? 'cliente')); ?>"><?php echo e($user->role->name ?? 'Cliente'); ?></span></p>
          <div class="list-actions">
<?php if($user->active): ?>

          <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn-icon" title="Editar">
            <i class="fas fa-edit"></i>&nbsp;Editar
          </a>

<?php endif; ?>



          
         
          <?php if($user->active): ?>
          
            <form action="<?php echo e(route('user.deactivate', $user->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
                <button type="submit" class="btn-icon" title="<?php echo e($user->active ? 'Desativar' : 'Ativar'); ?>">
                <i class="fas fa-user-slash }}"></i>&nbsp;<?php echo e($user->active ? 'Desativar' : 'Ativar'); ?>

                </button>
            </form>
          <?php else: ?>
          <form action="<?php echo e(route('user.activate', $user->id)); ?>" method="POST" style="display:inline;">
          <?php echo csrf_field(); ?>
          <?php echo method_field('POST'); ?>
                <button type="submit" class="btn-icon" title="<?php echo e($user->active ? 'Desativar' : 'Ativar'); ?>">
                <i class="fas fa-user-check }}"></i>&nbsp;<?php echo e($user->active ? 'Desativar' : 'Ativar'); ?>

                </button>
            </form>
</div>
          <?php endif; ?>

        </div>
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

 <!--
  <div class="list-scroll">
           <div class="mb-4 p-4 border rounded">
                <h3>João da Silva</h3>
                <p>Email: joao@exemplo.com</p>
                <p>Perfil: <span class="perfil admin">Admin</span></p>
            </div>
            <div class="mb-4 p-4 border rounded">
                <h3>João da Silva</h3>
                <p>Email: joao@exemplo.com</p>
                <p>Perfil: <span class="perfil admin">Admin</span></p>
            </div>
</div>
-->

</div>

  <!--



 

  <div class="list-scroll">
  <div class="customer-card mb-4 p-4 border rounded">
                <h3>João da Silva</h3>
                <p>Email: joao@exemplo.com</p>
                <p>Perfil: <span class="perfil admin">Admin</span></p>
            </div>
</div>
-->

<!--
<div>
           <div class="customer-card mb-4 p-4 border rounded">
                <h3>João da Silva</h3>
                <p>Email: joao@exemplo.com</p>
                <p>Perfil: <span class="perfil admin">Admin</span></p>
            </div>
 </div>
-->
 


<!--
    <div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card">
        <h3><?php echo e($user->name); ?></h3>
        <p>Email: <?php echo e($user->email); ?></p>
        <p>Perfil: <span class="perfil <?php echo e(strtolower($user->role->name ?? 'cliente')); ?>"><?php echo e($user->role->name ?? 'Cliente'); ?></span></p>
        <div class="actions">
          <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn-icon" title="Editar">
            <i class="fas fa-edit"></i>
          </a>
          <form action="<?php echo e(route('user.delete', $user->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <button type="submit" class="btn-icon" title="<?php echo e($user->active ? 'Desativar' : 'Ativar'); ?>">
              <i class="fas fa-user-<?php echo e($user->active ? 'slash' : 'check'); ?>"></i>
            </button>
          </form>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
-->




 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /home/dev/cotacao_app/resources/views/user/list.blade.php ENDPATH**/ ?>