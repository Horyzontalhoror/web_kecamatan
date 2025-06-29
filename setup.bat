@echo off
echo ================================
echo  Laravel Setup Automation Script
echo ================================

echo.
echo [1/6] Mengecek dan menyalin .env jika belum ada...
IF EXIST .env (
    echo File .env sudah ada.
) ELSE (
    echo Menyalin .env.example ke .env...
    copy .env.example .env
    IF %ERRORLEVEL% NEQ 0 (
        echo Gagal menyalin .env. Pastikan file .env.example tersedia.
        pause
        exit /b
    )
)

echo.
echo [2/6] Menjalankan Composer Install...
composer install
IF %ERRORLEVEL% NEQ 0 (
    echo Composer install gagal. Pastikan composer sudah terpasang dan berada di PATH.
    pause
    exit /b
)

echo.
echo [3/6] Menjalankan npm install...
npm install
IF %ERRORLEVEL% NEQ 0 (
    echo NPM install gagal. Pastikan Node.js sudah terpasang.
    pause
    exit /b
)

echo.
echo [4/6] Generate APP_KEY...
php artisan key:generate
IF %ERRORLEVEL% NEQ 0 (
    echo Gagal generate APP_KEY.
    pause
    exit /b
)

echo.
echo [5/6] Menjalankan migrate database...
php artisan migrate
IF %ERRORLEVEL% NEQ 0 (
    echo Migrasi database gagal. Periksa konfigurasi database di .env
    pause
    exit /b
)

echo.
echo [6/6] Membersihkan konfigurasi cache Laravel...
php artisan config:clear
IF %ERRORLEVEL% NEQ 0 (
    echo Gagal membersihkan config cache.
    pause
    exit /b
)

echo.
echo ✅ Semua 6 perintah berhasil dijalankan!
echo Siap menjalankan Laravel + Vite.
pause
