FROM php:8.1-apache
# 將當前目錄的檔案複製到網頁伺服器目錄
COPY . /var/www/html/
# 啟用 Apache 重寫功能
RUN a2enmod rewrite
# 設定權限
RUN chown -R www-data:www-data /var/www/html
