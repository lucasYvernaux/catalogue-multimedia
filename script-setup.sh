echo -e "************  composer dump-autoload  ************"
composer dump-autoload
echo -e "***************************************************"
echo -e "***************  Composer install  ****************"
composer install
echo -e "***************************************************"
echo -e "**********  php artisan migrate --seed  ***********"
php artisan migrate --seed --force
echo -e "****************************************************"
echo -e "*************  yarn <=> npm install   **************"
yarn
echo -e "****************************************************"
echo -e "*******************  yarn build  *******************"
yarn build
echo -e "****************************************************"
echo -e "********  php artisan serve --host=0.0.0.0  ********"
php artisan serve --host=0.0.0.0
