function upload()
{
	//alert('hi');
	$('#uploadFile').click();
}
function point(dom)
{
	dom.style.cursor='pointer';
}
 function uploadPicture(input) 
 {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#picture').css('background', 'transparent url('+e.target.result +') left top no-repeat');
		}

		reader.readAsDataURL(input.files[0]);
	}
}