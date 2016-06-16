#######################################################
## This project was structured on Laravel Framework. ##
#######################################################



# Needs composer installed


**!important!** Modify .env file to set your database informations (actually, the database name is configured as bookstore, db_user as root and no password.


--
To run it, please run the follow commands:
--


1. composer update

2. php artisan migrate

3. php artisan db:seed

3. php artisan route:clear

3. php artisan route:cache

--



To access it from a web server, htaccess must be configured to point to '/public' directory. Also, please check files  access permissions.

--


##################
## User access: ##
##################



login: uncle_bob

password: @initial1