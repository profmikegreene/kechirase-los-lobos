echo "01============Getting tsugiproject/tsugi:master============"
git clone https://github.com/tsugiproject/tsugi.git tsugi/www

echo "02============Configuring tsugi============"
echo "copying tsugi/config.php to /tsugi/www"
echo "in $(pwd)"
cp tsugi/config.php tsugi/www
git clone https://github.com/tsugitools/ltitool.git tsugi/www/mod/ltitool
docker run --rm -v $(pwd)/deploy/tsugi/www:/app composer:latest install

echo "04============Getting IMSGlobal/LTI-Sample-Tool-Provider-PHP:master============"
git clone https://github.com/IMSGlobal/LTI-Sample-Tool-Provider-PHP.git rating/www

echo "05============Configuring rating============"
mv -v rating/www/src/* rating/www/
cp rating/config.php rating/www
docker run --rm -v $(pwd)/rating/www:/app composer:latest install

echo "06============Cleaning up rating============"
rm -rf ./rating/www/.git

echo "07============Building Docker Images============"
# if you're having trouble try using --no-cache
docker-compose build --no-cache
#docker-compose build

echo "08============Starting Docker Images============"
docker-compose up

