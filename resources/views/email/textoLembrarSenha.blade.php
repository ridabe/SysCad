@component('mail::message')
# Introduction



Olá {{$user['user']}},fiquei sabendo que voce esqueceu seu email né....<br>
Nao tem problema, nos criamos este aqui pra voce {{$user['senha']}}.

Pode voltar a acessar seu paunel, mas nao esqueça de alterar ok?

@component('mail::button', ['url' => 'http://www.algoritmum.com.br'])
Button Text
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
