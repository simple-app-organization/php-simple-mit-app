@extends('layouts.default')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Who Are Page</h1>
            <p class="lead">This is the who are page.</p>
            <p>
                <a href="about{{$extFile}}" class="btn-default btn-sm btn btn-primary">
                    Back to About Us...</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content_main" class="container">
                    {{-- MARKDOWN FILE CONTENT --}} 
                    @php echo strip_tags($mdHtml, '<h1><h2><h3><ol><ul><li><p><i><b><a>'); @endphp
                </div>
                <div id="where_are_list" class="container">
                    <ul class="list-group">
                        @foreach ($places as $place)
                        <li class="list-group-item">
                            {{$place->getTitle()}}
                            <span class="badge badge-secondary badge-list-group">{{$place->getCountry()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container">
                    <div id="accordion">
                        @foreach ($places as $index => $place)
                            <div class="card">
                                <div class="card-header" id="heading{{$place->getId()}}">
                                    <button class="btn btn-link {{!! $index != 0 ? " collapsed " : ""}}" data-toggle="collapse" data-target="#collapse{{$place->getId()}}" aria-expanded="true" aria-controls="collapse{{$place->getId()}}">
                                        {{$place->getTitle()}}
                                    </button>
                                    <span class="badge badge-secondary badge-list-group">{{$place->getCountry()}}</span>
                                </div>                            
                                <div id="collapse{{$place->getId()}}" class="collapse {{!! $index == 0 ? " show " : "" }}" aria-labelledby="heading{{$place->getId()}}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{$place->getDescription()}}
                                        <br /><br />
                                        <dl>
                                            <dt>Phone</dt>
                                            <dd>{{$place->getPhone()}}</dd>
                                            <dt>Address</dt>
                                            <dd>{{$place->getAddress()}}</dd>
                                            <dt>Country</dt>
                                            <dd>{{$place->getCountry()}}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- For demonstration purpose --}}
    <div class="file_contents container">
      <span>file: /data/pages/whereare.md</span>
      <p class="lead">
        (the data in the where page)
      </p>
      <code><pre>{{$mdText}}</pre></code>
    </div>
    <div class="file_contents container">
      <span>file: /data/places.json</span>
      <p class="lead">
        (the data whom represent places)
      </p>
      <code><pre>{{$json_places}}</pre></code>
    </div>
    {{-- END For demonstration purpose --}}
@stop