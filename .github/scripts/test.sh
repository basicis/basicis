 #!/bin/bash
#wget https://getcomposer.org/composer-stable.phar &&
#sudo mv composer-stable.phar /bin/composer &&
echo ENV_TEST=ok > .env &&
composer test