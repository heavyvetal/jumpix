<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Framework</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            box-sizing: content-box;
        }
        .hero {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2rem;
        }
        .btn-custom {
            background-color: white;
            color: #007bff;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #e2e6ea;
        }
        .code-example {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 0 20px;
            border-radius: 5px;
            font-family: monospace;
            text-align: left;
            margin-top: 20px;
            white-space: pre-line;
        }
        pre {
            margin: 0;
        }
        .example-header {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 30px;
            text-align: left;
        }
        .usage-examples {
            background-color: #e9ecef;
            color: black;
            padding: 50px 20px;
            width: 100%;
        }
        .usage-examples .code-example {
            color: #f8f9fa;
        }
        .code-example code {
            color: #ffcc00;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $home; ?>/">Swift Framework</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $home; ?>/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $home; ?>/usage">How to use</a>
            </li>
        </ul>
    </div>
</nav>