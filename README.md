<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>LARAVEL</h1>
    <h2>KONFIGURASI</h2>
    <ul>
        <li>buka direktori project di terminal anda</li>
        <li>ketikan command : cp .env.example .env (copy paste file .env.example)</li>
        <li>buat database ( nama database = mamdani )</li>
    </ul>
    <p>Lalu ketikkan perintah berikut pada terminal :</p>
     <ul>
        <li>composer update</li>
        <li>php artisan optimize:clear</li>
        <li>php artisan key:generate (generate app key)</li>
        <li>php artisan migrate (migrasi database)</li>
        <li>php artisan db:seed</li>
        <li>php artisan storage:link ( agar file pdf masuk ke public ) </li>
     </ul>
</body>
</html>
