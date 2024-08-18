@include('template.public.header')



<section class="filmoja-slider-area fix">
    <div class="filmoja-slide owl-carousel">

    </div>
</section>
<section class="main-slider">

    <div class="main-slider-carousel owl-carousel owl-theme">


        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/ea11300c6f75c42b9d64.jpg" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/Slide/a8383f516028cb769239.jpg" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/Slide/113ced39b240191e4051.jpg" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/Slide/1c310f2a5053fb0da242.jpg" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/s%E1%BB%9Bm%20khuya%20-%20web.png" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/th%E1%BB%A9%205%20-%20web.png" />
        </div>
        <div class="slide">
            <img src="/Areas/Admin/Content/Fileuploads/images/th%E1%BB%A9%203%20-%20web.png" />
        </div>
        <div class="slide">
            <img
                src="/Areas/Admin/Content/Fileuploads/images/th%E1%BB%A9%202%20h%E1%BA%B1ng%20tu%E1%BA%A7n%20-%20web.png" />
        </div>
        <div class="slide">
            <img
                src="/Areas/Admin/Content/Fileuploads/images/th%E1%BB%A9%202%20cu%E1%BB%91i%20th%C3%A1ng%20-%20web.png" />
        </div>
    </div>

</section>

<section class="movie-page-section">
    <div class="auto-container">
        <!-- MixitUp Galery -->
        <div class="mixitup-gallery">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{session::get('success')}}
                </div>
            @endif
            <form action="/timkiemtietmuc" method="POST">
                @csrf
                <div class="input-group mb-3" style="margin-left:630px;width: 370px;">
                    <input type="text" name="tk" class="form-control" style="margin-left: -76px;" placeholder="Tên tiết mục">
                    <div class="input-group-append">
                      <button class="btn btn-success" style="border-radius: unset;" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <div class="tab-content">
                <div id="current" class="tab-pane in active" style="display: flow-root;">
                    {{-- item --}}
                    @if (!empty($listtk))
                        @foreach ($listtk as $item)
                            <div class="price-block col-xl-3 col-lg-3 col-md-4 col-sm-6"
                                style="position: relative;display:block;height: 350px;width: 280px;">
                                <div class="news-block-two" style="">
                                    <div class="inner-box" style="box-shadow:none">
                                        <div class="image" style="padding:0">
                                            <a
                                                href="/chitiet/{{ $item->id_TietMuc }}"><img style="width: 280px;height: 200px;"
                                                    src="{{ route('image.show', ['imageName' => $item->hinhAnh]) }}"
                                                    alt="" /></a>
                                            
                                        </div>
                                        <div class="lower-content">

                                            <h4 style="text-align: center;height: 85px;"><a
                                                    href="/chitiet/{{ $item->id_TietMuc }}">{{ $item->tenTietMuc }}</a></h4>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @if(empty($listtietmucbyiddm))
                            @foreach ($listtietmuc as $item1)
                                <div class="price-block col-xl-3 col-lg-3 col-md-4 col-sm-6"
                                    style="position: relative;display:block;height: 350px;width: 280px;">
                                    <div class="news-block-two" style="">
                                        <div class="inner-box" style="box-shadow:none">
                                            <div class="image" style="padding:0">
                                                <a
                                                    href="/chitiet/{{ $item1->id_TietMuc }}"><img style="width: 280px;height: 200px;"
                                                        src="{{ route('image.show', ['imageName' => $item1->hinhAnh]) }}"
                                                        alt="" /></a>
                                                {{-- <p
                                                    style="position: absolute; top: 5px; right: 5px; width: 40px; height: 25px; background: #f82525; text-align: center; border-radius: 3px; color: #ffffff; line-height: 25px; ">
                                                    T18</p> --}}
                                            </div>
                                            <div class="lower-content">

                                                <h4 style="text-align: center;height: 85px;"><a
                                                        href="/chitiet/{{ $item1->id_TietMuc }}">{{ $item1->tenTietMuc }}</a></h4>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                            
                        @else
                            @foreach ($listtietmucbyiddm as $item2)
                                <div class="price-block col-xl-3 col-lg-3 col-md-4 col-sm-6"
                                    style="position: relative;display:block;height: 350px;width: 280px;">
                                    <div class="news-block-two" style="">
                                        <div class="inner-box" style="box-shadow:none">
                                            <div class="image" style="padding:0">
                                                <a
                                                    href="/chitiet/{{ $item2->id_TietMuc }}"><img style="width: 280px;height: 200px;"
                                                        src="{{ route('image.show', ['imageName' => $item2->hinhAnh]) }}"
                                                        alt="" /></a>
                                                
                                            </div>
                                            <div class="lower-content">

                                                <h4 style="text-align: center;height: 85px;"><a
                                                        href="/chitiet/{{ $item2->id_TietMuc }}">{{ $item2->tenTietMuc }}</a></h4>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                    
                {{-- endif2 --}}
                    
                    
                </div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</section>
<!-- End Services Section -->
<!-- Pricing Section -->

<!-- End Pricing Section -->
<!-- Facility Section -->

<section class="facility-section" style="background-image: url(/Content/img/background/pattern-6.png)">
    <div class="auto-container">
        <!-- Sec Title -->
        
    </div>
</section>
<!-- End Facility Section -->
<div class="modal fade" id="adsImageModal" role="dialog" style="background: rgba(51, 51, 51, 0.46);">
    <div class="modal-dialog" style="width:95%;max-width:95%;margin:100px auto;">
        <!-- Modal content-->
        <div class="modal-content" style="    max-width: 1000px;margin: 0 auto;">
            <div class="modal-body" style="padding:0">
                <img id="adsImage" style="    border: 3px solid #000;border-radius: 3px;width:100%"
                    src="http://www.riocinemas.vn/Areas/Admin/Content/Fileuploads//Content/img/POSTER/z2950019928727_f1e225b7c12d6c9e9cd4af710d7e685f.jpg" />
            </div>
        </div>
    </div>
</div>

@include('template.public.footer')
