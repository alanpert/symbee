$(document).ready(function() {

// ********************************
// HOME LOGADO
// ********************************

	// CLICK SIDEBAR
	$("#btn-sidebar").click(function() {
		$("#sidebar").toggle("slide");
		$("#sideout").show();
	});

	$("#sideout").click(function() {
		$("#sideout").hide();
		$("#sidebar").toggle("slide");
	})

});
