server {
    listen 80;
    server_name 192.168.1.10;

    root /var/www/New_Project;
    index index.php index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;   # Or php8.2-fpm.sock if using PHP 8.2
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    error_log /var/log/nginx/new_project_error.log;
    access_log /var/log/nginx/new_project_access.log;
    }
