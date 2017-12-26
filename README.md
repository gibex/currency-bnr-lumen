# API pentru cursul valutar BNR (Laravel Lumen)
Raspunsul dat API in format JSON

## Instalare
```
git clone https://github.com/gibex/currency-bnr-lumen
cd currency-brn-lumen
php artisan migrate
php artisan rates:history export_2015.xml (incarca in baza de date cursul din anul 2015)
```

Pentru cursul zilnic adaugati in crontab linia
```
* * * * * php /PATH_TO/public_html/artisan schedule:run >> /dev/null 2>&1
```

## Utilizare
http://currency.joover.com/rate/USD - ultimul curs USD

http://currency.joover.com/rate/USD/10-01-2017 - cursul USD din 10/01/2017


## Cursul istoric

Cursul pe ani poate fi obtinut de pe [site-ul BNR](http://www.bnr.ro/Raport-statistic-606.aspx)

