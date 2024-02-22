# Laravel Messenger

```bash
git clone  https://github.com/MaxEpam2015/laravel-messenger.git
```

## Tested on macOS v14.3.1 with apps:
#### Docker v4.17.0
#### Composer version 2.4.4 (path `/usr/local/bin/composer`)
#### developer tools
#### php v8.2.8
#### git v2.39.3

# Building project command:

```bash
make i
```

# Other available commands

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
