<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Album de Fotos</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

<link href="{{asset('css/app.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
  </head>
  <body>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>&nbsp;Album de Fotos</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Escreva aqui seu novo Post</h1>
      <form method="POST" action="/" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-left">
          <label for="email">Endereço de e-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="nome@dominio.com">
        </div>
        <div class="form-group text-left">
          <label for="mensagem">Sua mensagem</label>
          <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
        </div>
        <div class="custom-file" style="margin-top: 8px;">
          <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
          <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
        </div>
        <p style="margin-top: 5px;">
          <button type="submit" class="btn btn-primary my-2">Enviar</button>
          <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
        </p>
      </form>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach ($albums as $album)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top figure-img img-fluid rounded" src="storage/{{$album->arquivo}}">
            <div class="card-body">
              <p class="card-text">{{$album->email}}</p>
              <p class="card-text">{{$album->mensagem}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="/download/{{$album->id}}">Download</a>
                  <form method="POST" action="/{{$album->id}}">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach    
      </div>
    </div>
  </div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
