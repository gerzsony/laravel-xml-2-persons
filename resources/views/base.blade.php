<!DOCTYPE html>
<html lang="hu">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Xml 2 Persons Converter</title>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Xml 2 Persons</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">

          <li class="nav-item">
            <a class="nav-link mx-2" href="/">Kezdőoldal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/xmlupload"> Xml fájl feltöltő </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/persons"> Személyek </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/logs"> Logok </a>
          </li> 

        </ul>
      </div>
    </div>
    </nav>

    <div class="container">
         @yield('main')  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>