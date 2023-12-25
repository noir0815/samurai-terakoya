@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <span>
                <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
            </span>
            <h1>予約一覧</h1>
            <hr>

            <div class="row">
            @foreach ($reservations as $reservation)
            <form method="get" action="{{route('restaurants.show',$reservation->restaurant->id)}}">

            <div class="col-md-7 mt-2">
                <div class="d-inline-flex">
                        <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-25">
                    <div class="container mt-3">
                        <p>店舗名　{{$reservation->restaurant->name}}</p>
                        <p>予約日時　{{$reservation->date}}  {{$reservation->time}}</p>
                        <p>予約人数　{{$reservation->num_of_ppl}}名</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-end">
                <button type="submit" class="btn nagoyameshi-favorite-add-cart">店舗詳細</button>
            </div>
            @endforeach
            <hr>
            </div>
        </div>
    </div>
</div>
@endsection