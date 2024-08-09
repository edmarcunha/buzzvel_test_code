# Holiday Management API

This is an API developed in Laravel for managing holidays. The API allows for user registration, authentication, and holiday management, including creating, reading, updating, and deleting holidays. Authentication is token-based, using Laravel Sanctum.

## Features
- User registration
- User authentication
- Holiday management (CRUD)
- PDF document generation with holiday details

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/edmarcunha/buzzvel_test_code.git
   ```

2. Install project dependencies:

   ```bash
   cd buzzvel_test_code
   composer install
   ```

3. Configure the .env file:

- Set up your database configurations in the .env file.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Run database migrations:

   ```bash
   php artisan migrate
   ```

5. Start the development server:

   ```bash
   php artisan serve
   ```

6. (Optional) Run the tests:

   ```bash
   php artisan test
   ```


## Authentication

The API uses Laravel Sanctum for token-based authentication. The basic flow includes user registration, login, and logout.

### User Registration

**Endpoint:** `POST /api/register`

**Parameters:**

- `name` (string, required)
- `email` (string, required)
- `password` (string, required)
- `password_confirmation` (string, required)

**Success Response:**

- **Status:** 200 OK

### Login

**Endpoint:** `POST /api/login`

**Parameters:**

- `email` (string, obrigatório)
- `password` (string, obrigatório)

**Success Response:**

- **Status:** 200 OK
- **Corpo:**
  ```json
  {
      "token": "API_TOKEN"
  }
  ```

### Logout

**Endpoint:** `POST /api/logout`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 Ok
- **Body:**
  ```json
  {
      "message": "Unautorized"
  }
  ```

### Obter Usuário Autenticado

**Endpoint:** `GET /api/user`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 OK
- **Body:**
  ```json
  {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      ...
  }
  ```

## Holiday Management

### List Holidays

**Endpoint:** `GET /api/holidays`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 OK
- **Body:**
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

### Create Holiday

**Endpoint:** `POST /api/holidays`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Parameters:**

- `title` (string, required)
- `description` (string, required)
- `date` (string, required, format `YYYY-MM-DD`)
- `location` (string, required)
- `participants` (array, optional)

**Success Response:**

- **Status:** 200 OK
- **Body:**
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

### Show Holiday

**Endpoint:** `GET /api/holidays/{id}`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 OK
- **Body:**
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

### Update Holiday

**Endpoint:** `PUT /api/holidays/{id}`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Parameters:**

- `title` (string, obrigatório)
- `description` (string, opcional)
- `date` (string, obrigatório, formato `YYYY-MM-DD`)
- `location` (string, opcional)
- `participants` (array, opcional)

**Success Response:**

- **Status:** 200 OK
- **Body:**
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

### Delete Holiday

**Endpoint:** `DELETE /api/holidays/{id}`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 OK
- **Body:**
  ```json
  {
      "message": "Holiday deleted successfully."
  }
  ```

### Generate Holiday PDF

**Endpoint:** `GET /api/holidays/{id}/pdf`

**Headers:**

- `Authorization: Bearer API_TOKEN`

**Success Response:**

- **Status:** 200 OK

### 5. **Considerações Finais**

## Final Considerations

This API was built using Laravel and follows best development practices, including secure authentication with Laravel Sanctum and proper error handling. It was delivered for a technical test for Buzzvel and developed by Edmar Cunha de Freitas.