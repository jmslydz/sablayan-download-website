@echo off
setlocal
title Sablayan Download Page Preview
cd /d "%~dp0"
set "CI_BASE_URL="
set "PHP_BIN=php"
where php >nul 2>&1
if errorlevel 1 (
    if exist "C:\xampp\php\php.exe" (
        set "PHP_BIN=C:\xampp\php\php.exe"
    ) else (
        echo PHP was not found. Install XAMPP or add PHP to your PATH.
        pause
        exit /b 1
    )
)
echo Sablayan preview: http://127.0.0.1:8095/
echo Project folder: %CD%
echo Keep this window open while using the page. Press Ctrl+C to stop.
echo If this port is already in use, check which project owns it before opening the link.
"%PHP_BIN%" -S 127.0.0.1:8095 -t "%CD%" "%CD%\dev-router.php"
pause
