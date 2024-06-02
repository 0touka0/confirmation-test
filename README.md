# お問い合わせフォーム

## 環境構築
Dockerビルド

 1.`git clone git@github.com:0touka0/confirmation-test.git`<br>
 2.docker-compose up -d --build

＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて、docker-compose.ymlファイルを編集してください。

Laravel環境構築

1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)
- PHP 7.4.9
- Laravel 8
- MySQL 8.0.26

## ER図
![test-ER](https://github.com/0touka0/confirmation-test/assets/163740181/7ce5302b-8e30-44d5-9d1f-c04ae50ce082)



## URL
- 開発環境：http://localhost/
- 開発環境：http://localhost/confirm
- 開発環境：http://localhost/thanks
- 開発環境：http://localhost/register
- 開発環境：http://localhost/login
- 開発環境：http://localhost/admin
- phpMyAdmin : http://localhost:8080/
