<!-- banner-area start -->
{{--<div class="banner-area fix">--}}
    <div class="container">
        <div class="row">
            @foreach($ads as $ad)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <a href="{{ $ad->url }}"><img src="{{ asset('img/uploads/large/'.$ad->image_path) }}" alt="{{ $ad->caption }}"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
{{--</div>--}}
<!-- banner-area end -->