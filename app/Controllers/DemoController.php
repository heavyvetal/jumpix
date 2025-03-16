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
