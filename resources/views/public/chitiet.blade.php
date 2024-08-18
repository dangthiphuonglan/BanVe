@include('template.public.header')


<section class="shop-detail-section">
    <div class="auto-container">
        <div class="row clearfix">
            @php
				$listdanhmuc = App\Http\Controllers\mainController::getAllDanhMuc();
				$listlichchieu = App\Http\Controllers\mainController::getAllLichChieu();
                $dem = 0;
			@endphp
            <!-- Images Column -->
            <div class="images-column col-lg-4 col-md-4 col-sm-12">
                <div class="inner-column">
                    <!-- Shop Gallery Tabs -->
                    <div class="shop-gallery-tabs">
                        <!-- Gallery Tabs -->
                        <div class="gallery-tabs tabs-box">
                            <!-- Tabs Container -->
                            <div class="tabs-content">

                                <!-- Tab / Active Tab -->
                                <div class="tab active-tab" id="gallery-one">
                                    <div class="content">
                                        <div class="image">
                                            <img style="width: 250px;height: 150px;" src="{{ route('image.show', ['imageName' => $tietmucbyid->hinhAnh]) }}"{{-- {{ route('image.show', ['imageName' => $tietmucbyid->hinhAnh]) }} --}}
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-8 col-sm-12">
                <div class="inner-column">
                    <h3>{{ $tietmucbyid->tenTietMuc }}<i style="font-size:13px"></i></h3>
                    {{-- <p>Cartoon, Hành d?ng, hài - 2D Sub</p> --}}
                    <p
                        style="background: #ffe53d;    width: 205px;    height: 35px;    text-align: center;    line-height: 35px;    border-radius: 5px;    color: black;    font-weight: bold;    letter-spacing: 2px;    box-shadow: 1px 1px 5px 2px #4e4e54;">
                        @foreach ($listdanhmuc as $itemDM)
                            @if($tietmucbyid->id_DanhMuc == $itemDM->id_DanhMuc)
                                {{ $itemDM->tenDanhMuc }}
                            @endif
                        @endforeach
                    </p>
                    <hr>


                </div>
                <div class="col-md-12 col-sm-12" style="padding:0;margin-left: 50px">
                    
                    
                        @foreach ($listlichchieu as $itemLC)
                            @if ($itemLC->id_TietMuc == $tietmucbyid->id_TietMuc)
                            <a href="/datve/{{ $itemLC->id }}"
                                style="display: inline-flex;    margin-bottom: 10px;"><span
                                    class="time item">
                                        {{ date('H:i d-m', strtotime($itemLC->created_at)) }}
                                    </span></a>
                                @php
                                    $dem++
                                @endphp
                            @endif
                        @endforeach
                        @if ($dem == 0)
                            <p>Chưa có lịch diễn</p>
                        @endif
                </div>
            </div>

        </div>

        <!--Product Info Tabs-->
        
        <div class="product-info-tabs">
            <!--Product Tabs-->
            <div class="prod-tabs tabs-box">

                <!--Tab Btns-->
                <ul class="tab-btns tab-buttons clearfix">
                    <li data-tab="#prod-details" class="tab-btn active-btn">Mô tả</li>
                </ul>

                <!--Tabs Container-->
                <div class="tabs-content">

                    <!-- Tab / Active Tab -->
                    <div class="tab active-tab" id="prod-details">
                        <div class="content" style="">
                            {!! $tietmucbyid->moTa !!}
                        </div>
                    </div>



                    <ul class="accordion-box style-two">

                        <!--Block-->

                        <!--Block-->
                        <!--Block-->


                    </ul>
                    <script>
                        function collapseTheater(id) {
                            var theaterDiv = document.getElementById(id);
                            if (theaterDiv.style.height == "auto") {
                                theaterDiv.style.height = "100px";
                                $($(theaterDiv).find("i")[0]).attr("class", "fa fa-angle-double-up");
                            } else {
                                theaterDiv.style.height = "auto";
                                $($(theaterDiv).find("i")[0]).attr("class", "fa fa-angle-double-down");
                            }
                        }
                    </script>


                </div>
            </div>

        </div>
        
        <!--End Product Info Tabs-->

    </div>
</section>
@include('template.public.footer')
