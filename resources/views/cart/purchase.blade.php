@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header">
            Pedido realizado com sucesso!
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Parabéns, pedido realizado. Número do pedido <b>#{{ $viewData['order']['id'] }}</b>
            </div>
        </div>
    </div>
@endsection
