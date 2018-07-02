# SysCad

Área para instruço~es das alterações

### Instruções do Git
GitHub

Para iniciar um projeto com git, voce podera ir ate a pasta onde esta o projeto e dar o comando iniciar git bach pelo menu do botao direito do mouse.
Apos aberto o bach voce podera dar o comando git init para iniciar o repositorio dentro desta pasta.

O comando git status servira para voce verificar o status dos arquivos no seu repositorio.

Quando voce quiser colocar um arquivo para ser comitado voce precisara antes adicionar este arquivo ara que o git entenda que ele controlara este arquivo. Para isso usaremos o comando add.
Ex: git add nomedoarquivo – para add um arquivo especifico, ou git add . - para adicionar todos os arquivos e pastas do projetos. Agora o arquivo escolhido estara pronto para ser comitado

Lembre que so poderemos efetuar um commit apos configurar um usuario local ou global.
Use o comando git config user.email 'seu email' e voce ira inserir um email de usuario local {Enter}
Use o comando git config user.name 'seu login' e voce ira inserir o seu login de usuario local {Enter}

Se ja estiver com usuario configurado podera fazer o commit atraves do comando:
git commit -m 'Mensagem sobre este commit' {Enter}

Note que estaremos usando ate o momento nosso git na Brench Master, mas isso nao e uma boa pratica...voce pode usar o comando git log para navegar e ver os ultimos commits feitos.
Nos precisamos traballhar em ciima de uma copia do projeto e nao no projeto master para isso precisamos realizar uma copia ou seja criar uma nova Brench.

Crie uma nova branch usando o comando git brench nomedabrench(ex: dev-01) {Enter}

Mas meu arquivo ainda nao faz parte desta nova brench, vejamos como colocar meu projeto que desejo alterar nesta brench.
Primeiro vamos sair da brench master e ir ate a brench que acabamos de criar e isto faremos atraves do comando git checkout nomedabrench(ex:dev-01){Enter} 

Obs: Tudo o que criarmos dentro da brench dev-01 so aparecera quado estivermos dentro desta brench, se mudarmos para outra brench por exemplo a brench master estas mudancas nao aparecerao.

Para unirmos o que foi feito na brench temporaria(dev-01) com a brench master nos faremos o seguinde procedimento.

1. Entre na brench master atraves do comando git checkout master. {Enter}
2. Vamos copiar as mudancas da brench temporaria para a brench master atarves do comando: git merge dev-01 {Enter}
Obs: Se eu nao for mais utilizar a brench temporaria dev-01 eu posso deletar a mesma atraves do comando: git brench -d dev-01{Enter}


Agora vamos configurar o git local para se comunicar com nossa conta no GitHub
Para isso usaremos o comando:
1. git config --global user.email 'seu email'
2. git config --global user.name 'seu nome de usuario'
3. ssh-keygen – Para criar uma chave de segurança.
4. Ir ate a pasta onde criou o arquivo ssh dentro do seu pc que fica na pasta usuario/ssh e pegue o arquivo id_rsa.pub, abra e copie a chave de segurança.
5. Vá ate sua conta no git e va ate menu/settings... do lado esquerdo no menu va ate a opção SSH and GPG Keys – clique aqui e insira a chave copiada no local new ssh key.

Feito isso vamos clonar nosso repositorio no github

1. Vá ate o seu repositorio no GitHub e selecione dentro dele o botao Clone or download – certifique que esta na opção de ssh e copie o endereço ssh que aparecera.
2. Abra o bach dentro da pasta onde ficara o porjeto local e use o comando: git clone enderosshcopiado. {Enter}

Agora tudo o que fizermos localmente podera ser enviado para nosso repositorio no GitHub, seguindo os comandos normais para verificar status, add e commit.

Vamos agora subir as alterações feitas no projeto para o GitHub usando o comando push:
git push – v origin(pra onde vc vai enviar) master(de onde vc esta enviando){Enter}

Ferramentas do gitHub
Quando eu quiser pegar um repositorio de outra pessoa, eu vou ate o repositorio que ela disponibilizou, posso marcar ela como favorito e tambem clicar em assistir este repositorio.
Para copiar o repositorio todo dela para a minha conta do github eu clico em FORK dentro do repositorio que eu quero copiar e isso fara o repositorio todo ser copiado para minha conta.

Apos ter o repositorio em minha conta eu posso clonar ele para minha maquina usando o comando clone, fazer todas as modificações necessarias, e fazer todo procedimento para subir as atualizações para o meu repositorio remoto, nao esquecendo de add, status, commit e por fim o push.

Quando eu ja tiver ele atualizado em meu repositorio no git eu vou dentro deste repositorio e dou um pull request para que o dono do repositorio original aceite as mudanças que eu fiz no repositorio original

1 - Realize um Fork do repositório da sua escolha para sua conta no GitHub.

2 - Clone seu novo repositório forkado para sua máquina via Git Bash 

Comandos importantes GIT:
(Adicionar referência ao repositório remoto principal do curso)
git remote add upstream “caminho repositório SSH”  (Criei um temporario para receber as mudancas do repositorio forkado)

(Verificar a lista de repositórios remotos)
- git remote –v
(Atualizar repositório local)
- git fetch upstream master (recebe as alteracoes vindas do reósitorio forkado)
- git merge uptream/master master ( Atualiza o seu repositorio local)
Ou
git pull uptream master (atualiza direto para a maquina local, sem atualizar no seu git remoto)
Se voce tem um porjeto e quer subir ele para um repositorio zerado no git use o comando:
git remote add origin ssh://usuario@servidor.com/~/git/examplo1.git
Isso associara seu projeto ao seu repositorio recem criado no git
Agora e so dar o comando push para subir seu projeto para o  novo repositorio


############## Config Email .env ########

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=agendacaminhodavida@gmail.com
MAIL_PASSWORD=mcv122448
MAIL_ENCRYPTION=tls

