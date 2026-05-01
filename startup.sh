#!/bin/bash

# Use Laravel's built-in server instead of nginx to avoid port conflicts
cd /home/site/wwwroot
php artisan serve --host=0.0.0.0 --port=8080
