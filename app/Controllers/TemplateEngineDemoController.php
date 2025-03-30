<?php

namespace app\Controllers;

use app\Views\TemplateEngine;
use app\Http\{Request, Session};

class TemplateEngineDemoController extends Controller
{
    /**
     * @var TemplateEngine
     */
    private TemplateEngine $templateEngine;

    public function __construct(Request $request, Session $session, TemplateEngine $templateEngine)
    {
        parent::__construct($request, $session);
        $this->templateEngine = $templateEngine;
    }

    public function index()
    {
        $url = ['home' => HOST . DOMAIN_ADDITION];
        $this->render('header', $url);

        $data = [
            'title' => 'Welcome Page',
            'text1' => 'This is a simple template engine example.',
            'user' => 'John Doe',
            'items' => ['Item 1', 'Item 2', 'Item 3']
        ];

        echo $this->templateEngine->render('template_engine_example', $data);

        $this->render('footer', $url);
    }
}
