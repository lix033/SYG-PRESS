@extends('layouts.masterAdmin')

@section('contenu')

@if (session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif

liste des tarifs
@endsection