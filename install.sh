echo "============Getting tsugiproject/tsugi:master============"
git clone https://github.com/tsugiproject/tsugi.git tsugi/www

echo "============Copying config.php============"
cp tsugi/config.php tsugi/www

echo "============Removing git files from tsugi============"
rm -rf ./tsugi/www/.git

echo "============Getting IMSGlobal/LTI-Sample-Tool-Provider-PHP:master============"
git clone https://github.com/IMSGlobal/LTI-Sample-Tool-Provider-PHP.git rating/www

echo "============Copying rating config============"
mv -v rating/www/src/* rating/www/
cp rating/config.php rating/www
echo "============Removing git files from rating============"
rm -rf ./rating/www/.git

echo "============Building Docker Images============"
docker-compose build --no-cache

echo "============Starting Docker Images============"
docker-compose up
