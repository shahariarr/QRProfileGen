# QR Code Management System

This project is a QR Code Management System built with Laravel. It allows users to generate, view, edit, and manage QR codes.

## Features

- User authentication
- Generate QR codes
- View QR code details
- Edit QR codes
- Dashboard for managing QR codes

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/qr-code-management.git
    cd qr-code-management
    ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Copy the example environment file and configure it:
    ```sh
    cp .env.example .env
    ```

4. Generate an application key:
    ```sh
    php artisan key:generate
    ```

5. Run database migrations:
    ```sh
    php artisan migrate
    ```

6. Start the development server:
    ```sh
    php artisan serve
    ```

## Usage

- Visit `http://localhost:8000` to access the application.
- Register or log in to your account.
- Use the dashboard to generate and manage your QR codes.

## Routes

- `GET /dashboard` - View the dashboard (requires authentication)
- `POST /generate-qr-code` - Generate a new QR code (requires authentication)
- `GET /qr-code-result/{id}` - View QR code details (requires authentication)
- `GET /qr-code-edit/{id}` - Edit QR code (requires authentication)
- `PUT /update-qr-code/{id}` - Update QR code (requires authentication)

## License

This project is open-source and available under the [MIT License](LICENSE).
