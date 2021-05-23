Validar Cuentas Bancarias con PHP (Venezuela)
=============================================


⚠️ **PLEASE USE https://github.com/reyesoft/php-bank-accounts** ⚠️



Esta es una libería PHP para validar los números de cuentas bancarias de Venezuela.

-----------

## Instalación

### Composer

#### Instalar Composer

```bash
curl -sS https://getcomposer.org/installer | php
```

#### Agregar Validator via Composer

Agrega a tu archivo composer.json:

```javascript
{
    ...
    "require": {
        ...
        "pablorsk/bank-account-validator-venezuela": "dev-master"
    }
    ...
}
```

## Ejemplo

```php
	if (BankAccountVe::isValid('111111111'))
		echo 'CBU correcto';
	else
		echo 'CBU incorrecto';

	// print "MERCANTIL"
	echo BankAccountVe::getBankName('01050194697100000000');
```

## License

The MIT License (MIT)

Copyright (c) 2014 Pablo Gabriel Reyes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
