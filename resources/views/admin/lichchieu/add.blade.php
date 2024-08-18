
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Thêm lịch diễn</h1>
        <form action="/postaddLC" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
				<label>Lên lịch diễn</label>
				
				<select class="form-control" id="exampleFormControlSelect1" name="id_TietMuc">
					@foreach ($listTietMuc as $item)
					<option value="{{ $item->id_TietMuc }}">{{ $item->tenTietMuc }} </option>
					@endforeach
				  </select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Thời gian</label>
				<input type="datetime-local" required name="created_at" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="" value="" oninvalid="this.setCustomValidity('Witinnovation')"
       onvalid="this.setCustomValidity('')">
				
			  </div>
			
			<div class="form-group">
			<label for="exampleInputEmail1">Giá vé</label>
			<input type="number" name="giaVe" required class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="" value="" >
			
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