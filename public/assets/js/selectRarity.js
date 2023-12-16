$(document).ready(function() {
    $('#rarity_name').change(function() {
        var selectedOptionIndex = $(this).prop('selectedIndex');
        $('#rarity_drop_rate').prop('selectedIndex', selectedOptionIndex);
        $('#rarity_drop_rate_hidden').prop('selectedIndex', selectedOptionIndex);
    });
});