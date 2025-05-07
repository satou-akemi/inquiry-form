お問い合わせフォーム

環境構築
.Docker ビルド
1.git リンク
git@github.com:pika1412/inquiry-form.git

2.docker-compose up -d -build
\*MySQL は QS によって起動しない場合があるのでそれぞれの PC に合わせて docker-compose.yml を編集してください。

Laravel 環境構築
1.docker-compose exec php bash
2.composer install
3.cp.env.example .env
4.artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・PHP 8.3.6
・Laravel 8.83.29
・MySQL 15.1

URL
・開発環境 http://localhost/8082
・phpAdmin http://localhost/8081
