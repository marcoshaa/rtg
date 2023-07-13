#!/bin/bash
#mv /app /var/www/html
chmod -R 0777 /var/www/html/app/writable
/usr/sbin/apache2ctl -D FOREGROUND