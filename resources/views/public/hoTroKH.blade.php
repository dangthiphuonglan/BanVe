@include('template.public.header')

<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Content Side -->
            <div class="content-side col-lg-3 col-md-6 col-sm-12">
                <div class="list-sidebar margin-top">
                    <ul class="left-wibget-tag">
                        <li><a href="/cine.html">RẠP CHIẾU PHIM</a></li>
                        <li><a href="/online.html">TRỰC TUYẾN</a></li>
                        <li><a href="/ticket-price.html">BẢNG GIÁ VÉ</a></li>
                        <li><a href="/combo-price.html">BẢNG GIÁ BẮP NƯỚC</a></li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-9 col-md-6 col-sm-12" style="padding: 10px !important; box-shadow: 0px 0px 5px #33333330;">
                <aside class="sidebar sticky-top" style="padding:0 !important">
                    <div class="accordion" id="accordionExample">


                    </div>
                </aside>
            </div>

        </div>
    </div>
</section>

@include('template.public.footer')