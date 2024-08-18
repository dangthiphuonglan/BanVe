@include('template.public.header')

<section class="shop-detail-section" style="margin-bottom: 150px">
    <div class="auto-container" style="width: 750px;">

        <div class=" book-content" style="margin-top: 20px;margin-bottom: 50px; display: flex;
        flex-direction: column;
        align-content: space-around;">
            <div style="width: 500px;text-align: center">
                <h1>THÔNG TIN HÓA ĐƠN</h1>
            </div>
            
            <form action="/thanhtoan" method="post" enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; text-align: center;align-items: center">
                    <ul>
                        <li style="padding: 5px 0;font-size:18px"><b>Họ tên:</b>{{ $itemLogin->hoTen }}</li>
                        @php
                            $tietmuc = App\Http\Controllers\mainController::getTietMucById($lichChieu->id_TietMuc);
                        @endphp
                        <li style="padding: 5px 0;font-size:18px"><b>Tên tiết mục:</b>{{ $tietmuc->tenTietMuc }}</li>
                        
                        <li style="padding: 5px 0;font-size:18px"><b>Số lượng: </b>{{ $hoadon->soLuongVeMua }}</li>
                        <input type="text" hidden name="soLuongVeMua" value="{{ $hoadon->soLuongVeMua }}">
                        <li style="padding: 5px 0;font-size:18px"><b>Tổng tiền:</b>
                            {{ number_format($hoadon->thanhTien) }}VNĐ
                        </li>
                        <input type="text" hidden name="thanhTien" value="{{ $hoadon->thanhTien }}">
                        <li style="padding: 5px 0;font-size:18px"><b>Hình ảnh xác nhận (Thanh toán trực tuyến):</b>
                            <input required style="margin-left: 150px" name="hinhAnh" type="file" >
                        </li>
                        <input type="text" hidden name="idVe" value="{{ $ve->id_Ve }}">
                        
                    </ul>
                </div>
                <div style="width: 165px;margin-left: 170px">
                    <button type="submit" style="background: none;width: 150px" onclick="">
                        <p
                            style=" width: 100%; max-width: 100%; height: 50px; border-radius: 25px; margin: 0; background: #18a000; text-align: center; line-height: 50px; position: relative; top: 45%; color: #fff; font-size: 18px; text-transform: uppercase;">
                            Hoàn thành</p>
                    </button>
                </div>
            </form>
            
            
        </div>
        <!--End Product Info Tabs-->

    </div>

</section>

@include('template.public.footer')
