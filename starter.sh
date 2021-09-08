#!/bin/bash
#Change database name
echo "Changing database name to $1"
sed -i "s/DB_DATABASE=laravel/DB_DATABASE=$1/g" .env
echo "Creating database..."
sudo mysql -uroot -p -e "CREATE DATABASE $1" 
