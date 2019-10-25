$(function() {
	
	$("#productadd").validate({
		rules: {
			pro_name: {
				required: true,
				pro_name: true
			}
		},
		messages: {
			pro_name: {
				required: 'Please input a Product Name'
			}
		}		
	});
});