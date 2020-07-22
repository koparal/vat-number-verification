# VIES PROJECT
This project has been prepared for VAT Number verification. Made with Laravel.
## Installation

```bash
git clone https://github.com/koparal/vat-number-verification.git
```

## Added Queue Parameters to .env 

```bash
QUEUE_DRIVER=database
QUEUE_CONNECTION=database
```

## Migration 
```bash
php artisan migrate
```

## Run Queue
```bash
php artisan queue:work
```
