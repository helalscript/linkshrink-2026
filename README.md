# Linkshrink-2026 - URL Shrink API

A clean, production-ready URL shortener built with Laravel 12.

## Features

- Shorten long URLs via POST /api/shorten
- 301 redirect with visit counting
- Rate limited
- JSON API with proper resources
- Feature tests

## Usage

POST /api/shorten

```json
{ "url": "https://www.linkedin.com/in/helal-uddin-soaib/" }

Response:
{
    "message": "Link shortened successfully.",
    "data": {
        "short_url": "http://linkshrink-2026.test/api/v1/links/xnYTvt",
        "original_url": "https://www.linkedin.com/in/helal-uddin-soaib",
        "visits": null,
        "created_at": "2026-01-01 17:57:24"
    }
}
```
## How to Run Locally

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM (for assets, optional)
- MySQL/SQLite/PostgreSQL (or any Laravel supported database)

### Postman Collection
https://documenter.getpostman.com/view/36190216/2sBXVcjsR1

### Installation Steps

1. Clone the repository
```bash
git clone https://github.com/yourusername/linkshrink-2026.git
cd linkshrink-2026

Install dependencies

Bashcomposer install
npm install && npm run dev  # optional, for any frontend assets

Copy environment file and configure

Bashcp .env.example .env
php artisan key:generate

Configure database in .env

env
DB_CONNECTION=mysql    # or sqlite, pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=linkshrink_2026
DB_USERNAME=root
DB_PASSWORD=

Run migrations

Bashphp artisan migrate

Start the development server

Bashphp artisan serve
The app will be available at http://localhost:8000 (or http://127.0.0.1:8000)
Testing the API
Shorten a URL:
Bashcurl -X POST http://localhost:8000/api/shorten \
  -H "Content-Type: application/json" \
  -d '{"url": "https://www.linkedin.com/in/helal-uddin-soaib/"}'
Visit the short link in browser (e.g. http://localhost:8000/api/v1/xnYTvt) to test redirect and visit count.


