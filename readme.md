cd /opt/bitnami/apache2/htdocs

rm -rf *

git clone https://github.com/mikegcoleman/todo-php .

sudo mkdir /opt/bitnami/apache2/configs

sudo mv /opt/bitnami/apache2/htdocs/config.php /opt/bitnami/apache2/configs/config.php




Export Environment Variables
ENDPOINT=
USERNAME=
PASSWORD=
DATABASE=

cat /opt/bitnami/apache2/configs/config.php | \
        sed "s/<endpoint>/$ENDPOINT/; \
        s/<username>/$USERNAME/; \
        s/<password>/$PASSWORD/; \
        s/<database>/$DATABASE/"