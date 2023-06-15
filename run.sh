#!/bin/sh
'/opt/alt/php74/usr/bin/php' 'artisan' schedule:run > '/dev/null' 2>&1
