# JumpPHP Framework

JumpPHP Framework is a minimalistic PHP framework based on the **MVC** architecture.  It focuses on simplicity, flexibility, and convenient web application development.

**Key Features**
- Custom router for URL handling
- Simple dependency injection (DI) container
- Basic ORM for database interactions
- Template Engine with conditionals and loops
- HTTP request and session management
- Error handling and custom error pages

## System Requirements
- PHP >= 8.0
- MySQL or MariaDB
- Apache 2
- Composer

## Installation
Clone the repository:
```bash
git clone https://github.com/your-username/your-repository.git
```

Navigate to the project directory:

```bash
cd your-repository
```

Configure the application by editing the config/app.php file:
```php
<?php

const APPLICATION = 'D:/xampp/htdocs/framework_test/';
const HOST = 'http://localhost';
const DOMAIN_SYM = false;
const DOMAIN_ADDITION = '/framework_test';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'demo';
```

Install dependencies with Composer:

```bash
composer install
```

## Project Structure
```bash
app/
├── Controllers/
├── Models/
├── Views/
│
resources/
├── assets/
├── views/
│
config/
├── app.php
├── routes.php
│
public/
├── index.php
│
vendor/
```

## Entry Point
The main entry point of the application is public/index.php.

## Routes are matched

Corresponding controllers are executed

## Routing
Routes are defined in config/routes.php:
```php
<?php

use app\Controllers\MainPageController;
use app\Controllers\DemoController;

return [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],
    '/demo' => [
        'controller' => DemoController::class,
        'action' => 'index'
    ],
];
```

## Controllers
Controllers must extend the base Controller class:
```php
<?php

namespace app\Controllers;

use app\Http\{Request, Session};

class DemoController extends Controller
{
    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }

    public function index()
    {
        $url = ['home' => HOST . DOMAIN_ADDITION];
        $this->render('header', $url);
        $this->render('demo', $url);
        $this->render('footer');
    }
}
```

## Models and ORM
Models should extend the abstract Model class. This basic ORM allows you to interact with database tables as objects.
```php
<?php

namespace app\Models;

class Movie extends Model
{
    protected $table = 'movie';
}
```

## Template Engine
JumpPHP Framework includes a simple template engine supporting variables, loops, and conditionals.

Example template resources/views/test.php:
```html
<h1>{{ title }}</h1>
<p>{{ text1 }}</p>

@if($user)
<p>Welcome, {{ user }}</p>
@else
<p>Please log in.</p>
@endif

<ul>
    @foreach($items as $item)
    <li>{{ item }}</li>
    @endforeach
</ul>
```

## Dependency Injection
All classes that should be injected are registered inside app/Container/Dependencies.php.

## Error Handling
Custom error pages are supported, including a styled 404 Page Not Found.

## License
MIT License.