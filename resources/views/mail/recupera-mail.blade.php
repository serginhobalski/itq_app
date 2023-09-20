<x-mail::message>
# Olá!

Você está recebendo este e-mail porque fez uma solicitação para recuperação de senha da sua conta em  nossa plataforma.
Para alterar sua senha de acesso, clique no botão abaixo.

<x-mail::button :url="''">
Alterar Senha
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
