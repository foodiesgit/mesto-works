# hafriyat.gaziantepbilisim.com.tr REST API

Hafriyat

## Neler Var?
* [User Auth](#user-auth)
* [Kabul Belgeleri](#kabul-belgeleri)
* [Taşıma Talepleri](#tasima-talepleri)

## User Auth

### Giriş Yap

* POST `https://hafriyat.gaziantepbilisim.com.tr/api/login`

| parameter | type | required | default | description |
|:----------|:-----|:---------|:--------|:------------|
| `PlakaNo` | string | evet | yok | Plakası |
| `Sifre` | string | evet | yok | Şifresi |

## Kabul Belgeleri

### Tümü

* GET `https://hafriyat.gaziantepbilisim.com.tr/api/acceptance-certificate`

### Detay

* GET `https://hafriyat.gaziantepbilisim.com.tr/api/acceptance-certificate/show`

## Taşıma Talepleri

### Tümü

* GET `https://hafriyat.gaziantepbilisim.com.tr/api/vehicle-movement`

| parameter | type | required | default | description |
|:----------|:-----|:---------|:--------|:------------|
| `KabulBelgesiId` | integer | evet | yok | Kabul Belgesi Id |

### Ekle

* POST `https://hafriyat.gaziantepbilisim.com.tr/api/vehicle-movement/store`

| parameter | type | required | default | description |
|:----------|:-----|:---------|:--------|:------------|
| `AracId` | integer | evet | yok | Araç Id |
| `KabulBelgesiId` | integer | evet | yok | Kabul Belgesi Id |
