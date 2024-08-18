
	<!-- header -->
	@include('template.admin.header')

	
	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
		@if (Session::get('success'))
			<div class="alert alert-success" role="alert">
			{{session::get('success')}}
			</div>
		@endif

		{{-- <div class="alert alert-danger" role="alert">
			This is a danger alert—check it out!
		  </div> --}}
		<a href="/adddanhmuc"><button type="button" class="btn btn-success">Thêm</button></a> <br><br>
      	<table class="table" border="1">
			<thead>
			<tr>
				<th scope="col" class="tieude">STT</th>
				<th scope="col"class="tieude">Tên danh mục</th>
				<th scope="col" class="tieude">Chức năng</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($listdanhmuc as $item)
				<tr>
				<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
				<td>{{ $item->tenDanhMuc }}</td>
				{{-- <td>{!! substr($item->detail,0,98) !!}...</td>
				<td><img src="{{ asset('css/images/'.$item->photo) }}" class="img-fluid" /></td> --}}
				<td style="text-align: center">
					<a href="/editdanhmuc/{{ $item->id_DanhMuc }}"><button type="button" class="btn btn-primary">Sửa</button></a>
					
					@if($itemLogin->role == 1)
					<a href="/deletedm/{{ $item->id_DanhMuc }}"><button type="button" class="btn btn-danger">Xóa</button></a>
					@endif
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