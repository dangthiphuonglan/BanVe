@include('template.public.header')

    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box">
                            <h4>Thông tin liên hệ</h4>
                        </div>
                        <div class="lower-box">
                            <ul class="info-list">
                                <li>
                                    <span class="icon"><i class="fi fi-sr-marker" style="color: black"></i></span>
                                    Phan Châu Trinh, Phước Ninh, Q. Hải Châu, Đà Nẵng
                                </li>
                                <li>
                                    <span class="icon"><i class="fi fi-sr-phone-call" style="color: black"></i></span>
                                    <a href="tel:0347.329.357">0347.329.357</a><br>
                                </li>
                                <li>
                                    <span class="icon"><i class="fi fi-sr-envelope" style="color: black"></i></span>
                                    <a href="mailto:support@riocinemas.vn">tranphunguyenle30@gmail.com</a><br>
                                    {{-- <a href="www.riocinemas.vn">www.riocinemas.vn</a> --}}
                                </li>
                            </ul>
                            <!-- Social Box -->
                            <ul class="social-box">
                                
                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Map Column -->
                <div class="map-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Map Outer-->
                        <div class="map-outer">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0230980255665!2d108.2175486742631!3d16.064291139571868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219cd2f673731%3A0xe4cdc786ff63f18c!2zTmjDoCBow6F0IFR14buTbmcgTmd1eeG7hW4gSGnhu4NuIETEqW5o!5e0!3m2!1svi!2s!4v1704697589946!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Contact Form Box -->
            <div class="contact-form-box">
                <!-- Form Title Box -->
                <div class="form-title-box">
                    <h3>Gửi thư liên hệ</h3>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <form method="post" action="postlienhe" id="contact-form">
                        @csrf
                        <div class="row clearfix">

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="hoTen" id="cName" placeholder="Họ tên" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" id="cEmail" placeholder="Email" required>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="sdt" placeholder="Phone" id="cPhone" required>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea class="darma" name="noiDung" id="cContent" placeholder="Nội dung cần liên hệ..."></textarea>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                <button class="theme-btn btn-style-four" type="submit" onclick="sendContact()" name="submit-form"><span class="txt">Send</span></button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- End Contact Form Box -->

        </div>
    </section>

@include('template.public.footer')