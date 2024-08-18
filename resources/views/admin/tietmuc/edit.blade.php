
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Sửa tiết mục</h1>
        <form action="/edittm/{{ $itemEdit->id_TietMuc }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên tiết mục</label>
              <input type="text" name="tenTietMuc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->tenTietMuc }}">
              
            </div>
			<div class="form-group">
				<label for="exampleInputEmail1">Hình ảnh</label>
				<input type="file" name="hinhAnh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="">
				
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Hình ảnh cũ</label> <br>
				<img style="width: 200px;height: 150px;" src="{{ asset('storage/images/'.$itemEdit->hinhAnh) }}" class="img-fluid" />			
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea class="form-control " id="editor1" name="moTa">{{ $itemEdit->moTa }}</textarea>
				<script> ClassicEditor
					.create(document.querySelector('#editor1'))
					.then(editor => {
						console.log(editor);
					})
					.catch(error => {
						console.error(error);
					}); </script>
	   		</div> 
			<div class="form-group">
				<label>Danh mục</label>

				<select class="form-control" id="exampleFormControlSelect1" name="id_DanhMuc">
					@foreach ($listdanhmuc as $item)
					<option
					@if ($itemEdit->id_DanhMuc == $item->id_DanhMuc)
						{{ 'selected' }}
					@endif
					value="{{ $item->id_DanhMuc }}">{{ $item->tenDanhMuc }}</option>
					@endforeach
				  </select>
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