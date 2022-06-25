@php use Carbon\Carbon; @endphp

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    @forelse ($viewData["orders"] as $order)
        <div class="card mb-4">
            <div class="card-header">
                Pedido #{{ $order->id }}
            </div>
            <div class="card-body">
                <b>Data:</b> {{ Carbon::parse($order->created_at)->diffForHumans() }}<br />
                <b>Total:</b> ${{ $order->total }}<br />
                <table class="table table-bordered table-striped text-center mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a class="link-success"
                                        href="{{ route('product.show', $item->product->id) }}">
                                        {{ $item->product->name }}
                                    </a>
                                </td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
       
    @empty
        <div class="alert alert-danger" role="alert">
            Você não tem compras registradas na nossa Loja Virtual =(.
        </div>
    @endforelse
@endsection
