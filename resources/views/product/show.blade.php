@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/' . $viewData['product']['image']) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/' . $viewData['product']['image']) }}"
                                class="img-fluid rounded-start">
                        </div>
                        {{ $viewData['product']['name'] }} (${{ $viewData['product']['price'] }})
                    </h5>
                    <p class="card-text">
                        {{ $viewData['product']['description'] }}
                    </p>
                   
                    <p class="card-text">
                        <form method="POST" action="{{ route('cart.add', $viewData['product']['id']) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Quantidade</div>
                                        <input type="number" min="1" max="10" class="form-control quantity-input"
                                            name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">Adicionar ao Carrinho</button>
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
