# fasad36.ru — документация проекта

## О проекте

Сайт компании **«ТермоФасад»** (Воронеж) — фасадные работы, утепление, продажа материалов для отделки фасадов.

| Параметр | Значение |
|----------|----------|
| CMS | 1С-Битрикс |
| Шаблон | `bitrix/templates/business_v1/` (решение AlexKova BXReady2) |
| Кастомный код | `bitrix/php_interface/`, `include/`, разделы сайта |
| Медиа | `upload/` (iblock, resize_cache) |
| Локальный URL | **http://127.0.0.1:8094/** |
| Локальная БД | `fasad36_local` @ `127.0.0.1` |
| Git | [github.com/bziksv/fasad36](https://github.com/bziksv/fasad36) |
| Prod | [fasad36.ru](https://fasad36.ru) |

### Бизнес-направления

- **Каталог** — фасадные материалы: штукатурки, краски, грунтовки, клеи, утеплители
- **Услуги** — мокрый фасад, утепление, ремонт и отделка фасадов
- **Проекты** — портфолио выполненных работ
- **Стоимость услуг** — прайс-листы по видам работ

---

## Сервер и окружения

| Окружение | Домен | Путь на сервере | IP |
|-----------|-------|-----------------|-----|
| **Prod** | fasad36.ru | `/var/www/fasad36_ru_usr/data/www/fasad36.ru` | 217.28.220.186 |

### Правило работы

> **Сейчас работаем только локально** (`http://127.0.0.1:8094/`).  
> Деплой на prod — только по явной просьбе.

### SSH-доступ

```bash
ssh root@217.28.220.186
# путь к сайту: /var/www/fasad36_ru_usr/data/www/fasad36.ru
```

Рекомендуемая запись в `~/.ssh/config`:

```
Host fasad36
    HostName 217.28.220.186
    User root
    IdentityFile ~/.ssh/id_ed25519
    IdentitiesOnly yes
```

### Деплой на prod (по запросу)

```bash
# Пример: шаблон
scp bitrix/templates/business_v1/header.php \
    root@217.28.220.186:/var/www/fasad36_ru_usr/data/www/fasad36.ru/bitrix/templates/business_v1/

# Очистка кеша
ssh root@217.28.220.186 \
    "rm -rf /var/www/fasad36_ru_usr/data/www/fasad36.ru/bitrix/cache/*"
```

---

## Архитектура

```
Пользователь
    ↓
bitrix/templates/business_v1/   (header, footer, BXReady2)
    ↓
catalog/index.php               (bxready2:catalog.lite, iblock 2)
services/index.php              (bxready2:block, iblock 11)
    ↓
bitrix/php_interface/init.php   (хуки, UF_DELETE_INDEX для SEO)
```

### Ключевые компоненты

| Раздел | Компонент | Iblock |
|--------|-----------|--------|
| Каталог | `bxready2:catalog.lite` | **2** — каталог товаров |
| Услуги | `bxready2:block` | **11** — услуги |
| Проекты | `bxready2:block` | **12** — проекты |
| Новости | `bxready2:block` | **9** |
| Статьи | `bxready2:block` | **10** |

Каталог: SEF `/catalog/#SECTION_CODE#/#ELEMENT_CODE#/`, торговые предложения (iblock **3**).

### Кастомные модули

| Модуль | Назначение |
|--------|------------|
| `alexkova.bxready2` | Фреймворк шаблона BXReady2, коллекции элементов |
| `alexkova.business` | Бизнес-функции решения |
| `alexkova.popupad` | Попап-реклама |
| `alexkova.rklite` | Рекламные блоки |
| `niges.cookiesaccept` | Баннер cookies |
| `sng.secure` | Безопасность |

### Кастомный PHP

| Файл | Назначение |
|------|------------|
| `bitrix/php_interface/init.php` | `getIndexes()` — управление индексацией разделов через UF `UF_DELETE_INDEX` |
| `include/` | Блоки шаблона: логотип, меню, SEO-тексты, формы |

---

## Инфоблоки

| ID | Тип | Код | Назначение |
|----|-----|-----|------------|
| 1 | catalog | brands | Производители |
| **2** | catalog | catalog | **Каталог товаров** |
| 3 | catalog | offers | Торговые предложения |
| 4 | content | employees | Сотрудники |
| 5 | content | corporate_licenses | Сертификаты |
| 6 | content | vacancies | Вакансии |
| 7 | content | reviews | Отзывы |
| 8 | content | triggers | Триггеры |
| 9 | content | news | Новости |
| 10 | content | articles | Статьи |
| **11** | content | services | **Услуги** |
| **12** | content | project | **Проекты** |
| 13 | content | slider_slick | Слайдер на главной |
| 14 | content | faq | Вопрос-ответ |
| 15 | content | actions | Акции |
| 17 | services | products_request | Заказанные товары |
| 18 | services | forms_phone | Заказать звонок |
| 19 | services | feedback | Обратная связь |
| 20 | content | clients | Клиенты |
| 21 | content | partners | Партнёры |
| 22 | content | price | Прайс по производителям |
| 23 | services | sale | Получить скидку |

---

## Структура проекта

```
fasad36/                        — workspace (вне git)
├── fasad36_ru.sql              — дамп БД (вне git)
└── fasad36.ru/                 — git root, код сайта
    ├── bitrix/
    │   ├── templates/business_v1/  — шаблон сайта
    │   ├── modules/                — кастомные модули
    │   └── php_interface/          — init.php, dbconn
    ├── catalog/                    — каталог товаров
    ├── services/                   — услуги
    ├── projects/                   — портфолио
    ├── cost-of-services/           — стоимость работ
    ├── include/                    — include-блоки шаблона
    ├── scripts/                    — локальный dev
    ├── .local/                     — nginx/php-fpm (gitignored runtime)
    └── docs/                       — документация
```

Корневые dot-файлы (меню, доступ, ЧПУ):

| Файл | Назначение |
|------|------------|
| `.top.menu.php` | Верхнее меню |
| `.footer_*.menu.php` | Меню футера |
| `.htaccess` | Apache: редиректы, ЧПУ |
| `.access.php` | Права доступа Bitrix |

---

## Локальная разработка

Без Docker. Homebrew **nginx** + **PHP 8.3 FPM** + **MySQL**.

```bash
cd fasad36.ru
cp .local/db.env.example .local/db.env
./scripts/setup-local-db.sh       # импорт ../fasad36_ru.sql (один раз)
./scripts/start-dev.sh            # nginx :8094 + php-fpm :9094
./scripts/stop-dev.sh             # остановка
```

| Параметр | Значение |
|----------|----------|
| URL | http://127.0.0.1:8094/ |
| Nginx | `.local/nginx/nginx.conf` → `.local/run/nginx.conf` |
| PHP-FPM | `.local/php/fpm.conf`, `pools.conf` |
| Учётные данные БД | `.local/db.env` (gitignored) |
| Локальный dbconn | `bitrix/php_interface/dbconn.local.php` (gitignored) |

При первом запуске `start-dev.sh` вызывает `apply-local-db-config.sh`, если `dbconn.local.php` отсутствует.

Пересоздать БД из дампа:

```bash
./scripts/setup-local-db.sh --force
```

### Порты соседних проектов

| Проект | Порт |
|--------|------|
| almamed | 8080 |
| akvasan-shop | 8081 |
| vilmed | 8082 |
| kosmamed | 8083 |
| polimer | 8084 |
| lormag | 8085 |
| metplus-vrn.ru | 8086 |
| oftalmag / insortex | 8087 |
| metprof-vrn | 8088 |
| vrn-ehk | 8089 |
| medplakaty | 8090 |
| miinox | 8091 |
| argument-uk | 8092 |
| dckljaksa | 8093 |
| **fasad36.ru** | **8094** |

---

## Git

**Репозиторий:** [github.com/bziksv/fasad36](https://github.com/bziksv/fasad36)  
**Git root:** папка `fasad36.ru/` (дамп `fasad36_ru.sql` лежит на уровень выше, вне git).

### Что НЕ коммитить

Секреты и тяжёлые данные исключены в `.gitignore`:

- `bitrix/.settings.php` — пароль БД
- `bitrix/php_interface/dbconn.php`, `dbconn.local.php`
- `bitrix/license_key.php`
- `.local/db.env`, `.local/run/`, `.local/backup/`
- `upload/`, кеш, дампы (`*.sql`)

Примеры без секретов: `bitrix/.settings.example.php`, `bitrix/php_interface/dbconn.example.php`.

### Исключения из индексации Cursor

Настроены в `.cursorignore` (по образцу metplus-vrn.ru, lormag.ru):

- кеш Битрикс
- медиа (`upload/`, `images/`)
- ядро UI (`bitrix/js`, `bitrix/css`, `bitrix/admin`…)
- бинарные файлы

---

## База данных

| Параметр | Prod | Local |
|----------|------|-------|
| Имя БД | `fasad36_ru` | `fasad36_local` |
| Пользователь | `fasad36_ru` | `fasad36_local` |
| Хост | `localhost` | `127.0.0.1` |
| Дамп | — | `../fasad36_ru.sql` (~19 MB) |

---

## Журнал изменений

| Дата | Что сделано |
|------|-------------|
| 2026-08-22 | Первичная документация, `.gitignore`, `.cursorignore`, локальный dev :8094, скрипты в `scripts/` |

### Шаблон записи

```markdown
### YYYY-MM-DD — краткое описание
- **Проблема:** ...
- **Решение:** ...
- **Файлы:** path/to/file.php
```
