$(document).ready(function() {
    $('#statistics_name').change(function() {
        var selectedOptionIndex = $(this).prop('selectedIndex');
        $('#statistics_amount').prop('selectedIndex', selectedOptionIndex);
        $('#statistics_amount_hidden').prop('selectedIndex', selectedOptionIndex);
    });
});