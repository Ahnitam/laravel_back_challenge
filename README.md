# Projeto Laravel de Gerenciamento de Clientes com Cartão

Este projeto foi desenvolvido utilizando o framework Laravel e linguagem PHP para um desafio de um sistema de Gerenciamento de Clientes com Cartão.

## Descrição

O projeto consiste em uma API simples com CRUD de Clientes e Cartões.

## Instalação

1. Faça o clone deste repositório para a sua máquina local.
2. Instale o PHP e COMPOSER.
3. Execute `composer install` para instalar as dependências do Laravel.
4. Crie um arquivo `.env` com as configurações do banco de dados utilize o arquivo `.env.example` como base. Lembre-se de colocar as informações do banco de dados.
5. Execute `php artisan migrate` para criar as tabelas do banco de dados.
6. Execute `php artisan serve` para iniciar o servidor local.

## Endpoints

Aqui estão os endpoints do projeto:

1.  **GET /api/customers**: Retorna uma lista de clientes.

    -   Parâmetros:
        -   `page` (opcional): Número da página para paginação.
        -   `q` (opcional): Filtro de busca por nome

2.  **POST /api/customers**: Cria um novo cliente.

    -   Parâmetros:
        -   `name`: Nome do usuário.
        -   `last_name`: Sobrenome do usuário.
        -   `email`: Endereço de e-mail.
        -   `phone`: Número de telefone no formato (XX) X XXXX-XXXX.
        -   `birthday`: Data de nascimento no formato YYYY-MM-DD.
        -   `cep`: CEP no formato XXXXX-XXX.
        -   `street`: Nome da rua.
        -   `number`: Número da residência.
        -   `district`: Bairro.
        -   `city`: Cidade.
        -   `state`: Estado (sigla com 2 letras).

3.  **GET /api/customers/{customer_id}**: Retorna cliente.

4.  **PUT /api/customers/{customer_id}**: Atualiza cliente.

    -   Parâmetros:
        -   `name` (opcional): Nome do usuário.
        -   `last_name` (opcional): Sobrenome do usuário.
        -   `email` (opcional): Endereço de e-mail.
        -   `phone` (opcional): Número de telefone no formato (XX) X XXXX-XXXX.
        -   `birthday` (opcional): Data de nascimento no formato YYYY-MM-DD.
        -   `cep` (opcional): CEP no formato XXXXX-XXX.
        -   `street` (opcional): Nome da rua.
        -   `number` (opcional): Número da residência.
        -   `district` (opcional): Bairro.
        -   `city` (opcional): Cidade.
        -   `state` (opcional): Estado (sigla com 2 letras).

5.  **DELETE /api/customers/{customer_id}**: Exclui cliente.

6.  **GET /api/customers/{customer_id}/cards**: Retorna uma lista de cartões do cliente.

    -   Parâmetros:
        -   `page` (opcional): Número da página para paginação.
        -   `q` (opcional): Filtro de busca por nome

7.  **POST /api/customers/{customer_id}/cards**: Cria um novo cartão para o cliente.

    -   Parâmetros:
        -   `name`: Nome do cartão.
        -   `number`: Número do cartão.
        -   `expiration_date`: Data de expiração.
        -   `cvv`: CVV do cartão.

8.  **GET /api/customers/{customer_id}**: Retorna cliente.

9.  **PUT /api/customers/{customer_id}/cards/{card_id}**: Atualiza cliente.

    -   Parâmetros:
        -   `name` (opcional): Nome do cartão.
        -   `number` (opcional): Número do cartão.
        -   `expiration_date` (opcional): Data de expiração.
        -   `cvv` (opcional): CVV do cartão.

10. **DELETE /api/customers/{customer_id}/cards/{card_id}**: Exclui cartão do cliente.

## Licença

Este projeto está licenciado sob a MIT License.
