@extends('backend.master')
@section('title','Sửa sản phẩm')
@section('main')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading" style="background-color: #b30000;">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" value="{{$editproduct->name}}" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control" value="{{$editproduct->price}}">
									</div>
									<div class="form-group" >
										<label>Giá khuyến mãi</label>
										<input required type="number" name="promotion_price" class="form-control" value="{{$editproduct->promotion_price}}">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px"  src="{{asset('storage/app/source/image/product/'.$editproduct->image)}}">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="accessories" class="form-control" value="{{$editproduct->unit}}">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control" value="{{$editproduct->warranty}}">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1" @if($editproduct->status==1) selected @endif>Còn hàng</option>
											<option value="0" @if($editproduct->status==0) selected @endif>Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description">{{$editproduct->description}}</textarea>
									</div>	
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											@foreach($listtype as $list)
											<option value="{{$list->id}}" @if($editproduct->id_type == $list->id) selected @endif>{{$list->name_type}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>New</label>
										<!--<input required type="number" min="0" max="1" name="new" class="form-control" @if($editproduct->new==1) value="1" @endif>-->
										<select required name="new" class="form-control">
											<option value="1" @if($editproduct->new==1) selected @endif>Mới</option>
											<option value="0" @if($editproduct->new==0) selected @endif>Cũ</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1" @if($editproduct->featured == 1) checked @endif>
										Không: <input type="radio" name="featured" value="0" @if($editproduct->featured == 0) checked @endif>
									</div>
									<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection