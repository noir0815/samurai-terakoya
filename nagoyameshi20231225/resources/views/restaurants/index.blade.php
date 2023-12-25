@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories])
        @endcomponent
     </div>

    <div class="col-9">
        <div class="container container-fluid">
            <!-- トップへのリンク -->
            <a href="{{ route('restaurants.index') }}">トップ</a>

            <!-- カテゴリとキーワードが共に指定された場合のリンク -->
            @if (!empty($category) && !empty($keyword))
                ><a href="{{ route('restaurants.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                ><a href="{{ route('restaurants.index', ['keyword' => $keyword]) }}">{{ $keyword }}</a>
                <h2>「{{ $category->name }}」カテゴリの中で「{{ $keyword }}」で検索した結果 {{$total_count}} 件</h2>

            <!-- カテゴリのみが指定された場合のリンク -->
            @elseif (!empty($category))
                ><a href="{{ route('restaurants.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                <h2>「{{ $category->name }}」カテゴリの中で検索した結果 {{$total_count}} 件</h2>

            <!-- キーワードのみが指定された場合のリンク -->
            @elseif (!empty($keyword))
                ><a href="{{ route('restaurants.index', ['keyword' => $keyword]) }}">{{ $keyword }}</a>
                <h2>「{{ $keyword }}」で検索した結果 {{$total_count}} 件</h2>
            @endif
        </div>
        <!-- ソート順の表示 -->
        <div>
            Sort By
            @sortablelink('price', '価格')
            @sortablelink('review', '評価')

        </div>
            <div class="container">
                <form class="row g-1 justify-content-end" action="{{route('restaurants.index')}}" method="GET">
                    <div class="col-auto">
                        <input class="form-control nagoyameshi-header-search-input" name="keyword">
                    </div>
                    <div class="col-auto">
                        <select name="category" class="form-control">
                            <option value="">カテゴリを選択</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ optional($category)->id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn nagoyameshi-header-search-button">
                            <i class="fas fa-search nagoyameshi-header-search-icon"></i>
                        </button>
                    </div>
                </form>
            </div>
        
        <div class="container mt-4">
            @foreach($restaurants as $restaurant)
            <hr>
            <div class="col-12 row">
                <div class="col-6 a">
                    <a href="{{ route('restaurants.show', $restaurant) }}">
                        @if ($restaurant->image !== "")
                        <img src="{{ asset($restaurant->image) }}" class="img-thumbnail">
                        @else
                        <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                        @endif
                    </a>
                </div>
                <div class="col-6 b">
                    <h2>{{ $restaurant->name }}</h2><br>
                    <h3>￥{{ $restaurant->price }}</h3><br>
                    <h3>平均評価:{!! $restaurant->averageRatingWithStars() !!}({{ $restaurant->averageRating() }})</h3><br>
                    <h3>{{ $restaurant->description }}</h3><br>
                </div>
            </div>
            @endforeach
        </div>
        {{ $restaurants->appends(request()->input())->links() }}
    </div>
</div>
@endsection