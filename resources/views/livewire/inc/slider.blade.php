<div>
    @if($sliders!=null)
    <section class="ftco-section" id="home" style="margin-top: -115px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-hero">
                        <div class="featured-carousel owl-carousel">
                            @foreach($sliders as $slider)
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-center justify-content-center"
                                         style="background-image: url({{ asset('storage/'.$slider['image']) }});">
                                        <div class="text text-center">
                                            <h2>{{ $slider['title_one'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="my-5 text-center">
                            <ul class="thumbnail">
                                @php $sl=0 @endphp
                                @foreach($sliders as $slider)
                                    @php ++$sl; @endphp
                                <li class="{{ ($sl==1) ? 'active img' : '' }}"><a href="#"><img src="{{ asset('storage/'.$slider['image']) }}" alt="Image" class="img-fluid"></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
