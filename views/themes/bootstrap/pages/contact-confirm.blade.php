@extends('layouts.default')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Contact Confirm Page</h1>
            <p class="lead">This is the contact confirm page.</p>
        </div>
    </div>
    <div class="container">
        <p>
            Kind <i>{{$name}} {{$surname}}</i>, we have received your message.
            <br />
            We reply soon.
        </p>
        <hr class="my-4">
    </div>
    <div id="content_main" class="container">
      {{-- MARKDOWN FILE CONTENT --}} 
      @php echo @stripHtml($mdHtml); @endphp
    </div>  
    <div class="file_contents container">
      <span>file: /data/pages/contact_confirm.md</span>
      <p class="lead">
        (the data in the contact_confirm page)
      </p>
      <code><pre>{{$mdText}}</pre></code>
    </div>
  @stop