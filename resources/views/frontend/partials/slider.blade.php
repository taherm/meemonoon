<!-- slider-area start -->
<div class="slider-area" style="overflow: hidden;">
    <!-- slider start -->
    <div class="slider">
        <div id="topSlider" class="nivoSlider nevo-slider">
            @foreach($sliders as $slider)
                <a href="{{ str_replace(URL('/'),'',$slider->url) }}">
                    <img src="{{asset('img/uploads/large/'.$slider->image_path)}}" alt="{{ $slider->caption }}" style="display: inline !important;">
                </a>
            @endforeach
        </div>
    </div>
    <!-- slider end -->
</div>
<!-- slider-area end -->