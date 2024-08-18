
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
        <h1>Thêm vé</h1>
        <form action="/postaddve" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
				<label>Lịch chiếu</label>
				
				<select class="form-control" id="exampleFormControlSelect1" name="id_lichchieu">
					@foreach ($listLichChieu as $item)
					@php
					// $lichchieu = App\Http\Controllers\mainController::getLichChieuById($item->id_lichchieu);
						$tietmuc = App\Http\Controllers\mainController::getTietMucById($item->id_TietMuc);
					@endphp
					<option value="{{ $item->id }}">{{ $tietmuc->tenTietMuc }} - {{ $item->created_at->format('d/m/Y H:i') }}</option>
					@endforeach
				  </select>
			</div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số lượng vé bán</label>
              <input type="number" name="soLuongBan" required class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="" value="">
              
            </div>

			<div class="form-group">
				<label for="exampleInputEmail1">Giá vé bán (VNĐ)</label>
				<input type="number" name="giaVe" class="form-control" required id="exampleInputEmail1" aria-describedby="" placeholder="" value="">
				
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