@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-10">
            <h1 class = "text-center my-5">@lang('general.Liste des pieces')</h1>

        </div>

    </div>

    <div class="container">

        <div class="row">
            @foreach ($pices as $index => $piece)
                <div class="col-md-4">
                    <div class="card card-body">
                        {{--  si vous voulez avoir le titre de votre données cliquable (ici c'est le titre de la pieces) utiliser le bout de code ci-bas>    
               {{--  <a href="{{ url('pieces/'. $piece->id) }}">
                <h2>
                        {{ $piece->partName }}
                    </h2>
                   
                </a>  --}}
                        <h2>
                            {{ $piece->title }}
                        </h2>
                        @if ($piece->photo)
                            <img src="../images/upload/{{ $piece->photo }}" class="card-img-top img-fluid">
                        @endif
                        {{-- {{ $piece->price }} --}}
                        <div class="col-md-6">
                            <a href="{{ url('pieces/' . $piece->id) }}"
                                class="btn btn-outline-primary">@lang('general.Savoir')</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class= "d-flex justify-content-center">
                {!! $pieces->links() !!}
            </div>
        </div>
    </div>
@endsection
