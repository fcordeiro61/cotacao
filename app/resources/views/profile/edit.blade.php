<x-app-layout>
@section('title', __('Profile'))    
@section('scroll', '')

<div class="list-header">
<h3>{{__('Perfil')}}</h3>
</div>

<div  class="list-scroll" >
    <div class="list-card">
        <div class="list-detail">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>
    <div class="list-card">
        <div class="list-detail">
            @include('profile.partials.update-password-form')
        </div>
    </div>
    <div class="list-card">    
        <div class="list-detail">
            @include('profile.partials.delete-user-form')
        </div>    
    </div>    
</div>

    </div>
    </div>
    </div>
</x-app-layout>
