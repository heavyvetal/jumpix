<link rel="stylesheet" href="<?php echo $home; ?>/assets/css/usage.css">

<script src="<?php echo $home; ?>/assets/highlight/js/highlight.min.js"></script>
<link rel="stylesheet" href="<?php echo $home; ?>/assets/highlight/css/atom-one-dark.min.css">
<script>hljs.highlightAll();</script>

<div class="container content">
    <h1 class="text-center py-3">How to use Swift Framework?</h1>
    <p>Swift Framework is built on the MVC concept. The entry point of the application is <code>public/index.php</code>.</p>

    <h2 class="subtitle">Configuration</h2>
    <p>Application settings are defined in <code>config/app.php</code>:</p>
    <pre><code class="language-php">
    &lt;?php
    const APPLICATION = 'D:/xampp/htdocs/framework_test/';

    const HOST = 'http://localhost';
    const DOMAIN_SYM = false;
    const DOMAIN_ADDITION = '/framework_test';

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'demo';
    </code></pre>

    <h2 class="subtitle">Routing</h2>
    <p>Routes are defined in <code>config/routes.php</code>:</p>
    <pre><code class="language-php">
     &lt?php
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
    </code></pre>

    <h2 class="subtitle">Controllers</h2>
    <p>Controllers extend the base <code>Controller</code> class and are located in <code>app/Controllers</code>:</p>
    <pre><code class="language-php">
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
    </code></pre>

    <h2 class="subtitle">ORM</h2>
    <p>The built-in ORM allows working with tables as objects:</p>
    <pre><code class="language-php">
        &lt;?php

        namespace app\Models;

        class Movie extends Model
        {
            /**
            * @var string
            */
            protected $table = 'movie';
        }
    </code></pre>
</div>

