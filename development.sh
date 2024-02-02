#megvalósítás - nulladik fázis - a környezet létrehozása

aliases
cdwww
composer create-project --prefer-dist laravel/laravel laravel-xml-2-persons
cd laravel-xml-2-persons

php -v
#PHP 8.2.0 (cli) (built: Dec  6 2022 15:31:23) (ZTS Visual C++ 2019 x64)

php artisan -V
#Laravel Framework 10.43.0

mysql -V
#version 	8.0.31

mysql -u root -p
create database laravel_xml_2_persons;
ctrl-c 

#(setting up .env database connection variables)

#creating empty repository on Github

#creating delopment.sh (this file) copied from command line

#creating initial README.md

git init
git add .
git status
git commit -m "initial commit - phase 0"
git branch -M main
git remote add origin https://github.com/gerzsony/laravel-xml-2-persons.git
git push -u origin main


# megvalósítás 1. fázis - xml létrehotása és berakása a Repo -ba

touch "persons.xml"
#edit it