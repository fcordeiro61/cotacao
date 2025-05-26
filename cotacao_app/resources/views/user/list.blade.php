<x-app-layout>
@section('title', __('User List'))

@section('scroll', '')



  <div class="list-header">
      <h3>{{__('User List')}}</h3>


    <x-primary-button  onclick="window.location='{{ route('user.create') }}'">
<i class="fas fa-user-plus"></i>&nbsp;{{ __('New') }}
</x-primary-button>
</div>
<div class="list-alert">
<!-- Exibindo Mensagem de Sucesso -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Exibindo Mensagem de Erro -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Exibindo Erros de Validação -->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 
</div>





<div  class="list-scroll">
@foreach($users as $user)

<div class="list-card">
<div class="list-detail">
@if($user->active)
@else
<div style="color: gray;">
  @endif
<h4>{{ $user->name }}</h4>
          <p>Email: {{ $user->email }}</p>
          
          <p>Perfil: <span class="perfil {{ strtolower($user->role->name ?? 'cliente') }}">{{ $user->role->name ?? 'Cliente' }}</span></p>
          <div class="list-actions">
@if($user->active)

          <a href="{{ route('user.edit', $user->id) }}" class="btn-icon" title="Editar">
            <i class="fas fa-edit"></i>&nbsp;Editar
          </a>

@endif



          
         
          @if($user->active)
          
            <form action="{{ route('user.deactivate', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('POST')
                <button type="submit" class="btn-icon" title="{{ $user->active ? 'Desativar' : 'Ativar' }}">
                <i class="fas fa-user-slash }}"></i>&nbsp;{{ $user->active ? 'Desativar' : 'Ativar' }}
                </button>
            </form>
          @else
          <form action="{{ route('user.activate', $user->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('POST')
                <button type="submit" class="btn-icon" title="{{ $user->active ? 'Desativar' : 'Ativar' }}">
                <i class="fas fa-user-check }}"></i>&nbsp;{{ $user->active ? 'Desativar' : 'Ativar' }}
                </button>
            </form>
</div>
          @endif

        </div>
        </div>
        </div>
        @endforeach
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
    @foreach($users as $user)
      <div class="card">
        <h3>{{ $user->name }}</h3>
        <p>Email: {{ $user->email }}</p>
        <p>Perfil: <span class="perfil {{ strtolower($user->role->name ?? 'cliente') }}">{{ $user->role->name ?? 'Cliente' }}</span></p>
        <div class="actions">
          <a href="{{ route('user.edit', $user->id) }}" class="btn-icon" title="Editar">
            <i class="fas fa-edit"></i>
          </a>
          <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn-icon" title="{{ $user->active ? 'Desativar' : 'Ativar' }}">
              <i class="fas fa-user-{{ $user->active ? 'slash' : 'check' }}"></i>
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
-->




</x-app-layout>