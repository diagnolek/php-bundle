Php Bundle
=================

Projekt testowy z przykładowymi rozwiązaniami

Uruchamianie środowiska
---------------

- docker-compose up -d
- docker exec -ti appmail-web bash -c "composer install"
- docker exec -ti appmail-web bash -c "chown -R www-data:www-data /var/www/html/var"

`Aplikacja widoczna pod adresem http://localhost:8000/`

Wymagania
----------

* Git
* Docker
