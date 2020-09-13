<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>4 Answers Quiz 4択クイズ&クイズ徹底解説</title>

  <!-- Styles -->
  <link href="/css/app.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    <!-- <app />はMainPage.vue -->
    <!-- propsで文字列ではなくJSの式だとVue.jsに伝えるには、v-bindを使う -->
    <!-- ??はPHPの機能のNULL合体演算子。値を取得できない場合は、空の配列を渡す。 -->
    <app :errors="{{ $errors }}" :auth="{{ Auth::user() ?? '[]' }}" />
  </div>
  <script src="/js/app.js"></script>
</body>

</html>