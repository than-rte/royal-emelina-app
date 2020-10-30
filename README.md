## Royal Emelina Website with Event Reservation Pends

...just a final project that needed to be finished.

## Requirements

- PHP 
- Composer 
- Node

### Database

- Postgresql


## Install

1. Clone repository:

```shell
git clone https://github.com/than-rte/royal-emelina-app.git
```

2. Create config file (.env):

```shell
cp .env.example .env
```

3. Install dependencies:

```shell
composer install -vvv
```

```shell
npm install 
```

4. Compile JS code:

Development:

```shell
npm run dev
```

5. Generate key

```shell
php artisan key:generate
```
6. Run app

```shell
php artisan serve host=localhost --port=80
```
