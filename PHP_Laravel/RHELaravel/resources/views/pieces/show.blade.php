@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $piece->partName }} </h1>
            @if ($piece->photo)
                <img src="../images/upload/{{ $piece->photo }}" width="200px" height="100px">
            @endif
            <div>
                <strong>@lang('general.date_piece'){{ $piece->created_at }} </strong>
                <p class="lead">{{ $piece->content }}</p>
            </div>

            @if (Auth::user() && Auth::user()->role === 'ADMIN')
                <div class="buttons">
                    <a href="{{ url('admin/pieces/' . $piece->id . '/edit') }}" class="btn btn-warning">@lang('general.btn_modifier')</a>
                    <a href="{{ url('admin/pieces') }}" class="btn btn-info">@lang('general.btn_retourAccueil')</a>
                    <form action="{{ url('admin/pieces/' . $piece->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette piece?')">
                        @lang('general.btn_supprimer')
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    {{-- Section des Commandes --}}
    <div class="container">
        <h2>@lang('general.titre_commande')</h2>
        @foreach ($piece->commandes as $commande)
            <div>
                <strong>@lang('general.num_commande') {{ $commande->id }} @lang('general.par') {{ $commande->author }}</strong>
                <form action="{{ url('commandes/' . $commande->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn" onclick="return confirm('Voulez-vous vraiment supprimer cette commande?')">
                    @lang('general.btn_supprimer')
                    </button>
                </form>
            </div>
        @endforeach

        {{-- Formulaire d'ajout de commandes --}}
        <h4>@lang('general.ajout_commande')</h4>
        <div class="form-group mb-4">
            @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route('commandes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="author">@lang('general.nom_auteur')</label>
                    <input type="text" class="form-control" id="author" placeholder="{{ __('general.hint_auteur') }}" name="author">
                </div>
                <input type="hidden" name="piece_id" value="{{ $piece->id }}" />
                <button type="submit" class="btn btn-primary">@lang('general.btn_publier')</button>
            </form>
        </div>
    </div>
</div>
@endsection
