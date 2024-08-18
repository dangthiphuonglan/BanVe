
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Sửa</h1>
        <form action="/posteditnd/{{$itemEdit->id_User }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Họ tên</label>
              <input type="text" name="hoTen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->hoTen }}">
              
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" name="sdt" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->sdt }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ngày sinh</label>
                <input type="date" name="ngaySinh" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->ngaySinh }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="diaChi" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->diaChi }}">
            </div>
            @if ($itemLogin->role == 1 & $itemEdit->role != 3)
                <div class="form-group">
                    <label for="exampleInputEmail1">Phân quyền</label>
                    <select class="form-control" required id="exampleFormControlSelect1" name="role">
                        <option
                        @if ($itemEdit->role == 1)
                            selected
                        @endif
                        value="1">Quản trị viên</option>
                        <option 
                        @if ($itemEdit->role == 2)
                            selected
                        @endif
                        value="2">Người chỉnh sửa</option>
                    </select>
                </div>
            @endif
            
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
            <button type="submit" class="btn btn-primary">Sửa</button>
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