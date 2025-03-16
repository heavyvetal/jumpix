

<style>
    body {
        background-color: #f8f9fa;
        box-sizing: content-box;
    }
    .content {
        padding: 50px 20px;
    }
    .code-block {
        background-color: #343a40;
        color: #f8f9fa;
        border-radius: 5px;
        font-family: monospace;
        white-space: pre-wrap;
        overflow-x: auto;
    }
    .subtitle {
        margin-top: 30px;
    }
</style>

<div class="container content">
    <h1 class="text-center py-3">How to use Swift Framework?</h1>
    <p>Swift Framework is built on the MVC concept. The entry point of the application is <code>public/index.php</code>.</p>

    <h2 class="subtitle">Configuration</h2>
    <p>Application settings are defined in <code>config/app.php</code>:</p>
    <div class="code-block">
        &lt;?php
        const APPLICATION = 'D:/xampp/htdocs/framework_test/';

        const HOST = 'http://localhost';
        const DOMAIN_SYM = false;
        const DOMAIN_ADDITION = '/framework_test';

        const DB_HOST = 'localhost';
        const DB_USER = 'root';
        const DB_PASS = '';
        const DB_NAME = 'demo';
    </div>

    <h2 class="subtitle">Routing</h2>
    <p>Routes are defined in <code>config/routes.php</code>:</p>
    <div class="code-block">
        &lt;?php
        use app\Controllers\MainPageController;
        use app\Controllers\DemoController;

        return $routes = [
            '/' => [
                'controller' => MainPageController::class,
                'action' => 'index'
            ],
            '/demo' => [
                'controller' => DemoController::class,
                'action' => 'index'
            ]
        ];
    </div>

    <h2 class="subtitle">Controllers</h2>
    <p>Controllers extend the base <code>Controller</code> class and are located in <code>app/Controllers</code>:</p>
    <div class="code-block">
        &lt;?php

        namespace app\Controllers;

        use app\Http\{Request, Session};

        class DemoController extends Controller
        {
            public function __construct(Request $request, Session $session)
            {
                parent::__construct($request, $session);
            }

            public function index() {
                $url = ['home' => HOST . DOMAIN_ADDITION];

                $this->render('header', $url);
                $this->render('demo', $url);
                $this->render('footer');
            }
        }
    </div>

    <h2 class="subtitle">ORM</h2>
    <p>The built-in ORM allows working with tables as objects:</p>
    <div class="code-block">
        &lt;?php

        namespace app\Models;

        class Movie extends Model
        {
            /**
            * @var string
            */
            protected $table = 'movie';
        }
    </div>
</div>