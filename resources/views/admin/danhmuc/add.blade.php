
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Thêm danh mục</h1>
        <form action="/postadddanhmuc" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục</label>
              <input type="text" required name="tendm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="">
              
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