@include('template.public.header')


<section class="shop-detail-section">
    <div class="auto-container">
        <div class="row clearfix">

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
                        P</p>
                    <hr>

                    <!-- Shop Form -->
                    <!-- Shop List -->
                    

                </div>
            </div>

        </div>

        <div class="content" style="margin: 100px">
            <span class="time"
                style="background: #444444; display: inline-flex; width: 100%; height: 100%; align-content: center; align-items: center; min-height: 50px; margin-bottom: 5px ">21/03/2024</span>
            <div class="clearfix" style="clear:both"></div>
            <span class="time past item" style="display: inline-flex;    margin-bottom: 10px;">10:50</span>
            <a href="/dat-ve.html?film_name=ĐÀO, PHỞ VÀ PIANO (T13)&amp;time_id=147c08ea-abec-4228-9347-0f467bd14f57&amp;date=21/03/2024&amp;format=Lồng Tiếng&amp;room=02&amp;image=/Areas/Admin/Content/Fileuploads/images/poster%20web/dao-pho-va-piano.jpg&amp;time=17:05&amp;server_id=2&amp;limit_age=T13"
                style="display: inline-flex;margin-bottom: 3px;"><span class="time item">17:05</span></a>
            <hr>
        </div>
        <!--End Product Info Tabs-->

    </div>
</section>
@include('template.public.footer')
