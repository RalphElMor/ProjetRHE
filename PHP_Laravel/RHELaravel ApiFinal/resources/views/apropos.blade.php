@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row">
   
        <h2>@lang('general.apropos')</h2>
        <h2> Ralph-Habib El-Mor </h2>
        <h3>420-5H6 MO Applications Web transactionnelles.</h3><br>
        <h3>Automne 2024, Collège Montmorency.</h3>
        <h3>@lang('general.etapes')</h3>
        <h4>1. @lang('general.etape_1')</h4>
        <h4>2. @lang('general.etape_2')</h4>
        <h4>3. @lang('general.etape_3')</h4>
        <h4>4. @lang('general.etape_4')</h4>
        <h4>5. @lang('general.etape_5')</h4>
        
        <h3>@lang('general.resultats')</h3>
        <h4>1. @lang('general.resultat_1')</h4>
        <h4>2. @lang('general.resultat_2')</h4>
        <h4>3. @lang('general.resultat_3')</h4>
        <h4>4. @lang('general.resultat_4')</h4>
        <h4>5. @lang('general.resultat_5')</h4>

        <h3>@lang('general.table_diagrame')</h3>
        <img src="{{ asset('/images/databaseLaravelle.png') }}" width="50px" height="600px">
    </div> 
</div>
@endsection
