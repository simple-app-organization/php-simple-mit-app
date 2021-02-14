@extends('layouts.default')
@section('content')
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4">Welcome to php-simple-app!</h1>
      <p class="lead">
        This is a Demo webapp meant to show you this digital product.
        You can find <a href="https://github.com/Magicianred/php-simple-app">
          the repo in GitHub</a>
      </p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @foreach ($homeMessages as $key=>$homeMessage)
        <div class="col-md-4">
          <h3>{{$homeMessage->getTitle()}}</h3>
          <p>@php echo @stripHtml($homeMessage->getText()); @endphp</p>
          <p>
            <a target="_blank" rel="noopener noreferer" href="{{$homeMessage->getLink()}}" class="btn-default btn-lg btn btn-primary">
              More...</a>
          </p>
        </div>
        @php ++$key @endphp
      @endforeach
    </div>
  </div>
  <div id="content_main" class="container">
    {{-- MARKDOWN FILE CONTENT  --}} 
    @php echo @stripHtml($mdHtml); @endphp
  </div>  
  {{-- For demonstration purpose --}}
  <div class="file_contents container">
    <span>file: /data/pages/home.md</span>
    <p class="lead">
      (the data in the home page)
    </p>
    <code><pre>{{$mdText}}</pre></code>
  </div>
  <div class="file_contents container">
    <span>file: /data/home_messages.json</span>
    <p class="lead">
      (the data present in jumbotron)
    </p>
    <code><pre>{{$json_home_messages}}</pre></code>
  </div>
  {{-- END For demonstration purpose --}}
@stop