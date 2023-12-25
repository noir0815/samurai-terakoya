@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    {{$restaurant->name}}
                </h1>
                <p class="">
                    {{$restaurant->description}}
                </p>
                <hr>
                <p class="d-flex align-items-end">
                    ￥{{$restaurant->price}}(税込)
                </p>
                <hr>
            </div>
            @auth
            <form method="POST" action="{{route('reservations.store')}}" class="m-3 align-items-end">
                @csrf
                <h5>日付</h5>
                <select name="date" class="form-control" id="date">
                    <option value="">選択してください</option>
                    @foreach($dates as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <h5>時間</h5>
                <select name="time" class="form-control" id="time">
                    <option value="">選択してください</option>
                    @foreach($times as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <h5>人数</h5>
                <select name="num_of_ppl" class="form-control" id="num_of_ppl">
                    <option value="">選択してください</option>
                    @foreach($number_of_people as $num_of_ppl)
                        <option value="{{$num_of_ppl}}">{{$num_of_ppl}}人</option>
                    @endforeach
                </select>
                <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                <div class="btn nagoyameshi-submit-button" data-bs-toggle="modal" data-bs-target="#buy-confirm-modal">購入を確定する</div>
                <!-- モーダルウィンドウ -->
                <div class="modal fade" id="buy-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="staticBackdropLabel">予約を確定しますか？</h5>
                             <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn nagoyameshi-favorite-button border-dark text-dark" data-bs-dismiss="modal">閉じる</button>
                             <button type="submit" class="btn nagoyameshi-submit-button">予約</button>
                         </div>
                     </div>
                 </div>
             </div>
            </form>
            @endauth
        </div>  
    </div>
</div>
@endsection