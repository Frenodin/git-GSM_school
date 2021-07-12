$("#form_1").submit(function() {
	$.ajax({
		type: "POST",
		url: "processing/send.php",
		data: $(this).serialize()
	}).done(function() {
		$(this).find("input").val("");
		$("#form_1").trigger("reset");
	});
	return false;
});
