@extends('layouts.app')

@section('content')
<div class="top-body">
    <div class="top-search-container">
        <form class="row g-1" action="{{route('restaurants.index')}}" method="GET">
            <div class="col-auto">
                <input class="form-control nagoyameshi-header-search-input" name="keyword">
            </div>
            <div class="col-auto">
                <select name="category" class="form-control">
                    <option value="">カテゴリを選択</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
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
</div>
<script>
    // 画面スクロール時に検索バーの位置を中央に保持
    window.addEventListener('scroll', function() {
      var searchBarContainer = document.querySelector('.search-bar-container');
      searchBarContainer.style.top = Math.max(0, 50 - window.scrollY * 0.1) + '%';
    });
  </script>
@endsection