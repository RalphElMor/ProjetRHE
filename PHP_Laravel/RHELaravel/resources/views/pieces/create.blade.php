@extends('layouts.app')
@php $locale = session()->get('locale'); @endphp

<html lang="fr">
@section('title', 'Ajouter une piece')
@section('content')
    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h1 class="text-light fw-bold">@lang('general.Ajouter une piece')</h1>
                </div>
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body p-4">
                    <form action="{{ route('pieces.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="partName"><strong> @lang('general.titre_piece')</strong></label>
                            <input type="text" class="form-control" id="partName" name="partName" placeholder="{{ __('general.hint_titre') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplier"><strong>@lang('general.fournisseur_piece')</strong></label>
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="{{ __('general.hint_fournisseur') }}">
                        </div>

                        <div class="form-group mb-3">
    <label for="price"><strong>@lang('general.prix_piece')</strong></label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="{{ __('general.hint_prix') }}" required>
</div>

                        <div class="form-group mb-3">
                            <label for="carModel"><strong>@lang('general.modele_piece')</strong></label>
                            <input type="text" class="form-control" id="carModel" name="carModel" placeholder="{{ __('general.hint_modèle') }}">
                        </div>

                        <div class="form-group mb-3">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
</div>

                        <div class="form-group mb-3">
                            <label><strong>@lang('general.image_piece')</strong></label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">@lang('general.btn_publier')</button>
                            <a href="{{ url('admin/pieces') }}" class="btn btn-info">@lang('general.btn_retourAccueil')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
