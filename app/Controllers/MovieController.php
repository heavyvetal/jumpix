<?php

namespace app\Controllers;

use app\Models\Movie;
use app\Http\{Request, Session};

class MovieController extends Controller
{
    public $movie;

    public function __construct(Request $request, Session $session, Movie $movie)
    {
        parent::__construct($request, $session);
        $this->movie = $movie;
    }

    public function index($id = null)
    {
        $this->render('header');

        echo "This is a Movie page";

        if (empty($id)) {
            $all = $this->movie->all();
            $test=1;
        }

        $this->render('footer');
    }
}