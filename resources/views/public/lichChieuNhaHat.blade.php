@include('template.public.header')

<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Content Side -->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="blog-classic">
                    <div class="col-sm-12">
                        <div class="browse-option-box"
                            style=" background: transparent; padding: 10px; width: 100%; display: block; margin-bottom: 5px; border: 1px solid #fc1b1b;">
                            <h3 style="width: 100%; text-align: center; color: #fc1b1b;margin:0">NHÀ HÁT TUỒNG NGHUYỄN HIỄN DĨNH
                            </h3>
                            <p style="width: 100%; text-align: center; color: #22272b;">0347.329.357</p>
                            <p style="width: 100%; text-align: center; color: #22272b;">155 Phan Châu Trinh, Phước Ninh, Q. Hải Châu, Đà Nẵng</p>
                        </div>

                        <div class="tabs movies ui-tabs ui-corner-all ui-widget ui-widget-content" id="schedule-tabs">
                            <div class="tv-panel-list">
                                <div class="tv-tab">
                                    <ul class="nav nav-pills tv-tab-switch schedule-list" id="pills-tab" role="tablist">
                                        @for ($i = 0; $i < count($ngay); $i++)
                                            <li class="nav-item" style="margin-right: 25px">
                                                <a class="nav-link show" id="pills-popular-tab-0" data-toggle="pill"
                                                    href="/lichngay/{{ date_format($ngay[($i)],'d-m-Y') }}" role="tab" aria-controls="pills-popular-0"
                                                    aria-selected="true">
                                                    <p
                                                        style="width: 100%; text-align: center; padding: 0 15px; color: #f37737; font-weight: 600; ">
                                                        {{ $thu[date_format($ngay[($i)],'w')] }}</p>
                                                    <p
                                                        style="width: 100%; text-align: center; padding: 5px 15px; color: #2b2b31; ">
                                                        {{ $ngay[$i]->format('d-m-Y') }}</p>
                                                </a>
                                            </li>
                                        @endfor
                                        
                                        
                                    </ul>
                                </div>
                                @if (Session::get('success'))
                                    <div class="alert alert-warning" role="alert" style="margin-top: 10px; margin-bottom: 10px">
                                    {{session::get('success')}}
                                    </div>
                                @endif
                                <div class="tab-content" id="pills-tabContent">
                                    @foreach ($listLichChieu as $item)
                                        @php
                                            $tietmuc = App\Http\Controllers\MainController::getTietMucById($item->id_TietMuc);
                                        @endphp
                                        <div class="tab-pane fade show  active" id="pills-popular-0" role="tabpanel"
                                            aria-labelledby="pills-popular-tab-0">
                                            <div class="tab-movies movie-list-box">
                                                <div>
                                                    <div class="single-movie-list">
                                                        <div class="single-movie-list-left col-lg-3 col-md-4 col-sm-12">
                                                            <a href="/datve/{{ $item->id }}">
                                                                <img src="{{ asset('storage/images/'.$tietmuc->hinhAnh) }}"
                                                                    alt="top movie">
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="single-movie-list-right  col-lg-9 col-md-8 col-sm-12">

                                                            <h3><a href="/datve/{{ $item->id}}">{{ $tietmuc->tenTietMuc}}</a>
                                                            </h3>
                                                            <ul>
                                                                <li class="rating"></li>
                                                                <li class="rating"></li>
                                                            </ul>
                                                            <p class="list-genre"></p>

                                                            <div class="movie-list-info">
                                                                
                                                            </div>

                                                            <div class="col-md-12 col-sm-12" style="padding:0">
                                                                <hr class="space-1">
                                                                <a href="/datve/{{ $item->id }}"
                                                                    style="display: inline-flex;    margin-bottom: 10px;"><span
                                                                        class="time item">{{ date('H:i d-m', strtotime($item->created_at)) }}</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="top-action">

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="tab-pane fade" id="pills-popular-4" role="tabpanel"
                                        aria-labelledby="pills-popular-tab-4">
                                        <div class="tab-movies movie-list-box">
                                            <div class="">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-popular-5" role="tabpanel"
                                        aria-labelledby="pills-popular-tab-5">
                                        <div class="tab-movies movie-list-box">
                                            <div class="">


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Side -->

        </div>
    </div>
</section>
@include('template.public.footer')
