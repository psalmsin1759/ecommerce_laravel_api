# E-commerce API - Test-Driven Laravel Application

This is a Test-Driven Laravel E-commerce API project that includes factories, seeders, test classes, API endpoints, models, migrations, and controllers. The project is designed to serve as a foundation for building e-commerce applications in Laravel while adhering to best practices.

## Features

-   **API Endpoints:** The project provides various API endpoints for common e-commerce features such as product management, user authentication, order processing, and more.
-   **Test-Driven Development (TDD):** This project follows the TDD methodology, ensuring that the codebase is thoroughly tested with PHPUnit.
-   **Factories and Seeders:** It includes factories and seeders to generate dummy data for testing and seeding the database.

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/psalmsin1759/ecommerce_laravel_api.git
    ```

2. **Install Composer Dependencies:**

    ```bash
    composer install
    ```

3. **Copy Environment File:**

    Create a copy of the `.env.example` file and name it `.env`. Update the database and other configurations in the `.env` file.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Database Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

The API should be accessible at `http://localhost:8000` (or another URL as specified).

## API Documentation

To understand how to use the API, refer to the detailed API documentation provided in [docs/API_DOCUMENTATION.md](docs/API_DOCUMENTATION.md). The documentation includes information on available endpoints, request and response formats, and examples.

## Running Tests

This project is built using Test-Driven Development, so running tests is essential. To execute the tests, run:

```bash
php artisan test
```

## Contributing

If you'd like to contribute to this project, please follow these steps:

# Fork the repository.

-   Create a new branch for your feature or bug fix: git checkout -b feature/your-feature.
-   Commit your changes and push your branch to your fork: git push origin feature/your-feature.
-   Create a pull request on the main repository.

## License

This project is open-source and available under the MIT License.

## Author

Samson Ude

## Acknowledgments

-   Laravel Framework
-   PHPUnit

## Contact

-   If you have any questions or need further assistance, please feel free to contact us.
