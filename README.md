## Instruções de Entrega

Para que o teste seja avaliado, o candidato deverá criar um projeto no GitHub com README.md, com o descritivo das ferramentas que foram utilizadas e sequência de passos para reproduzir e executar o projeto.

## Enunciado

O sistema dos correios de Gotham City tiveram um problema e perderam seu validador de CEPs.
Hoje, sua missão é criar um validador de CEPs baseados em algumas pequenas regras listadas abaixo:

- O CEP é um número maior que 100.000 e menor que 999.999
- O CEP não pode conter nenhum nenhum dígito repetitivo alternado em pares

• 121426 # Aqui, 1 é um dígito repetitivo alternado em par.
• 523563 # Aqui nenhum digito é alternado.
• 552523 # Aqui os números 2 e 5 são dígitos alternados repetitivos em par.

Damos preferência a soluções utilizando REGEX e string slicing.

Com a criação do validador de CEPs é necessário que apresente para os usuários de Gotham uma página web para primeiro adicionar
novos CEPs utilizando o validador e uma cidade e outra tela para listar todos os CEPs e cidades cadastradas.

## Requisitos

• Página Web contendo duas telas, uma para adicionar novos CEPs junto com a cidade e a outra tela contendo a listagem das telas cadastradas.
• Validador de CEPs.
• Backend com endpoints para alimentar

## Linguagens que deverão ser utilizadas no teste.

**Front-end:** React ou Angular;
**Backend:** utilizar php
**Diferencial:** realizar autenticação de usuário para adicionar novo CEP;

## Descritivo das Ferramentas

## Back-end

- PHP 7.4
- Composer
- Mysql

Para realizar do Back-end foi criado um arquivo "composer.json" onde foi criada as configurações, e foi executado o comando "composer install" para instalar pacote de dependências utilizadas no projeto, foi utilizado a arquitetura de arquivo MVC.

## Front-end

- React
- Next.js
- typescript

Para realizar Front-end foi criado utilizado o comando "npx create-next-app" e o nome do projeto, para iniciar o ambiente o comando "npm run serve". Para typescript foi
Criado arquivo "tsconfig.json", foi também modificado arquitetura de pasta do projeto para melhor organização.
