function fadeInsertForm() {
	$('#customPause').hide();
	$('#introTron').slideUp(300).fadeOut(400);
	$('#insertForm').slideUp(300).delay(700).fadeIn(400);
}

function customPause() {
	if ($("#inputPause").val() == "different"){
		$('#customPause').slideUp(300).delay(700).fadeIn(400);
	}else{
		$('#customPause').slideUp(300).fadeOut(400);
	};
}