@component('mail::message')
# Conta gerada com Sucesso



Olá {{$user['user']}}, Seja muito bem-vindo....<br>
Seu usuário para login é <b> {{$user['email']}} </b>.
Sua senha provisória para logar é <b>{{$user['senha']}}</b>.

Altere a senha assim que acessar o painel pela primeira vez ok?

@component('mail::button', ['url' => 'http://www.algoritmum.com.br'])
Button Text
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent