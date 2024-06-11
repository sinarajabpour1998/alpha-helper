# Laravel Alpha Helper
[![GitHub issues](https://img.shields.io/github/issues/sinarajabpour1998/alpha-helper?style=flat-square)](https://github.com/sinarajabpour1998/alpha-helper/issues)
[![GitHub stars](https://img.shields.io/github/stars/sinarajabpour1998/alpha-helper?style=flat-square)](https://github.com/sinarajabpour1998/alpha-helper/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/sinarajabpour1998/alpha-helper?style=flat-square)](https://github.com/sinarajabpour1998/alpha-helper/network)
[![GitHub license](https://img.shields.io/github/license/sinarajabpour1998/alpha-helper?style=flat-square)](https://github.com/sinarajabpour1998/alpha-helper/blob/master/LICENSE)

### Quick links

* <a href="#installation">Installation</a>
  
* <a href="#publish-config-file">Publish Config file</a>
  
* <a href="#helper-functions-and-facades-that-exists-in-package">Helper functions and facades that exists in package</a>

* <a href="#helper-functions-usage">Helper Functions Usage</a>
  
* <a href="#validators-that-exists-in-package">Validators that exists in package</a>
  
* <a href="#validators-usage">Validators Usage</a>
  
* <a href="#categories-usage">Categories Usage</a>
  
* <a href="#requirements">Requirements</a>

### Installation

```

composer require sinarajabpour1998/alpha-helper

```

#### Publish Config file

```

php artisan vendor:publish --tag=alpha-helper

```

#### Helper functions and facades that exists in package

```
1. integerToken($length = 5) : Generate integer token or code

2. stringToken($length = 16, $characters = '2345679acdefghjkmnpqrstuvwxyz') : Generate string token or code

3. digitsToEastern($number) : Covert a Weatern number(English) or digits to Eastern number(Persian or Arabic)

4. easternToDigits($number) : Covert a Eastern number(Persion, Arabic) to Eastern number(English)

5. isActive($key, $activeClassName = 'active') : Check the route name(string) or route names(array) is avtive or no for css classes

6. prepareInteger(input: string or integer) : removes `,` from integer (can be used in request for prices)

7. prepareSlug(slug, title, model) : generate clean slug from title and checks slug unique in specific model

8. encryptString(string data) : encrypts data using Crypt and returns encrypted data

9. decryptString(string encryptedString) : decrypts data using Crypt and returns decrypted data

10. makeHash(string) : make hash using sha512 from string

11. getSettingsKey(string key) : get settings specific key, returns a value, you must have a settings model with key-value structure

12. isMobile(string) : check if string is a valid mobile number

..
```
#### Helper Functions Usage
```
## With Facade format:

AlphaHelper::integerToken(length: 10);
AlphaHelper::stringToken(length: 32, characters: '2345679acdefghjkmnpqrstuvwxyz');
AlphaHelper::digitsToEastern(number: 1375);
AlphaHelper::easternToDigits(number: ۱۳۷۵);
AlphaHelper::isActive(key: ['posts.index', 'posts.create', 'posts.edit'], activeClassName: 'acive');
AlphaHelper::prepareInteger(input: string or integer);
AlphaHelper::prepareSlug(slug, title, model);
AlphaHelper::encryptString(data [string type]);
AlphaHelper::decryptString(data [string type]);
AlphaHelper::makeHash(data [string type]);
AlphaHelper::getSettingsKey(key [string type]);
AlphaHelper::isMobile(string);


## Call a helper function:

integerToken(length: 10)
stringToken(length: 32, characters: '2345679acdefghjkmnpqrstuvwxyz');
digitsToEastern(number: 1375);
easternToDigits(number: ۱۲۳۴۵);
isActive(key: ['posts.index', 'posts.create', 'posts.edit'], activeClassName: 'acive');
prepareInteger(input: string or integer);
prepareSlug(slug, title, model);
encryptString(data [string type]);
decryptString(data [string type]);
makeHash(data [string type]);
getSettingsKey(string key);
isMobile(string);

```

#### Validators that exists in package
- National Code (کد ملی)
- IBAN (شماره شبا)
- Debit Card (شماره کارت بانکی)
- Postal Code (کد پستی)
- Shenase Meli (شناسه ملی)
- Mobile (موبایل)
- Phone (تلفن ثابت)
- Unique Dynamic (تشخیص یکتایی دو ستونه)
- Persian Alphabetic (الفبای فارسی)
- Persian Number (اعداد فارسی)
- No Special Chars (بدون کاراکتر خاص)
- Address (آدرس)

#### Validators Usage

> national_code
>
>A rule for validating Iranian national code [(How calculated)](https://fa.wikipedia.org/wiki/%DA%A9%D8%A7%D8%B1%D8%AA_%D8%B4%D9%86%D8%A7%D8%B3%D8%A7%DB%8C%DB%8C_%D9%85%D9%84%DB%8C#%D8%AD%D8%B3%D8%A7%D8%A8_%DA%A9%D8%B1%D8%AF%D9%86_%DA%A9%D8%AF_%DA%A9%D9%86%D8%AA%D8%B1%D9%84)
```
return [
    'code' => 'required|national_code'
];

For national_code with exeptions code or valid codes for foreign national codes
First step for use this parameters is migrate, php artisan migrate, and save your exeptions in this table 
but if you want to use another table you can set your table and column
return [
    'code' => 'required|national_code:national_code_exceptions' // This is default table that contains exeption codes
    -- OR -- 
    'code' => 'required|national_code:national_code_exceptions,code' // Second parameter is column of exeption table
];

-- OR --

return [
    'code' => ['required', 'national_code']
];

-- OR --

$validatedData = $request->validate([
    'code' => 'national_code',
]);
```

> iban
>
>A rule for validating IBAN (International Bank Account Number) known in Iran as Sheba. [(How calculated)](https://fa.wikipedia.org/wiki/%D8%A7%D9%84%DA%AF%D9%88%D8%B1%DB%8C%D8%AA%D9%85_%DA%A9%D8%AF_%D8%B4%D8%A8%D8%A7#%D8%A7%D9%84%DA%AF%D9%88%D8%B1%DB%8C%D8%AA%D9%85_%DA%A9%D8%AF_%D8%B4%D8%A8%D8%A7)
```
return [
    'account' => 'iban'
];

-- OR --

Add `false` optional parameter after `iban`, If IBAN doesn't begin with `IR`, so the validator will add `IR` as default to the account number:
return [
    'account' => 'iban:false'
];

-- OR --

If you want to validate non Iranian IBAN, add the 2 letters of country code after `false` optional parameter:
return [
    'account' => 'iban:false,DE'
];
```

> debit_card
>
>A rule for validating Iranian debit cards. [(How calculated)](http://www.aliarash.com/article/creditcart/credit-debit-cart.htm)
```
return [
    'code' => 'required|debit_card'
];

-- OR --

return [
    'code' => ['required', 'debit_card']
];

-- OR --

$validatedData = $request->validate([
    'code' => 'debit_card',
]);

-- OR --

You can add an optional parameter if you want to validate a card from a specific bank:
return [
    'code' => 'required|debit_card:bmi'
];

List of the bank codes:

 - bmi (بانک ملی)
 - banksepah (بانک سپه)
 - edbi (بانک توصعه صادرات)
 - bim (بانک صنعت و معدن)
 - bki (بانک کشاورزی)
 - bank-maskan (بانک مسکن)
 - postbank (پست بانک ایران)
 - ttbank (بانک توسعه تعاون)
 - enbank (بانک اقتصاد نوین)
 - parsian-bank (بانک پارسیان)
 - bpi (بانک پاسارگاد)
 - karafarinbank (بانک کارآفرین)
 - sb24 (بانک سامان)
 - sinabank (بانک سینا)
 - sbank (بانک سرمایه)
 - shahr-bank (بانک شهر)
 - bank-day (بانک دی)
 - bsi (بانک صادرات)
 - bankmellat (بانک ملت)
 - tejaratbank (بانک تجارت)
 - refah-bank (بانک رفاه)
 - ansarbank (بانک انصار)
 - mebank (بانک مهر اقتصاد)
```

> postal_code
```
return [
    'code' => 'required|postal_code'
];

--OR--

return [
    'code' => ['required, 'postal_code']
];

--OR--

$validatedData = $request->validate([
    'code' => 'postal_code',
]);
```

> shenase_meli
>
>A rule for validating Iranian shenase meli [(How calculated)](http://www.aliarash.com/article/shenasameli/shenasa_meli.htm)
```
return [
    'code' => 'required|shenase_meli'
];

--OR--

return [
    'code' => ['required, 'shenase_meli']
];

--OR--

$validatedData = $request->validate([
    'code' => 'shenase_meli',
]);
```

> mobile
```
return [
    'mobile' => 'required|mobile'
];

--OR--

return [
    'mobile' => ['required, 'mobile']
];

--OR--

$validatedData = $request->validate([
    'mobile' => 'mobile',
]);
```

> username (Valid characters: English Alphabetic, Numbers and _)
```
return [
    'username' => 'required|username'
];

--OR--

return [
    'username' => ['required, 'username']
];

--OR--

$validatedData = $request->validate([
    'username' => 'username',
]);
```

> phone
```
return [
    'phone' => 'required|phone'
];

--OR--

return [
    'phone' => ['required, 'phone']
];

--OR--

$validatedData = $request->validate([
    'phone' => 'phone',
]);
```

> unique_dynamic (table_name, target_column, extra_column, extra_column_value, ignore_column, ignore_column_value)
```
return [
    // Without ignore for create user, 4 parameters
    // If we want to check a username is unique in users table when type of this useranme equal student
    // If username = 'v.ashourzadeh' and type = 'student' you can't create username = 'v.ashourzadeh' but create username = 'v.ashourzadeh' if type = 'teacher'
    'username' => 'required|unique_dynamic:users,username,type,student'

    // With ignore for edit user, 6 parameters
    // If we want to check a username is unique in users table and ignore this for special id, for example id = 5
    // If username = 'v.ashourzadeh' and type = 'student' you can set username = 'v.ashourzadeh' when id = 5
    'username' => 'required|unique_dynamic:users,username,type,student,id,5'
];

--OR--

return [
    // Without ignore for create user, 4 parameters
    'username' => ['required, 'unique_dynamic:users,username,type,student']

    // With ignore for edit user, 6 parameter
    'username' => ['required, 'unique_dynamic:users,username,type,student,id,5']
];

--OR--

$validatedData = $request->validate([
    // Without ignore for create user, 4 parameters
    'username' => 'unique_dynamic:users,username,type,student',
    // With ignore for edit user, 6 parameter
    'username' => 'unique_dynamic:users,username,type,student,id,5',
]);
```

> persian_alphabetic
```
return [
    'code' => 'required|persian_alphabetic'
];

--OR--

return [
    'code' => ['required, 'persian_alphabetic']
];

--OR--

$validatedData = $request->validate([
    'code' => 'persian_alphabetic',
]);
```

> persian_number
```
return [
    'code' => 'required|persian_number'
];

--OR--

return [
    'code' => ['required, 'persian_number']
];

--OR--

$validatedData = $request->validate([
    'code' => 'persian_number',
]);
```

> no_special_chars
```
return [
    'name' => 'required|no_special_chars'
];

--OR--

return [
    'name' => ['required, 'no_special_chars']
];

--OR--

$validatedData = $request->validate([
    'name' => 'no_special_chars',
]);
```

> address
```
return [
    'address' => 'required|address'
];

--OR--

return [
    'address' => ['required, 'address']
];

--OR--

$validatedData = $request->validate([
    'address' => 'address',
]);
```

#### Categories Usage

This package provides category handling for blew table structure with `Category` model:

categories => `id, slug, title, category_type, description, parent_id, creator_id`

categorizables => `category_id, categorizable_id, categorizable_type`

> Usage in category create blade :

`<x-category-options page="create" type="serviceCategory"></x-category-options>`

* this tag generates select options , so you can use it in select or select2 tags.
  
* type: the category type used in the table structure, for example postCategory

* page: the blade page that contains the current tag

> Usage in category edit blade:

`<x-category-options page="edit" type="serviceCategory" parent="{{ $category->parent_id }}" category="{{ $category->id }}"></x-category-options>`

* parent: that contains current category parent_id

* category: that contains current category_id

> Usage in specific create blade that contains category:

`<x-category-checkboxes page="create" type="serviceCategory"></x-category-checkboxes>`

* this tag generates checkboxes , so you can use it in any div tag.

* type: the category type used in the table structure, for example postCategory

* page: the blade page that contains the current tag

> Usage in specific edit blade that contains category:

`<x-category-checkboxes type="serviceCategory" page="edit" checked="{{ $service->categories->pluck('id') }}"></x-category-checkboxes>`

* checked: an array that contains synced categories with the main object, for example services->categories

#### Requirements:

- PHP v7.0 or above
- Laravel v7.0 or above
