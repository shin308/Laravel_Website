<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<base href="{{asset('')}}">
<link href="{{asset('layout/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('layout/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('layout/css/styles.css')}}" rel="stylesheet">
<script type="text/javascript" src="editor/ckeditor/ckeditor.js"></script>
 <script src="ckeditor/ckeditor.js"></script>
<script src="{{asset('layout/js/lumino.glyphs.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin/home')}}">Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('loguot')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a style="background-color: #b30000;" href="{{asset('admin/home')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a style="color: #b30000" href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a style="color: #b30000" href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li><a style="color: #b30000" href="{{asset('admin/user')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-male-user"></use></svg> Người dùng</a></li>
			<li><a style="color: #b30000" href="{{asset('admin/bills')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-bag"></use></svg> Đơn hàng</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->

	@yield('main')

	<script src="{{asset('layout/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('layout/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('layout/js/chart.min.js')}}"></script>
	<script src="{{asset('layout/js/chart-data.js')}}"></script>
	<script src="{{asset('layout/js/easypiechart.js')}}"></script>
	<script src="{{asset('layout/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('layout/js/bootstrap-datepicker.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
			<script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
	</script>
	<script type="text/javascript">
									var editor = CKEDITOR.replace('content',{
									language:'vi',
									filebrowserImageBrowseUrl: 'editor/ckfinder/ckfinder.html?Type=Images',
									filebrowserFlashBrowseUrl: 'editor/ckfinder/ckfinder.html?Type=Flash',
									filebrowserImageUploadUrl: 'editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
									filebrowserFlashUploadUrl: 'editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
									});
									</script>
</body>

</html>
