<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Autorid: Hannes Malter ja Remus-Markus Luht

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

# Iluteeninduse broneerimis süsteem
on vaja luua juuksuri- ja kosmeetikasalongi broneerimissüsteem. Klientidel on võimalik valida välja protseduur, ning aeg ja teenindaja. Salongil on võimalik näha ja hallata broneeringuid.

## Ülesanne 1. XML
Luua XML fail vabalt valitud andmete edastamiseks, selle faili skeemifail ning XSL fail(id) erinevate transformatsioonide tarvis (soovitavalt vähemalt andmete HTML ja XML kujul kuvamiseks)
XML fail peab sisaldama broneering, klient, protseduur, teenindaja, aeg, võib lisada oma omadus. 
XML-il peab olema 2 või 3 loogilist dimensiooni.

```
<dim1>
  <dim2>
    <dim3>
    </dim3>
  </dim2>
</dim1>
```

Kuvada andmed HTML tabelina kasutades XSLT ja PHP failis erinevaid funktsioone (näiteks, otsida broneeringuid kliendi järgi). 
Välja mõelda vähemalt 3 funktsiooni.
 
## Ülesanne 2. Veebiteenus ja klientrakendus.
Teenus võimaldab kasutajal veebirakenduses sisse logida, kasutades e-posti ja parooli. 
Andmebaasis hoitakse broneeringuid (telefoni nr, nimi, kellaaeg, teenus, kas makstud), pakutavaid teenuseid ja kasutajate paroole/emaile (adminid). 
Veebiteenus võimaldab suhelda veebirakenduse ja andmebaasi vahel, tagastada ja muuta informatsiooni teenuste/broneeringute ja kasutajaandmete kohta. 
Rakenduse funktsionaalsus töötajana: 
*	on võimalik näha olemasolevaid broneeringuid.
*	on võimalik broneeringuid kustutada.
*	on võimalik lisada uusi teenuseid (koos hinna, kirjelduse ja kestvusega)

Rakenduse funktsionaalsus tavakasutajana (ilusalongi kliendina): 
*	on võimalik teha broneeringuid ja enda omi kuni 24h enne algust kustutada.
*	on võimalik näha vabasid aegu.
*	on võimalik näha pakutavaid teenuseid (hinda, kestvust, kirjeldust).
*	on võimalik saada 24h enne broneeringu algust meeldetuletus

## Ülesanne 3. Projekti dokumentatsioon.
Kasutajalood (PivotalTrackeris vms. keskkonnas) koos vastuvõtu tingimustega.
Lähtekood versioonihalduses, tähenduslikud koodikinnitused ja seotud kasutajalugudega.
Projekti loomise etapid koos vastavate kirjelduste ja piltidega.
Kasutajajuhend iga rolli jaoks.
