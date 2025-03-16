<header class="hero">
    <h1>Welcome to Swift Framework</h1>
    <p>Lightweight, flexible, and powerful PHP framework for rapid development.</p>
    <a href="<?php echo $home; ?>/usage" class="btn btn-lg btn-custom">Find Out More</a>
</header>

<div class="container text-center py-5 mt-3 mb-3">
    <h2>Key Features</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <h4>🚀 Speed</h4>
            <p>Optimized for high performance.</p>
        </div>
        <div class="col-md-4">
            <h4>🛠 Flexibility</h4>
            <p>Easily customizable for any project.</p>
        </div>
        <div class="col-md-4">
            <h4>💡 Simplicity</h4>
            <p>Intuitive syntax and API.</p>
        </div>
    </div>
</div>

<div class="usage-examples">
    <div class="container">
        <h2 class="text-center">Usage Examples</h2>

        <p class="example-header">Routing</p>
        <div class="code-example">
                <pre><code>'/hello' => [
    'controller' => HelloController::class,
    'action' => 'index'
]</code></pre>
        </div>

        <p class="example-header">ORM</p>
        <div class="code-example">
                <pre><code>use App\Models\Movie;

$movie = new Movie();
$oneMovie = $movie->findOne('name', 'Avatar');
$allMovies = $movie->all();</code></pre>
        </div>
    </div>
</div>


