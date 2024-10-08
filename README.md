## Feladat

használj php7.4-t vagy nagyobbat, laravel keretrendszert és mysql adatbázist.
Hozz létre egy git repót és megoldásonként commitolj.


- 1. Hozz létre egy xml-t. 
Az xml-ben a következő adatok szerepeljenek:
	ADOAZONOSITOJEL: 778899112
	TELJESNEV: Ügyvezető Mihály
	AZONOSITO: 1
	EGYEBID: 1
	BELEPES: 2015.09.08
	KILEPES: 2021.09.08
	EMAILCIM: ugyvezeto.mihaly@gmail.com
Az xml-ben legalább 5 különböző személy adatai legyenek feltüntetve.

- 2. Készíts egy adatbázist, amely tárolni fogja az xmlből feldolgozott adatokat 'persons', illetve logokat 'logs'. 

- 3. Laravel keretrendszer alatt készíts egy rövid alkalmazást, ahol az elkészített xml feltölthető egy formon keresztűl.
A formot ellenőrizd, hogy csakis xml dokumentumot lehessen feltölteni. ( A validálást megoldhatod frontend vagy backend oldalt )

- 4. A feldolgozás menetében figyelj, hogy az egyedi azonosítók egyediek is legyenek.

- 5. Minden egyes feldolgozott "person" adatról készíts log bejegyzést. Ezt tárold le az adatbázisban.

- 6. A feldolgozás végeztével a feldolgozás eredményét add át egy felületnek ami megjeleníti, hogy egy egy személy sikeresen, sikertelenül rögzítésre került e. 

- 7. Hozz létre egy egy felületet, ahol nyomonkövethető a már létrejött person és log adatok.


A feladat megoldására 1 hét áll rendelkezésre. 
Ha végeztél a feladattal kérlek küld vissza a kódot és a git repót számunkra.

## A készítés menete

A készítés konzolon történő menetét a development.sh tartalmazza, aminek az első verziója az első commit-ban már szerepelni fog. 

Lépések:
- 0. Lépés: friss laravel lehúzása, git repo létrehozása, üres adatbázis létrehozása és bekötése és a mysql kapcsolat létrehozása laravelben
Az első (initial commit) tervezett tartalma: üres laravel install összekötött üres adatbázissal, és induló README.md -vel
A PHP, MySql, Laravel verziószámának rögzítése ide. (részben a feladatkiírás 2-3 pontjai)


Környezeti verziószámok:

```
php -v
#PHP 8.2.0 (cli) (built: Dec  6 2022 15:31:23) (ZTS Visual C++ 2019 x64)

php artisan -V
#Laravel Framework 10.43.0

mysql -V
#version 	8.0.31
```

Helyi adatbáziskapcsolat paraméterei:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_xml_2_persons
DB_USERNAME=root
DB_PASSWORD=
```

- 1. Lépés: adatokat tartalmazó xml létrehozása és hozzáadása a projekthez (Feladatkiirás 1.pontja)

- 2. Lépés - Adatmodell létrehozása Laravelben. Merge-lés az adatbázissal. Egyedi azonosítókra való figyelés az adatmodellben. (feladatkiirás 2,4-es pontja)
lényegtelen (elődefiniált) adattáblák létrehozásának megakadályozása

- 3. Lépés - XML feltöltő felület, XML feldolgozó controller létrehozása, feldolgozás eredményének elsőkörös megjelenítése, xml validálás, log bejegyzések létrehozása Feladatkiírás (3-6) pontjai

- 4. Lépés - Logs és Persons táblák megjelenítő felületei (feladatkiírás 7-es pontja)

## Telepítés saját gépre

- git repo lehúzása a gépre / vagy a linken a .zip fájl lehúzása

- adatbázis létrehozása egy mysql szerveren (konzolból vagy segítség itt: laravel_xml_2_persons.sql )

- .env állományban beállítani az (üres) adatbázis kapcsolati adatait

- állományok frissítése

- rendszer elindítása

```
git clone https://github.com/gerzsony/laravel-xml2persons.git

mysql -u root -p
create database laravel_xml_2_persons;
ctrl-c 

#setting up .env file (database section) Example is here: 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xml2persons
DB_USERNAME=root
DB_PASSWORD=


#filling database
php artisan migrate

#start application with sail
php artisan serve

#check localhost:8000
```

