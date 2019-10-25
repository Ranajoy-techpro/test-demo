$(function() {
	
	$("#productadd").validate({
		rules: {
			email: {
				required: true,
				//pro_name: true
			}
		}
	});
});