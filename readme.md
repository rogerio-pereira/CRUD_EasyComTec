# Easy Communication & Technology
## Hiring CRUD
**Candidate** Rogerio Eduardo Pereira  
**Date** 8th November 2018  

Laravel  
Bootstrap  
Dusk  
PhpUnit  

### Screenshots
Todos os screenshots estão na pasta prints

### Instalação
Clone o Repositório
```
git clone git@github.com:rogerio-pereira/CRUD_EasyComTec.git
```

Acesse o diretorio
```
cd CRUD_EasyComTec
```

Crie uma cópia do arquivo de configurações
```
cp .env.example .env
```

Configure o Banco de dados  
Crie o banco de dados
```
touch database/database.sqlite
```
Altere o arquivo .env
**OBS:** Como o sistema envia emails confirmando as entrevistas configure a parte de SMTP, pode ser com os dados de uma conta no mailtrap ou um email verdadeiro. Se deixar os valores padrão, tres testes de navegação irão falhar
```
APP_URL=http://localhost:8000
...
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=homestead
#DB_USERNAME=homestead
#DB_PASSWORD=secret
...
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=5ef4b8da87ae97
MAIL_PASSWORD=64b345c5b38c6e
MAIL_ENCRYPTION=null
```

Instale as dependencias
```
php composer.phar update
```

Crie a chave de encriptação
```
php artisan key:generate
```

Configure o cache
```
php artisan config:cache
```

Atualize as tabelas do banco de dados e insira os dados iniciais
```
php artisan migrate --seed
```

Rode os testes de unidade
```
vendor/bin/phpunit
```

Inicie o servidor
```
php artisan serve
```

Rode os testes de navegação usando o Dusk  
**IMPORTANTE:** Para rodar os testes com o dusk, o servidor precisa estar rodando
```
php artisan dusk
```

[Acesse o sistema (http://127.0.0.1:8000)](http://127.0.0.1:8000)

Usuario e senha do sistema  
**Usuário**: easy@easy.com  
**Senha**: easy
