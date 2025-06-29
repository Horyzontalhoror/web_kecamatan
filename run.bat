@echo off
echo =============================
echo  Menjalankan Laravel + Vite
echo =============================

echo.
echo Membuka Laravel dev server...
start cmd /k "php artisan serve"

echo Membuka Vite (npm run dev)...
start cmd /k "npm run dev"

echo.
echo ✅ Server dijalankan di dua jendela terpisah.
echo Jika ada error jalankan Setup Script terlebih dahulu.
pause
