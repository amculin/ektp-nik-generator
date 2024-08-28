## e-KTP NIK Generator
Generate a valid NIK randomly.
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
You can also get the address
```php
echo "Province: {$identity->getProvince()->id} - {$identity->getProvince()->name}\n";
echo "City: {$identity->getCity()->id} - {$identity->getCity()->name}\n";
echo "District: {$identity->getDistrict()->id} - {$identity->getDistrict()->name}\n";
```
Output:
```bash
Province: 34 - Daerah Istimewa Yogyakarta
City: 04 - Kab. Sleman
District: 08 - Berbah
```
## Todo
- [ ] add unit testing
- [ ] parameterized generator (by age, province, city, etc.)
- [ ] option get dataset from API
