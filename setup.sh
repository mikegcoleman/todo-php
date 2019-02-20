#!/bin/bash 

cd /opt/bitnami/apache2/htdocs

echo "removing old website"

rm -rf *

echo "cloning github repo"
git clone -b loft https://github.com/mikegcoleman/todo-php .

echo "setting ownership on settings file"
chown bitnami:daemon connectvalues.php
chmod 666 connectvalues.php

echo "adding db password to settings file"
sed -i.bak "s/<password>/$(cat /home/bitnami/bitnami_application_password)/;" /opt/bitnami/apache2/htdocs/connectvalues.php

echo "waiting for packages to finish installing"
sleep 90

echo "creating tasks database"
cat /home/bitnami/htdocs/data/init.sql | /opt/bitnami/mysql/bin/mysql -u root -p$(cat /home/bitnami/bitnami_application_password)

echo "finis"