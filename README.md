# kelilinginweb

Cara Pakai Web (di Localhost)
-----------------------------
1. Clone kedalam direktori htdocs
2. Install Composer => http://www.tentorweb.web.id/2015/03/tutorial-laravel-5-part-1-berkenalan.html
3. Selesai install composer, jalankan perintah "composer update" di dalam direktori webnya (htdocs/[nama-folder-web]/private) lewat command prompt.
4. Buka phpmyadmin, buat database baru, kasih nama "social_traveler".
5. Masih di direktori yg sama di no.3, jalankan perintah "php artisan migrate" (buat export tabel ke databasenya).
4. Coba akses localhost/[nama-folder-web]
5. Test Register, Login
Register => localhost/[nama-folder-web]/auth/register
Login => localhost/[nama-folder-web]/auth/login

-----------------------------
Kalau cuma mau liat databasenya, gak mau ribet pake install composer segala, buka => [nama-folder-web]/private/databse/migrations
Didalamnya berisi file2 tabel databasenya.

Sekian.

