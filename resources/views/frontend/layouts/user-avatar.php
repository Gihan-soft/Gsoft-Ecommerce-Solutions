@if(auth()->user()->photo)
        <img src="{{auth()->user()->photo}}" alt="">
        @else
        <img src="{{Helper::userDefaultImage()}}" alt="">
@endif