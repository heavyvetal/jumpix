<?php

namespace app\Controllers;

use app\Http\{Request, Session};

class MainPageController extends Controller
{
    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }

    public function index()
    {
        $url = ['home' => HOST . DOMAIN_ADDITION, 'application_path' => APPLICATION];

        $this->render('header', $url);
        $this->render('main_page', $url);
        $this->render('footer');
    }
}