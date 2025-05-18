# Clean PHP Refactoring Project

This project is written in pure PHP with the main purpose of **refactoring legacy code** and improving software architecture using PSR standards and modern PHP practices.

> 🔍 The original legacy code can be found in [`/other/badCode`](./other/badCode).

## 📦 Requirements

- PHP 8.1 or higher
- Composer

## 🚀 Getting Started

1. Clone the repository:
   ```bash
   git clone https://github.com/Arsen04/test-task-1.git
   cd test-task-1

2. Install dependencies:

   ```bash
   composer install
   ```

3. Start the local development server:

   ```bash
   php -S localhost:8888
   ```

Now you can access your application at [http://localhost:8888](http://localhost:8888)

## 🧱 Project Structure

```
.
├── other/badCode/        # Legacy code for refactoring
├── src/                  # PSR-4 autoloaded source code
├── composer.json         # Dependencies
├── index.php             # Entry point
└── ...
```

## 🛠 Dependencies

### Runtime:

* [`psr/http-message`](https://packagist.org/packages/psr/http-message) – PSR-7 HTTP message interfaces
* [`nyholm/psr7`](https://packagist.org/packages/nyholm/psr7) – PSR-7 implementation
* [`monolog/monolog`](https://packagist.org/packages/monolog/monolog) – Logging library

### Development:

* [`symfony/var-dumper`](https://packagist.org/packages/symfony/var-dumper) – Improved debugging tools

## 📌 Goals

* Refactor the legacy codebase into modular, testable components
* Adopt PSR-4 autoloading and modern PHP design patterns
* Implement architecture (e.g., controllers, repositories, DTOs, services)
* Add proper logging and error handling

---

