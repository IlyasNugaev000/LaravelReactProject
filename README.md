# LaravelReactProject
Краткая инструкция по развертыванию:
1) Перейти в папку backend и скопировать .env.example в .env
2) Вернуться назад в корневую папку и выполнить ```docker-compose up -d --build```(Если порты заняты, то можно поменять в файле .env в корневой директории)
3) Зайти в контейнер php используя комманду ```docker-compose exec php bash```
4) Выполнить ```composer install```
5) Выполнить ```php artisan migrate```
6) Выполнить ```php artisan db:seed```
7) Перейти по адресу http://localhost:3000/mainForm
