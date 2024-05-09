sudo mkdir -vp  /var/www/html
sudo mv -vt ../ /var/www/html
sudo apt update
sudo apt-get install ca-certificates apt-transport-https software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt install composer php8.3 libapache2-mod-php8.3 php8.3-mysql php8.3-imap php8.3-ldap php8.3-xml php8.3-curl php8.3-mbstring php8.3-zip mc
