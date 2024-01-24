<?php

namespace app\Controllers;

use app\Models\{Movie, Director};
use app\Http\{Request, Session};

class MovieController extends Controller
{
    public $movie;

    public $director;

    public function __construct(Request $request, Session $session, Movie $movie, Director $director = null)
    {
        parent::__construct($request, $session);

        $this->movie = $movie;
        $this->director = $director;
    }

    public function index($id = null)
    {
        $this->render('header');

        echo "This is a Movie page";

        if (empty($id)) {
            $allMovies = $this->movie->all();
            $allDirectors  = $this->director->all();
        }

        $this->render('footer');
    }
}