<div class="container">
    @foreach ($categories as $category)
        <label class="nagoyameshi-sidebar-category-label"><a href="{{route('restaurants.index',['category'=>$category->id])}}">{{ $category->name }}</a></label><br>
    @endforeach
</div>