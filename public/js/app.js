$(document).ready(function() {
    $('input.date-picker').datepicker({
        todayBtn: "linked",
        startDate: new Date(),
        autoclose: true,
        todayHighlight: true
    });
});
