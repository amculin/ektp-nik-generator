<h1 align="center"><b>e-KTP NIK Generator</b></h1>
<p align="center">
  <img src="https://img.shields.io/packagist/dt/amculin/ektp-generator" alt="Packagist Download" />
  <img src="https://img.shields.io/github/stars/amculin/ektp-nik-generator" alt="GitHub Repo stars" />
  <img src="https://img.shields.io/packagist/v/amculin/ektp-generator" alt="Packagist Version" />
</p>

Generate a valid NIK randomly.
## Instalation
```bash
composer require amculin/ektp-generator
```
## How to use
```php
use amculin\ektp\generator\KTP;

$identity = new KTP();
echo "NIK: {$identity->getNIK()}";
```
Output:
```bash
NIK: 3404086801690002
```
You can also get the other informations based on the generated NIK
```php
echo "Province: {$identity->getProvince()->id} - {$identity->getProvince()->name}\n";
echo "City: {$identity->getCity()->id} - {$identity->getCity()->name}\n";
echo "District: {$identity->getDistrict()->id} - {$identity->getDistrict()->name}\n";

$birthDate = $identity->getBirthDate()->birthDate;
$date = $identity->getBirthDate()->date;
$month = $identity->getBirthDate()->month;
$year = $identity->getBirthDate()->year;
echo "Birth Date: {$birthDate} / {$date}-{$month}-{$year}\n";
```
Output:
```bash
Province: 34 - Daerah Istimewa Yogyakarta
City: 04 - Kab. Sleman
District: 08 - Berbah
Birth Date: 680169 / 28-01-1969
```
## Todo
- [x] OOP Enhancement
- [ ] add unit testing
- [ ] parameterized generator (by age, province, city, etc.)
- [ ] option get dataset from API
