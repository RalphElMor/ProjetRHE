@extends('layouts.app')

@section('title', 'Modifier Piece: ' . $piece->partName)
@section('content')
    <div class="row my-3">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h1 class="text-light fw-bold">@lang('general.modif_piece') {{ $piece->partName }}</h1>
                </div>

                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('pieces.update', $piece->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group mb-3">
                            <label for="partName"><strong>@lang('general.titre_piece')</strong></label>
                            <input type="text" value="{{ old('partName', $piece->partName) }}" class="form-control" id="partName" name="partName">
                            @error('partName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplier"><strong>@lang('general.fournisseur_piece')</strong></label>
                            <input type="text" value="{{ old('supplier', $piece->supplier) }}" class="form-control" id="supplier" name="supplier">
                            @error('supplier')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="price"><strong>@lang('general.prix_piece')</strong></label>
                            <input type="number" step="0.01" value="{{ old('price', $piece->price) }}" class="form-control" id="price" name="price">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="carModel"><strong>@lang('general.modele_piece')</strong></label>
                            <input type="text" value="{{ old('carModel', $piece->carModel) }}" class="form-control" id="carModel" name="carModel">
                            @error('carModel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        </div>

                        <div class="form-group mb-3">
                            <label><strong>@lang('general.modif_image')</strong></label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('general.btn_msj')</button>
                        <a href="{{ url('admin/pieces/' . $piece->id) }}" class="btn btn-info">@lang('general.btn_annuler')</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
