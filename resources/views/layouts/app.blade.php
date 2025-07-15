<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>@yield('title') - Goreth’s Atelier</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="/">Goreth’s Atelier</a>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <footer class="text-center text-muted mt-5">Desenvolvido por Bito 💚</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qNHZsCbGGpQZ4nFWdp4Z6Ctd/4CoQoU+QeO5PgUuy3xZnEok+7apOQ+5cuD9qlkF" crossorigin="anonymous"></script>

</body>
</html>
