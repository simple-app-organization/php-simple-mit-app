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
                    @php echo @stripHtml($mdHtml); @endphp
                </div>
                <div class="container">
                    <ul class="list-group">
                        @foreach ($people as $index => $person)
                        <li class="list-group-item">
                            {{$person->getName()}} {{$person->getSurname()}} 
                            <button data-target="personCard{{$index}}" class="showPersonDetails badge badge-secondary badge-list-group">show details</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container">
                    @foreach ($people as $index => $person)
                        <div id="personCard{{$index}}" class="card personCard" style="{{!! $index != 0 ? " display:none; " : ""}}">
                            <img class="card-img-top" src="{{$person->getProfileSrc()}}" alt="{{$person->getSurname()}}" />
                            <div class="card-body">
                                <h5 class="card-title">{{$person->getName()}} {{$person->getSurname()}}</h5>
                                <p class="card-text">{{$person->getShortBio()}}</p>
                                <a href="#" class="btn btn-primary">{{$person->getEmail()}}</a>
                            </div>
                        </div>                
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- For demonstration purpose --}}
    <div class="file_contents container">
      <span>file: /data/pages/whoare.md</span>
      <p class="lead">
        (the data in the whoare page)
      </p>
      <code><pre>{{$mdText}}</pre></code>
    </div>
    <div class="file_contents container">
      <span>file: /data/people.json</span>
      <p class="lead">
        (the data whom represent people)
      </p>
      <code><pre>{{$json_people}}</pre></code>
    </div>
    {{-- END For demonstration purpose --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.showPersonDetails').click(function() {
                const target = $(this).attr('data-target');
                $('.card.personCard').hide();
                $('#'+ target).show();
            });
        });
    </script>
@stop