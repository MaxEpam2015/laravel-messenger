# Laravel Messenger

## Project installation instruction:

```bash
git clone  https://github.com/MaxEpam2015/laravel-messenger.git
```

### You should have preinstalled apps:
#### Docker (my version is 4.17.0). On Linux with docker-compose
#### Composer (my version  2.4.4 and path `/usr/local/bin/composer`)
#### php (my version v8.2.8)
#### git

### If you have macOS, then developer tools should be installed:

### Build project command on macOS:

```bash
make i
```

### If you have Linux distribution, also execute next command (after `make i`):

```bash
composer i 
```

# Available commands:

```text
Possible commands are:
  - make up          : docker-compose up -d
  - make down        : docker-compose down
  - make docker-build: docker-compose up --build -d
  - make script      : cp -v .env.example .env
                       cp -v .env.testing.example .env.testing
                       /usr/local/bin/composer i
                       php artisan key:generate
```

# Swagger path:
[schema.yaml](storage%2Fapp%2Fswagger%2Fschema.yaml)
