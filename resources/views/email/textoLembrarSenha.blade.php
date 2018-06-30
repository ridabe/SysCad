@component('mail::message')
# Introduction



Olá {{$user['user']}}, fiquei sabendo que voce esqueceu seu email né....<br>
Não tem problema, nós criamos este aqui pra você <b>{{$user['senha']}}</b>.

Pode voltar a acessar seu painel, mas não esqueça de alterar ok?

@component('mail::button', ['url' => 'http://www.algoritmum.com.br'])
Button Text
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
