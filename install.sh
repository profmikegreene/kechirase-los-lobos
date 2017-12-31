echo "============Initializing tsugi============"

echo "============Getting tsugiproject/tsugi:master============"
git clone https://github.com/tsugiproject/tsugi.git tsugi/www

echo "============Copying config.php============"
cp tsugi/config.php tsugi/www/config.php

echo "============Removing git files from tsugi============"
rm -rf ./tsugi/www/.git

echo "============Initializing rating============"
echo "============Getting IMSGlobal/LTI-Sample-Tool-Provider-PHP:master============"
git clone https://github.com/IMSGlobal/LTI-Sample-Tool-Provider-PHP.git rating/www

echo "============Copying rating config============"
# cp tsugi/config.php tsugi/www

echo "============Removing git files from rating============"
rm -rf ./rating/www/.git



echo "============Building Docker Images============"
docker-compose build
