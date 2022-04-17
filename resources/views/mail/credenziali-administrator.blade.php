@component('mail::message')
#
<div style="color: #718096">
    <span style="color: #718096">Ciao </span><span style="color: black"> {{ $name }} <br></span><span style="color: #718096">Sei diventato un amministratore del nostro sito.
        Queste sono le tue credenziali. <br><br></span>
    username:   <span style="color: black"> {{ $username }} <br></span>
    password:   <span style="color: black">{{ $password }}</span><br><br>
    Per accedere all'area amministratori vai  <a href="{{ config('app.url') }}/admin">{{ config('app.url') }}/admin</a>
</div>

@component('mail::button', ['url' => route('admin.login')])
Accedi subito!
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
