echo -e "************  composer dump-autoload  ************"
composer dump-autoload
echo -e "**************************************************"
echo -e "***************  composer install  ***************"
composer install
echo -e "**************************************************"
echo -e "***********  php artisan cache:clear  ***********"
php artisan cache:clear
echo -e "**************************************************"
echo -e "**********  php artisan key:generate **************"
php artisan key:generate --force
eco -e "****************************************************"
echo -e "********    php artisan clear-compiled    ********"
php artisan clear-compiled
echo -e "***************************************************"
echo -e "**********  php artisan migrate --seed  ***********"
php artisan migrate --seed --force
echo -e "******** *******************************************"
echo -e "********  php artisan serve --host=0.0.0.0  ********"
 php artisan serve --host=0.0.0.0
