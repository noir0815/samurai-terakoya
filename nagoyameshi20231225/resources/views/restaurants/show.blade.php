@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
        @if ($restaurant->image)
             <img src="{{ asset($restaurant->image) }}" class="w-100 img-fluid">
             @else
             <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
             @endif
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    {{$restaurant->name}}
                </h1>
                <!-- ここに平均評価を表示 -->
                <h3 class="review-score-color">
                    {!! $restaurant->averageRatingWithStars() !!}
                    ({{ $restaurant->averageRating() }})
                </h3>

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
            <form method="POST" action="{{route('restaurants.reservation',$restaurant->id)}}" class="m-3 align-items-end">
                @csrf
                <input type="hidden" name="id" value="{{$restaurant->id}}">
                <input type="hidden" name="name" value="{{$restaurant->name}}">
                <input type="hidden" name="price" value="{{$restaurant->price}}">

                <input type="hidden" name="weight" value="0">
                <div class="row">
                    <div class="col-7">
                        <button type="submit" class="btn nagoyameshi-submit-button w-100">
                            <i class="fas fa-shopping-cart"></i>
                            予約する
                        </button>
                    </div>
                    <div class="col-5">
                    @if($restaurant->isFavoritedBy(Auth::user()))
                         <a href="{{ route('restaurants.favorite', $restaurant) }}" class="btn nagoyameshi-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り解除
                         </a>
                         @else
                         <a href="{{ route('restaurants.favorite', $restaurant) }}" class="btn nagoyameshi-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                         @endif
                    </div>
                </div>
            </form>
            @endauth
        </div>

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">カスタマーレビュー</h3>
        </div>

        <div class="offset-1 col-10">
        <div class="row">
        @foreach($reviews as $review)
    <div class="offset-md-5 col-md-5">
        {!! $restaurant->ratingStars($review->score) !!}
        <p class="h3">{{$review->content}}</p>
        <label>{{$review->created_at}} {{$review->user->name}}</label>
    </div>
@endforeach

             </div><br />
 
            @auth
            <div class="row">
                <div class="offset-md-5 col-md-5">
                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        @error('score')
                        <strong>評価を選択してください</strong><br>
                        @enderror
                        @error('content')
                            <strong>レビュー内容を入力してください</strong><br>
                        @enderror
                        <h5>評価</h5>
                        <select name="score" class="form-control m-2">
                            <option value="">選択してください</option>
                            <option value="5" class="review-score-color">★★★★★</option>
                            <option value="4" class="review-score-color">★★★★</option>
                            <option value="3" class="review-score-color">★★★</option>
                            <option value="2" class="review-score-color">★★</option>
                            <option value="1" class="review-score-color">★</option>
                        </select>
                        <h5>レビュー内容</h5>
                        <textarea name="content" class="form-control m-2"></textarea>
                        <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                        <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection