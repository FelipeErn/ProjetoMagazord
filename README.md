# MagazordTeste

Aplicação Web de Gerenciamento de Usuários e Contatos

Esta é uma aplicação web baseada em Symfony escrita em PHP que permite gerenciar usuários e seus contatos.

Requisitos
PHP 7.2 ou superior
Banco de dados da sua preferência
Extensões PHP necessárias: pdo_database, mbstring, xml, curl
Composer para gerenciamento de dependências
Instalação
Clone o repositório para o seu diretório de trabalho local.
Instale as dependências do projeto executando o comando composer install.
Configure as informações de acesso ao banco de dados no arquivo .env.
Execute o comando php bin/console doctrine:migrations:migrate para criar as tabelas no banco de dados.
Utilização
A aplicação define as seguintes Rotas/Url:

Home: /, exibe uma lista de todos os usuários cadastrados.
cadastroPessoa: /cadastro/pessoa, exibe um formulário para cadastrar uma nova pessoa.
alterarPessoa: /usuario/editar/{idpessoa}, exibe um formulário para editar um usuário existente.
excluirPessoa: /usuario/{idpessoa}/excluir, botão que ao clicar deleta um usuário existente.
Arquitetura
A aplicação segue o padrão arquitetural Model-View-Controller (MVC), onde o modelo representa os dados no banco de dados, os controladores gerenciam a lógica de negócios e geram respostas, e as visualizações (implementadas como modelos Twig) definem a estrutura HTML das páginas.