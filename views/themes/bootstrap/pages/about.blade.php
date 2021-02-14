@extends('layouts.default')
@section('content')
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4">About Us</h1>
      <p class="lead">This is the about page.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Who Are</h3>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut est non mauris iaculis vulputate. Vivamus luctus sapien et nisl mattis consequat. Vestibulum nec varius sem.</p>
        <p>
          <a href="about/whoare{{$extFile}}" class="btn-default btn-lg btn btn-primary">
            More...</a>
        </p>
      </div>
      <div class="col-md-6">
        <h3>Where Are</h3>
        <p class="lead">Sed imperdiet nunc eget ante aliquam auctor. Aliquam rhoncus quam sed sodales imperdiet. Aliquam erat volutpat. Sed mattis luctus pretium.</p>
        <p>
          <a href="about/whereare{{$extFile}}" class="btn-default btn-lg btn btn-primary">
            More...</a>
        </p>
      </div>
    </div>
  </div>
  <div id="content_main" class="container">
    {{-- MARKDOWN FILE CONTENT --}} 
    @php echo @stripHtml($mdHtml); @endphp
  </div>  
  <div class="file_contents container">
    <span>file: /data/pages/about.md</span>
    <p class="lead">
      (the data in the about page)
    </p>
    <code><pre>{{$mdText}}</pre></code>
  </div>
@stop