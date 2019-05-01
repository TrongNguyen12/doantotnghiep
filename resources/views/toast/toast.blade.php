@if (Session::has('Tsuccess'))
	<script>
		$.toast({
		    text: "{{ Session::get('Tsuccess') }}",
		    heading: 'Thông Báo', 
		    icon: 'success', 
		    showHideTransition: 'slide', 
		    allowToastClose: true, 
		    hideAfter: 4000, 
		    stack: 5, 
		    position: 'bottom-right',
		    textAlign: 'left', 
		    loader: false, 
		    loaderBg: '#9ec600',  
		    beforeShow: function () {}, 
		    afterShown: function () {}, 
		    beforeHide: function () {},
		    afterHidden: function () {} 
		});
	</script>
@endif
@if (Session::has('Terror'))
	<script>
		$.toast({
		    text: "{{ Session::get('Terror') }}",
		    heading: 'Lỗi', 
		    icon: 'error', 
		    showHideTransition: 'slide', 
		    allowToastClose: true, 
		    hideAfter: 4000, 
		    stack: 5, 
		    position: 'bottom-right',
		    textAlign: 'left', 
		    loader: false, 
		    loaderBg: '#9ec600',  
		    beforeShow: function () {}, 
		    afterShown: function () {}, 
		    beforeHide: function () {},
		    afterHidden: function () {} 
		});
	</script>
@endif