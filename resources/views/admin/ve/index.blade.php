
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
		@if (Session::get('success'))
			<div class="alert alert-success" role="alert">
			{{session::get('success')}}
			</div>
		@endif
		<a href="/addve"><button type="button" class="btn btn-success">Thêm</button></a> <br><br>
      	<table class="table" border="1">
			<thead>
			<tr>
				<th scope="col" class="tieude">STT</th>
				<th scope="col"class="tieude">Tên tiết mục</th>
				<th scope="col"class="tieude">Thời gian</th>
				<th scope="col"class="tieude">Số lượng vé còn</th>
				<th scope="col" class="tieude">Giá vé</th>
				<th scope="col" class="tieude">Chức năng</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($listVe as $item)
				@php
					$lichchieu = App\Http\Controllers\mainController::getLichChieuById($item->id_lichchieu);
					$tietmuc = App\Http\Controllers\mainController::getTietMucById($lichchieu->id_TietMuc);
				@endphp
				<tr>
				<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
				<td>{{ $tietmuc->tenTietMuc }}</td>
				<td>{{ $lichchieu->created_at->format("d-m-Y H:i") }}</td>
				<td>{{ $item->soLuongCon }}</td>
				{{-- <td>{!! substr($item->detail,0,98) !!}...</td>
				<td><img src="{{ asset('css/images/'.$item->photo) }}" class="img-fluid" /></td> --}}
				<td>{{ number_format($item->giaVe)}}VNĐ</td>
				<td style="text-align: center">
					<a href="/editdanhmuc/{{ $item->id_Ve }}"><button type="button" class="btn btn-primary">Sửa</button></a>
					<a href="/deletedm/{{ $item->id_Ve }}"><button type="button" class="btn btn-danger">Xóa</button></a>
				</td>

				</tr>
			@endforeach
			
			
			</tbody>
      	</table>
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