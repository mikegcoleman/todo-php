### Simple LAMP stack To Do List
This application is designed to be part of various Amazon Lightsail workshops. This respository includes the PHP front end which needs to be paired with a MySQL 5.7 database. 

The parameters for the database connectivity (hostname, username, password) are stores in a file called *config.php*. This file must be located in the *configs* directory one level above your HTML document root directory. Additionally make sure the permissions on the *configs* directory are set correctly (e.g. set the owner to be the account that your web server runs under).

If you are using a Lightsail LAMP instance, the following instructions will take care of everything you need. 

* These instructions assume you deleted any existing files under /opt/bitnami/apache2/htdocs and cloned this repo there e.g.

        cd /opt/bitnami/apache2/htdocs && \
        rm -rf && \
        git clone https://github.com/mikegcoleman/todo-php .

* Create the *configs* directory and make the bitnami user the owner. 

        sudo mkdir /opt/bitnami/apache2/configs && \
        sudo chown bitnami:bitnami /opt/bitnami/apache2/configs

* Move the config file into the configuaration directory

        sudo mv /opt/bitnami/apache2/htdocs/config.php /opt/bitnami/apache2/configs/config.php

You can then edit the *config.php* file to reflect the appropriate username, password, and hostname


