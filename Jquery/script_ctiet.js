jQuery(document).ready(function($) {
	var native_width = 0;
			native_height = 0;

		//kích hoạt hiệu ứng khi hover vào image
		$('.magnify').mousemove(function(e) {
			
			//đầu tiên sẽ tính kích thước thật của ảnh
			// chỉ sai khi tính toán xog kích thước thật ta mới show phiên bản zoom của ảnh
			if (!native_width && !native_height) {

				//  để lấy kích thước thật sự của ảnh, ta phải sử dụng object vì ta đã set width của ảnh là 200
				var image_object = new new Image();
				image_object.src = $('.small').attr('src');

				native_width = image_object.width;
				native_height = image_object.height;


			}else {
				// mx, my là tọa độ của chuột so với ảnh
				var magnify_offset = $(this).offset();
				var mx = e.pageX - magnify_offset.left;
				var my = e.pageY - magnify_offset.top;

				// fadeout kính lúp khi chuột bên ngoài div
				if(mx < $(this).width() && my  < $(this).height() && mx > 0 && my > 0){
					$('.large').fadeIn('fast');
				}else {
					$('.large').fadeIn('fast');
				}
				if ($('.large').is(':visible')) {
					// ảnh to ở trong kính lúp

					// mx/độ rộng ảnh nhỏ sẽ xảy ra tỷ lệ của mouse vs ảnh, nhân vs độ rộng của kích thước thật
					// sẽ ra vị trí tương ứng của chuột trên ảnh to,
					// - một nửa độ rộng ảnh thật để căn ảnh giữa kích lúp 
					// dùng function mathround để làm tròn
					// vì background position dùng pixel nên cần trả lại về giá trị âm
					rx = Math.round(mx/$('.small').width()*native_width - $('.large').width()/2);
					ry = Math.round(mx/$('.small').height()*native_height - $('.large').height()/2);

					var bgp = rx + 'px' + ry + 'py';

					// di chuyển kính lúp theo chuột
					var px = mx - $('.large').width()/2;
					var py = my - $('.large').height()/2;

					$('.large').css({
						left: px,
						top: py
					});
				}
			}
		});
});