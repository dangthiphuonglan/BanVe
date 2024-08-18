
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Thêm người dùng</h1>
        <form action="/postaddnguoidung" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Họ tên</label>
              <input type="text" name="hoTen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="" >
              
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="" >
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" name="sdt" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ngày sinh</label>
                <input type="date" name="ngaySinh" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="diaChi" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phân quyền</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option value="1">Quản trị viên</option>
                    <option value="2">Người chỉnh sữa</option>
                </select>
            </div>
			<div class="form-group col-md-12">
				{{-- <label>Content</label> --}}
				{{-- <textarea class="form-control " id="editor1" name="editor1"></textarea>
				<script> ClassicEditor
					.create(document.querySelector('#editor1'))
					.then(editor => {
						console.log(editor);
					})
					.catch(error => {
						console.error(error);
					}); </script> --}}
	        </div> 
            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
	</div>

	<section class="footer-section">
		@include('template.admin.footer')
	</section>
	<!-- FOOTER SECTION END-->
	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
	<!-- CORE JQUERY  -->
	<!-- BOOTSTRAP SCRIPTS  -->
	<!-- CUSTOM SCRIPTS  -->


</body>
</body>

</html>