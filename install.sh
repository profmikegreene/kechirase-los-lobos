echo "============Getting tsugiproject/tsugi:master============"
git clone https://github.com/tsugiproject/tsugi.git tsugi/www

echo "============Configuring tsugi============"
echo "copying tsugi/config.php to /tsugi/www"
echo "in $(pwd)"
cp tsugi/config.php tsugi/www

echo "============Getting tsugitools/ltitool:master============"
git clone https://github.com/tsugitools/ltitool.git tsugi/www/mod/ltitool

# Had to remove for tsugi/vendor/tsugi/lib/src/Util/GitRepo.php
# to work when /store is called
# echo "============Cleaning up tsugi============"
# rm -rf ./tsugi/www/.git

echo "============Getting IMSGlobal/LTI-Sample-Tool-Provider-PHP:master============"
git clone https://github.com/IMSGlobal/LTI-Sample-Tool-Provider-PHP.git rating/www

echo "============Configuring rating============"
mv -v rating/www/src/* rating/www/
cp rating/config.php rating/www
docker run --rm -v $(pwd)/rating/www:/app composer:latest install

echo "============Cleaning up rating============"
rm -rf ./rating/www/.git

echo "============Building Docker Images============"
docker-compose build --no-cache

echo "============Starting Docker Images============"
docker-compose up

