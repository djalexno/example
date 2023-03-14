<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>links</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
    <main class="container">
    <div class="input-group mb-3 input_link mt-5">
        <input type="text" class="form-control" placeholder="Вставте ссылку" aria-describedby="basic-addon2" name="original_link">
        <div class="input-group-append">
            <button class="btn btn-outline-primary generated" type="button">Сгенерировать ссылку</button>
            <button class="btn btn-outline-danger clear" type="button">Очистить</button>
        </div>
    </div>
        <div class="generated_link"></div>
        <span id="original_link_error"></span>
    </main>
    </body>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</html>
