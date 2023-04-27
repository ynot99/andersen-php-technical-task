# Andersen php technical task

Generates a form for adding things, and showing them immediately.

## Prerequisites

-   Docker
-   Docker Compose

## Installation

1. Clone the repository.

    ```bash
    git clone https://github.com/ynot99/andersen-php-technical-task.git
    ```

2. Create a copy of the environment variables file.

    ```bash
    cp .env.example .env
    ```

3. Set the required environment variables in the `.env` file.

    ```env
    DB_HOST=localhost
    ```

### Local

1. Install required packages with composer and generate app key.

    ```bash
    composer install
    php artisan key:generate
    ```

2. Install required packages with npm (app uses node v18.15.0 and npm v9.5.0).

    ```bash
    npm install
    npm run build
    ```

3. Build and run the Docker db and phpmyadmin (if phpmyadmin needed) containers.

    ```bash
    docker-compose up db phpmyadmin -d --build
    ```

4. Migrate and serve.

    ```bash
    composer run migrate
    composer run serve
    ```

5. Access the application in your web browser.

    ```plain
    http://localhost:8000
    ```

### Docker

1. Build and run the Docker containers.

    ```bash
    docker-compose up -d --build
    ```
    
2. Migrate.

    ```bash
    docker-compose exec app composer run migrate
    ```

3. Access the application in your web browser.

    ```plain
    http://localhost:8001
    ```

## Running Tests

1. Build and run the Docker testing containers.

    ```bash
    docker-compose -f docker-compose.test.yml up -d --build
    ```

2. Run tests (you need to install all required packages locally).

    ```bash
    composer run test
    ```
