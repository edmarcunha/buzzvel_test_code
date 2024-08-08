# Holiday Management API

Esta é uma API desenvolvida em Laravel para gerenciar feriados. A API permite o registro, autenticação de usuários e a gestão de feriados, incluindo criação, leitura, atualização e exclusão de feriados. A autenticação é baseada em tokens utilizando Laravel Sanctum.

## Funcionalidades
- Registro de usuários
- Autenticação de usuários
- Gerenciamento de feriados (CRUD)
- Geração de documentos PDF com os detalhes dos feriados

### 2. **Instalação**

## Instalação

1. Clone o repositório:

   ```
   git clone https://github.com/seu-usuario/buzzvel.git
   ```

2. Instale as dependências do projeto:

   ```bash
   cd buzzvel
   composer install
   ```

3. Configure o arquivo `.env`:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Execute as migrações do banco de dados:

   ```bash
   php artisan migrate
   ```

5. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

6. (Opcional) Rode os testes:

   ```bash
   php artisan test
   ```
```

### 3. **Autenticação**
```markdown
## Autenticação

A API utiliza Laravel Sanctum para autenticação via token. O fluxo básico inclui o registro de usuários, login, e logout.

### Registro de Usuário

**Endpoint:** `POST /api/register`

**Parâmetros:**

- `name` (string, obrigatório)
- `email` (string, obrigatório)
- `password` (string, obrigatório)
- `password_confirmation` (string, obrigatório)

**Resposta de Sucesso:**

- **Status:** 201 Created
- **Corpo:**
  ```json
  {
      "token": "API_TOKEN"
  }
  ```

### Login

**Endpoint:** `POST /api/login`

**Parâmetros:**

- `email` (string, obrigatório)
- `password` (string, obrigatório)

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "token": "API_TOKEN"
  }
  ```

### Logout

**Endpoint:** `POST /api/logout`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 204 No Content
- **Corpo:**
  ```json
  {
      "message": "Logged out successfully."
  }
  ```

### Obter Usuário Autenticado

**Endpoint:** `GET /api/user`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      ...
  }
  ```
```

### 4. **Gerenciamento de Feriados**
```markdown
## Gerenciamento de Feriados

### Listar Feriados

**Endpoint:** `GET /api/holidays`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  [
      {
          "id": 1,
          "title": "New Year",
          "description": "Celebration of the new year",
          "date": "2024-01-01",
          "location": "Worldwide",
          "participants": ["John Doe", "Jane Doe"]
      },
      ...
  ]
  ```

### Criar Feriado

**Endpoint:** `POST /api/holidays`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Parâmetros:**

- `title` (string, obrigatório)
- `description` (string, opcional)
- `date` (string, obrigatório, formato `YYYY-MM-DD`)
- `location` (string, opcional)
- `participants` (array, opcional)

**Resposta de Sucesso:**

- **Status:** 201 Created
- **Corpo:**
  ```json
  {
      "id": 1,
      "title": "New Year",
      "description": "Celebration of the new year",
      "date": "2024-01-01",
      "location": "Worldwide",
      "participants": ["John Doe", "Jane Doe"]
  }
  ```

### Exibir Feriado

**Endpoint:** `GET /api/holidays/{id}`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "id": 1,
      "title": "New Year",
      "description": "Celebration of the new year",
      "date": "2024-01-01",
      "location": "Worldwide",
      "participants": ["John Doe", "Jane Doe"]
  }
  ```

### Atualizar Feriado

**Endpoint:** `PUT /api/holidays/{id}`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Parâmetros:**

- `title` (string, obrigatório)
- `description` (string, opcional)
- `date` (string, obrigatório, formato `YYYY-MM-DD`)
- `location` (string, opcional)
- `participants` (array, opcional)

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "id": 1,
      "title": "Updated Title",
      "description": "Updated Description",
      "date": "2024-01-02",
      "location": "Updated Location",
      "participants": ["John Doe", "Jane Doe"]
  }
  ```

### Deletar Feriado

**Endpoint:** `DELETE /api/holidays/{id}`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "message": "Holiday deleted successfully."
  }
  ```

### Gerar PDF de Feriado

**Endpoint:** `GET /api/holidays/{id}/generate`

**Cabeçalhos:**

- `Authorization: Bearer API_TOKEN`

**Resposta de Sucesso:**

- **Status:** 200 OK
- **Corpo:** O arquivo PDF será baixado.
```

### 5. **Considerações Finais**
```markdown
## Considerações Finais

Esta API foi construída utilizando Laravel e segue as melhores práticas de desenvolvimento, incluindo autenticação segura com Laravel Sanctum e tratamento de erros adequado.
