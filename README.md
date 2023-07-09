# Тестовое задание A3F Group: PHP-fullstack разработчик

## Тестовое задание 1

### Описание
1. Реализовать ES6-класс хранилища, который может хранить внутри себе массив строк. Класс должен иметь метод `init`, который ожидает 1 секунду, затем заполняет массив случайными строками (не менее 500 элементов), затем ожидает 1 секунду, после чего завершает свою работу. Класс должен также иметь метод `get`, который возвращает массив строк.
2. Сверстать страницу, которая содержит основной блок, шириной не более 900px и с минимальной высотой 100% высоты страницы. Основной блок должен находиться по центру страницы и содержать в себе:
    - однострочный горизонтальный блок меню, содержащий кнопку "Первая", текстовое поле ввода, кнопку "Перейти", кнопку "Последняя". Текстовое поле ввода должно быть растянуто на всю оставшуюся ширину родительского блока. При уменьшении ширины экрана должна изменяться ширина только поля ввода. При достижении ширины экрана в 575px, элементы меню должны выстраиваться в колонку, вместо строки.
    - блок содержимого в одну колонку, куда должны быть выведены строки из хранилища сразу после того как будет вызван метод init.
3. При нажатии на кнопку "Последняя", должен выполняться вертикальный скролл до последнего элемента блока содержимого, чтобы последний элемент быть виден. При нажатии на кнопку "Первая", должен выполняться скролл до первого элемента блока содержимого. При вводе числа (валидация не требуется) в текстовое поле и нажатии на кнопку "Перейти", должен выполняться скролл до элемента блока содержимого с индексом, соответствующим введенному числу.
4. Инстанцирование хранилища и вызов метода init должны выполняться, когда страница будет загружена полностью.
5. Можно использовать любые сторонние библиотеки, фреймворки.
6. Будет плюсом, если скролл будет плавным.

## Тестовое задание 2

### Описание
Написать на PHP парсер html страницы (на входе url), который на выходе будет отображать количество и название всех используемых html тегов. Использование готовых парсеров и библиотек запрещено, включая модуль DOM.

Задача обязательно должна быть выполнена с использованием ООП подхода, демонстрирующего основные принципы структурирования и взаимодействия объектов. Не нужно придерживаться принципа KISS, приветствуется преувеличение уровня абстракции.

Основная цель задания не получить верный ответ, а продемонстрировать какие либо навыки организации кода с использованием ООП. Допускаются предположения не описанные в задаче, оверкодинг.

По завершению тестового задания, определитесь для себя, сколько времени у вас ушло на выполнение задачи и сообщите нам. Использование ООП обязательно.

## Установка проекта

### Требования
Перед установкой проекта убедитесь, что у вас установлены следующие компоненты:
- PHP версии 7.3 или выше
- Composer
- Docker

### Шаги установки

1. Клонируйте репозиторий проекта на вашу локальную машину.

```shell
git clone <URL репозитория>
```

2. Перейдите в директорию проекта.

```shell
cd a3f-group-test
```

3. Установите зависимости, выполнив команду:

```shell
composer install
```

4. Создайте файл `.env` на основе `.env.example` и настройте соответствующие переменные окружения.

```shell
cp .env.example .env
```

5. Запустите контейнеры Docker, используя Laravel Sail.

```shell
./vendor/bin/sail up
```

6. Подключитесь к контейнеру приложения Laravel Sail, выполнив команду:

```shell
./vendor/bin/sail shell
```

7. Выполните установку зависимостей фронтенд-части проекта:

```shell
npm install
```

8. Выполните сборку фронтенд-ресурсов при помощи Laravel Mix:

```shell
npm run dev
```

9. Веб-приложение Laravel должно быть доступно по адресу [http://localhost](http://localhost).

### Завершение работы

Чтобы остановить работу контейнеров Docker, выполните команду:

```shell
./vendor/bin/sail down
```

Это остановит все контейнеры, связанные с проектом Laravel.

## Описание проекта

Проект **a3f-group-test** является веб-приложением на базе фреймворка Laravel.

Основные компоненты проекта включают:
- **Laravel Sail**: Предоставляет среду разработки с помощью Docker для запуска приложения и его зависимостей.
- **Vue.js**: Используется для разработки фронтенд-части приложения, обеспечивая динамический интерфейс пользователя.

Проект разработан с использованием современных инструментов и технологий, включая Laravel, Vue.js и Docker, что облегчает развертывание и разработку.
## Обзор примененных принципов ООП и паттернов проектирования

В предоставленном коде применяются следующие принципы объектно-ориентированного программирования (ООП) и паттерны проектирования:

1. **Принцип единственной ответственности (Single Responsibility Principle, SRP):**
   - Класс `HtmlContentFetcherService` отвечает только за получение HTML-контента с помощью cURL.
   - Класс `HtmlTagExtractorService` отвечает только за извлечение HTML-тегов из строки HTML-контента.
   - Класс `HtmlTagCounterService` отвечает только за подсчет тегов в массиве HTML-тегов.
   - Класс  StringStorage отвечает только за управление хранилищем строк и их генерацию.
   - Класс  компонента Vue не выполняет других функций, кроме управления хранилищем строк и предоставления данных для представления.

2. **Принцип инверсии зависимостей (Dependency Inversion Principle, DIP):**
   - Класс `PhpNetParcerService` зависит от абстракции `HtmlParserCounterInterface`, а не от конкретных реализаций. Это позволяет гибко заменять реализацию интерфейса без изменения кода, что упрощает тестирование и поддержку.

3. **Внедрение зависимостей (Dependency Injection, DI):**
   - Класс `PhpNetParcerService` внедряет зависимости в конструкторе через свойства. Это позволяет внедрять зависимости извне и обеспечивает лучшую читаемость и тестируемость кода.

4. **Паттерн "Фабричный метод" (Factory Method):**
   - Класс `AppServiceProvider` содержит фабричный метод `register()`, который создает экземпляр класса `PhpNetParcerService`.

5. **Паттерн "Стратегия" (Strategy):**
   - Интерфейс `HtmlParserCounterInterface` определяет метод `getContedTags()`, который представляет алгоритм подсчета тегов. Реализация этого интерфейса в классе `PhpNetParcerService` позволяет заменять алгоритм подсчета тегов без изменения клиентского кода.

6. **Паттерн "Наблюдатель" (Observer):**
   - Класс `HtmlParserController` действует как наблюдаемый объект, который оповещает своих наблюдателей (представление) о результатах парсинга.

7. **Паттерн "Фасад" (Facade):**
   - Класс `HtmlParserController` предоставляет удобный интерфейс для взаимодействия с парсером, скрывая сложность и детали внутренней реализации.

8. **Паттерн "Адаптер" (Adapter):**
   - В предоставленном коде нет прямого примера паттерна "Адаптер". Однако, класс `HtmlContentFetcherService` можно рассматривать как адаптер для взаимодействия с внешней библиотекой (cURL).

9. **Паттерн "Модель-Представление-Контроллер" (Model-View-Controller, MVC):**
    - Класс `HtmlParserController` представляет контроллер, который управляет взаимодействием с моделью (сервисом) и представлением (шаблоном представления).

## Время выполнения задачи
На выполнение задачи потрачено порядка 16 часов более половины времени ушло на настройку среды и проекта, что не являлось обязательным, однако поскольку в описании вакансии была указана необходимость умения работы с **Laravel**, **Docker**, **VueJs**  - решил использовать эти технологии