@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-10">
            <h1 class = "text-center my-5">@lang('general.Liste des pieces')</h1>

        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ route('pieces.create') }}">@lang('general.Ajouter une piece')</a>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">

        <div class="row">
            @foreach ($pieces as $index => $piece)
                <div class="col-md-4">
                    <div class="card card-body">
                       
          
                        <h2>
                        {{ $piece->partName}}
                        </h2>
                        <h2>
                            {{ $piece->supplier}}
                        </h2>
                        <h2>
                            {{ $piece->price}}
                        </h2>
                        @if ($piece->photo)
                            <img src="../images/upload/{{ $piece->photo }}" class="card-img-top img-fluid">
                        @endif
                   
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
