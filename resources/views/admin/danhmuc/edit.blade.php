
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Sửa danh mục</h1>
        <form action="/editdm/{{ $itemEdit->id_DanhMuc }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục</label>
              <input required type="text" name="tendm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{ $itemEdit->tenDanhMuc }}">
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