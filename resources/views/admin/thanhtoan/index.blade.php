
	<!-- header -->
	@include('template.admin.header')

	<div class="content-wrapper" style="width: 1000px;margin: 0 auto;margin-top: 20px;">
		<form style="display: flow-root;" action="/timkiemhoadon" method="POST">
			@csrf
			<div class="input-group mb-3" style="float: right;width: 370px;">
				<input type="text" name="tk" class="form-control" style="margin-left: -76px;" placeholder="Số điện thoại">
				<div class="input-group-append">
				  <button class="btn btn-success" style="border-radius: unset;" type="submit">Search</button>
				</div>
			</div>
		</form>
		@if (Session::get('success'))
			<div class="alert alert-success" role="alert">
			{{session::get('success')}}
			</div>
		@endif
		@php
			$listUser = App\Http\Controllers\mainController::getAllUser();
		@endphp
		<a href="/addLichChieu"><button type="button" class="btn btn-success">Thêm</button></a> <br><br>
      	<table class="table" border="1">
			<thead>
			<tr>
				<th scope="col" class="tieude">STT</th>
				<th scope="col"class="tieude">Người đặt</th>
				<th scope="col"class="tieude">Số điện thoại</th>
				<th scope="col"class="tieude">Thành tiền</th>
				<th scope="col"class="tieude">Hình ảnh</th>
				<th scope="col" class="tieude">Chức năng</th>
			</tr>
			</thead>
			<tbody>
				@if(empty($listtk))
					@if(!empty($message))
						<div class="alert alert-wảning" role="alert">
						{{$message}}
						</div>
					@endif
					@if (empty($listlsgd))
						@foreach ($listHoaDon as $item)
							<tr>
							<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
							<td>
								@foreach ($listUser as $user)
									@if ($user->id_User == $item->id_User)
										{{ $user->hoTen }}
									@endif
								@endforeach
								
							</td>
							<td>@foreach ($listUser as $user)
								@if ($user->id_User == $item->id_User)
									{{ $user->sdt }}
								@endif
							@endforeach</td>
							{{-- <td>{!! substr($item->detail,0,98) !!}...</td>--}}
							<td>{{ number_format($item->thanhTien) }}VNĐ</td>
							<td>
								@if (!empty($item->hinhAnh))
								<img style="width: 250px;height: 450px;" src="{{ route('image.show', ['imageName' => $item->hinhAnh]) }}" class="img-fluid" />
								@else
								<p>Thanh toán bằng VNPay</p>
								@endif
							</td>
							
							<td style="text-align: center">
								@if ($item->trangthai == 0)
									<a href="/xacnhan/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-primary">Xác nhận</button></a>
									<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
								@else
									<a href="#" style="color: black"><button type="button" style="cursor: default" class="btn btn-secondary">Đã xác nhận</button></a>
									<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
								@endif
							</td>

							</tr>
						@endforeach
					@else
						@foreach ($listlsgd as $item)
							@php
								$hoadon = App\Http\Controllers\mainController::getHoaDonByid($item->id_HoaDon);
							@endphp
							<tr>
							<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
							<td>
								@foreach ($listUser as $user)
									@if ($user->id_User == $item->id_User)
										{{ $user->hoTen }}
									@endif
								@endforeach
								</td>
								<td>@foreach ($listUser as $user)
									@if ($user->id_User == $item->id_User)
										{{ $user->sdt }}
									@endif
								@endforeach</td>
							{{-- <td>{!! substr($item->detail,0,98) !!}...</td>--}}
							<td>{{ number_format($hoadon->thanhTien) }}VNĐ</td>
							<td>@if (!empty($item->hinhAnh))
								<img style="width: 250px;height: 450px;" src="{{ route('image.show', ['imageName' => $item->hinhAnh]) }}" class="img-fluid" />
								@else
								<p>Thanh toán bằng VNPay</p>
								@endif</td>
							
							<td style="text-align: center">
								@if ($hoadon->trangthai == 0)
									<a href="/xacnhan/{{ $hoadon->id_HoaDon }}"><button type="button" class="btn btn-primary">Xác nhận</button></a>
									<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
								@else
									<a href="#" style="color: black"><button type="button" style="cursor: default" class="btn btn-secondary">Đã xác nhận</button></a>
									<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
								@endif
							</td>

							</tr>
						@endforeach
					@endif
				@else
					@foreach ($listtk as $item)
						<tr>
						<th scope="row" style="text-align: center">{{ $loop->index + 1 }}</th>
						<td>
							@foreach ($listUser as $user)
									@if ($user->id_User == $item->id_User)
										{{ $user->hoTen }}
									@endif
								@endforeach
							</td>
							<td>@foreach ($listUser as $user)
								@if ($user->id_User == $item->id_User)
									{{ $user->sdt }}
								@endif
							@endforeach</td>
						{{-- <td>{!! substr($item->detail,0,98) !!}...</td>--}}
						<td>{{ number_format($item->thanhTien) }}VNĐ</td>
						<td>
							@if (!empty($item->hinhAnh))
								<img style="width: 250px;height: 450px;" src="{{ route('image.show', ['imageName' => $item->hinhAnh]) }}" class="img-fluid" />
								@else
								<p>Thanh toán bằng VNPay</p>
								@endif
						</td>
						
						<td style="text-align: center">
							@if ($item->trangthai == 0)
								<a href="/xacnhan/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-primary">Xác nhận</button></a>
								<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
							@else
								<a href="#" style="color: black"><button type="button" style="cursor: default" class="btn btn-secondary">Đã xác nhận</button></a>
								<a href="/deletett/{{ $item->id_HoaDon }}"><button type="button" class="btn btn-danger">Xóa</button></a>
							@endif
						</td>

						</tr>
					@endforeach
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