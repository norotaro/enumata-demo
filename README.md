# Enumata Demo

<a href="https://phpsandbox.io/e/x/ultlf?layout=EditorPreview&defaultPath=%2F&theme=dark&showExplorer=no&openedFiles=#app/Models/OrderStatus.php"><img src="https://phpsandbox.io/img/brand/badge.png" height="20" alt="PHPSandbox Notebook"></a>

Demo application for [norotaro/enumata](https://github.com/norotaro/enumata)

## Live demo

You can see a live version of this repository in this [PHP Sandbox](https://phpsandbox.io/e/x/ultlf?layout=EditorPreview&defaultPath=%2F&theme=dark&showExplorer=no&openedFiles=#app/Models/OrderStatus.php).

## Installation

Clone this repository.

```bash
git clone https://github.com/norotaro/enumata-demo
cd enumata-demo
```

Install dependencies.

```bash
composer install;
npm install;
```

Setup `.env` file.

```bash
cp .env.example .env
```

Run migrations.

```bash
php artisan migrate
```