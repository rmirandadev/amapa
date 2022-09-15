<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/agency.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body { background-color: #f3f3f3 }
    </style>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header h2 text-blue-secondary"><strong><i class="fas fa-exclamation-circle"></i> Erro 404</strong></div>
                <div class="card-body">
                    {{ $exception->getMessage() }}
                </div>
            </div>
            <a href="{{ route('agency.index') }}" class="btn btn-blue-primary mt-5">Retorne à página principal</a>
        </div>
    </div>
</div>

</body>
</html>
