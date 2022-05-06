@extends('backend.master')
@section('title','Đơn hàng')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đơn hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading" style="background: #b30000">Danh sách đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên khách hàng</th>
											<th>Ngày đặt</th>
											<th>Tổng tiền</th>
											<th>Hình thức thanh toán</th>	
											<th>Ghi chú</th>
											<th>Tùy chọn</th>
											<th>Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cart as $donhang)
										<tr>
											<td>{{$donhang->id}}</td>
											<td>{{$donhang->name}}</td>
											<td>{{$donhang->date_order}}</td>
											<td>{{$donhang->total}}</td>
											<td>{{$donhang->payment}}</td>
											<td>{{$donhang->note}}</td>
											<td>
												<a href="{{asset('admin/bills/detail/'.$donhang->id_carts)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Chi tiết</a>
												<a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
											<td>
												
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