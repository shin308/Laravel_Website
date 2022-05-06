@extends('backend.master')
@section('title','Người dùng')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Người dùng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading" style="background: #b30000">Danh sách người dùng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên khách hàng</th>
											<th>Email</th>
											<th>Số điện thoại</th>
											<th>Địa chỉ</th>
											<th>Level</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($khachhang as $khach)
										<tr>
											<td>{{$khach->id}}</td>
											<td>{{$khach->name}}</td>
											<td>{{$khach->email}}</td>
											<td>{{$khach->phone}}</td>
											<td>{{$khach->address}}</td>
											<td>{{$khach->level}}</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{asset('admin/user/delete/'.$khach->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection