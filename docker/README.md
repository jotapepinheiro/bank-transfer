# DOCKER
> Voltar para [instruções do projeto][l-Doc-Projeto]

---
- PHP v8.1.0
- Mysql v8.0.17
- Nginx
- Redis
- Redis Web-UI

---

### Comandos disponíveis no Makefile
```shell script
# Executar comando make
 make
```
---

### Executar na raiz do projeto
```shell script
# Copiar arquivo de configuração
 cp .env.example .env 
```

### Gerar app secret

```shell script
# Gerar app secret
 php artisan key:generate
```

### Gerar jwt secret

```shell script
php artisan jwt:secret
```

### Iniciar containers, na raiz do projeto

```shell script
docker compose up -d
```

### Desligar containers, na raiz do projeto

```shell script
docker compose down
```

### Rebuild Container

```shell script
docker compose build nginx
```

### Rebuild Todos Container

```shell script
docker compose down && docker compose up -d --build
```

### Rebuild Sem Cache de um Container

```shell script
docker compose build --no-cache nginx
```

### Reload Nginx    

```shell script
docker exec -it nginx nginx -s reload
```

### Listar Containers

```shell script
docker ps -a
```

### Entrar em um Container

```shell script
docker compose exec nginx bash
```

### Redis Web-UI

> <http://redis:9987>

### Editar Hosts
> No Windows: C:\Windows\System32\drivers\etc\hosts

> No Linux/Mac: /etc/hosts

```text
127.0.0.1       banktransfer.local
127.0.0.1       redis
127.0.0.1       mysql
```

### Limpar Projeto Laravel

```shell script
# Entrar no container
docker compose exec php-fpm bash
```


```shell script
# Limpar projeto laravel
composer dump-autoload
php artisan clear-compiled
php artisan optimize
php artisan cache:clear
chmod -R 777 storage bootstrap/cache
```

### Alias de acesso facil via terminal

```shell script
# Iniciar/Parar Docker do Projeto
# - Alterar $HOME/Dev/www/testes/banktransfer para o caminho do projeto
alias up-banktransfer='cd $HOME/Dev/www/testes/banktransfer && docker-compose up -d'
alias down-banktransfer='cd $HOME/Dev/www/testes/banktransfer && docker-compose down'

# Executar limpeza do projeto laravel dentro do Docker
limpar-banktransfer() {
  echo -e "\033[1;32m Limpando Bank Transfer... \033[0m"
  docker exec -ti testpic-php sh -c "cd banktransfer \
  && composer dump-autoload \
  && php artisan clear-compiled \
  && php artisan cache:clear \
  && php artisan optimize \
  && chmod -R 777 storage bootstrap/cache"

  echo -e "\033[1;36m Limpo! \033[0m"
}
```

[l-Doc-Projeto]: ../README.md
