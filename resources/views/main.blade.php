<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

<div id="app">
    <div class="menu col-md-2">
        <ul>
            <tree-menu v-for="(category, id) in tree" :key="id" :category="category"
                       :choose-category="chooseCategory"></tree-menu>
        </ul>
    </div>
    <div class="products col-md-10">
        <products :category_id="category_id"></products>
    </div>
</div>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>