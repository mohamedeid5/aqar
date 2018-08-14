$(function(){

	$('.selectall-admin').on('click', function() {
		$('input[class="select-admin"]:checkbox').prop('checked', this.checked);
	});

	$('#delete-admin').on('click', function() {
		if(confirm('are you sure?') == true) {
			return true;
		} else {
			return false;
		}
	});

	$('.selectall-user').on('click', function() {
		$('input[class="select-user"]:checkbox').prop('checked', this.checked);
	});

	$('#delete-user').on('click', function() {
		if(confirm('are you sure?') == true) {
			return true;
		} else {
			return false;
		}
	});

	$('#delete-item').on('click', function() {
		if(confirm('are you sure?') == true) {
			$('#delete-items').submit();
		} else {
			return false;
		}
	});
});
