
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
		<a href="/addnguoidung"><button type="button" class="btn btn-success">Thêm</button></a> <br><br>
      	<table class="table" border="1">
			<thead>
			<tr>
				<th scope="col" class="tieude">STT</th>
				<th scope="col"class="tieude">Email</th>
				<th scope="col"class="tieude">Số điện thoại</th>
				<th scope="col"class="tieude">Địa chỉ</th>
				<th scope="col"class="tieude">Quyền</th>
				<th scope="col" class="tieude">Chức năng</th>
			</tr>
			</thead>
			<tbody>
			@if (count($listUser)>0)
				@foreach ($listUser as $item)
					<tr>
					<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
					<td>{{ $item->email }}</td>
					<td>{{ $item->sdt }}</td>
					<td>{{ $item->diaChi }}</td>

						@switch($item->role)
							@case(1)
								<td>Quản trị viên</td>
								@break
							@case(2)
								<td>Người chỉnh sửa</td>
								@break
							@default
								<td>Người dùng</td>
						@endswitch

					{{-- <td>{!! substr($item->detail,0,98) !!}...</td>
					<td><img src="{{ asset('css/images/'.$item->photo) }}" class="img-fluid" /></td> --}}
					<td style="text-align: center">
						@if($itemLogin->role == 1)
						<a href="/editnd/{{ $item->id_User }}"><button type="button" class="btn btn-primary">Sửa</button></a>
						<a href="/deletend/{{ $item->id_User }}"><button onclick="alert('Bạn có chắc muốn xóa không')" type="button" class="btn btn-danger">Xóa</button></a>
						@endif
					</td>

					</tr>
				@endforeach	
			@else
				<tr>
					<th scope="row" style="text-align: center">#</th>
					<td>{{ $itemLogin->email }}</td>
					<td>{{ $itemLogin->sdt }}</td>
					<td>{{ $itemLogin->diaChi }}</td>

						@switch($itemLogin->role)
							@case(1)
								<td>Quản trị viên</td>
								@break
							@case(2)
								<td>Người chỉnh sửa</td>
								@break
							@default
								<td>Người dùng</td>
						@endswitch

					{{-- <td>{!! substr($item->detail,0,98) !!}...</td>
					<td><img src="{{ asset('css/images/'.$item->photo) }}" class="img-fluid" /></td> --}}
					<td style="text-align: center">
						<a href="/editnd/{{ $itemLogin->id_User }}"><button type="button" class="btn btn-primary">Sửa</button></a>
						{{-- <a href="/deletedm/{{ $itemLogin->id_User }}"><button type="button" class="btn btn-danger">Xóa</button></a> --}}
					</td>
				</tr>
			@endif
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