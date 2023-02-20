// Call the dataTables jQuery plugin
$(document).ready(function () {
	$("#dataTable").DataTable();
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
	$("#rangking").DataTable({
		searching: false,
		scrollCollapse: true,
		fixedColumns: true,
		order: [[1, "desc"]],
	});
});
