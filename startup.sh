#!/bin/bash

set -e

# Kill any existing nginx/php-fpm processes to free ports
pkill -9 nginx 2>/dev/null || true
pkill -9 php-fpm 2>/dev/null || true
sleep 1

# Configure nginx to use port 8080 properly by checking what's free
cat > /etc/nginx/sites-enabled/default <<'EOF'
server {
    listen 8080;
    listen [::]:8080;

    root /home/site/wwwroot/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    location ~ /\.git {
        deny all;
        access_log off;
        log_not_found off;
    }
}
EOF

nginx -t
php-fpm -D
exec nginx -g 'daemon off;'
