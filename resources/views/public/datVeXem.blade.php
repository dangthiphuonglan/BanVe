@include('template.public.header')

<section class="shop-detail-section" style="margin-bottom: 150px; height: 480px;">
    <div class="auto-container">
        @if (Session::get('success'))
                <div class="alert alert-warning" role="alert" style="color: red">
                {{session::get('success')}}
                </div>
            @endif
        <div class="row clearfix" style="margin-bottom: 80px">
            
            
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
                                            <img src="{{ route('image.show', ['imageName' => $tietmucbyid->hinhAnh]) }}"
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
                    
                    <p
                        style="background: #ffe53d;    width: 35px;    height: 35px;    text-align: center;    line-height: 35px;    border-radius: 5px;    color: black;    font-weight: bold;    letter-spacing: 2px;    box-shadow: 1px 1px 5px 2px #4e4e54;">
                        </p>
                    <hr>

                    <!-- Shop Form -->
                    <!-- Shop List -->


                </div>
            </div>

        </div>
        <form action="redirect" method="POST"> 
            @csrf
            <div class="col-lg-12 book-content" style="margin-top: 20px;margin-bottom: 50px">
            
                    <div style="">
                        <img style="height: 90px" src="{{ route('image.show', ['imageName' => $tietmucbyid->hinhAnh]) }}">
                    </div>
                    <div>
                        <ul>
                            <li style="padding: 5px 0;"><b>Tiết Mục:</b> {{ $tietmucbyid->tenTietMuc }}</li>
                            <li style="padding: 5px 0;"><b>Suất: </b>{{ $lichChieuById->created_at->format('d-m-Y H:i') }}</li>
                            <li style="padding: 5px 0;"><b>Thể loại:</b>
                                @php
                                    $danhmuc = App\Http\Controllers\mainController::getDanhMucById($tietmucbyid->id_DanhMuc);
                                @endphp
                                {{ $danhmuc->tenDanhMuc }}
                            </li>

                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li style="padding: 5px 0;"><b>Số lượng vé mua:</b>
                                <input required min="1" type="number" style="border: 0.5px black solid;border-radius: 20px;padding-left: 5px" name="soLuongVeMua" id="" value="1">
                            </li>
                            <li style="padding: 5px 0;">
                                <p id="total_seat_money" style="display:inline-block"></p>
                            </li>
                            <li style="padding: 5px 0;"><b>Tiền vé:</b>
                                <p id="total_money" style="display:inline-block">{{ number_format($ve->giaVe) }}VNĐ</p>
                            </li>
                            <li style="padding: 5px 0;"><b>Số lượng vé còn:</b>
                                <p id="total_money" style="display:inline-block">{{ number_format($ve->soLuongCon) }} vé</p>
                            </li>
                            <input type="text" hidden name="idVe" value="{{ $ve->id_Ve }}">
                        </ul>
                    </div>
                    <div style="width: 400px; margin-left: 800px;margin-top: -45px">
                            <button type="submit" name="2" style="background:none; width: 150px;margin-top: 40px">
                                <p
                                    style=" width: 100%; max-width: 100%; height: 50px; border-radius: 25px; 
                                    margin: 0; background: #fc1b1b; text-align: center; ; position: relative; top: 45%; color: #fff; 
                                    font-size: 15px; text-transform: uppercase;">
                                    Xác nhận bằng hình ảnh</p>
                            </button>
                            <button type="submit" name="redirect" style="background:none; width: 150px;margin-top: 40px">
                                <p
                                    style=" width: 100%; max-width: 100%; height: 50px; 
                                    border-radius: 25px; margin: 0; background: #1b4cfc; text-align: center;  position: relative; 
                                    top: 45%; color: #fff; font-size: 15px; text-transform: uppercase;">
                                    Thanh toán qua VNPay</p>
                            </button>
                            
                    </div>
                
            </div>
        </form>
        <!--End Product Info Tabs-->

    </div>

</section>

@include('template.public.footer')
