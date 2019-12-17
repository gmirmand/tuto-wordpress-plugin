var $bubble = jQuery('.help__container');
var $button = jQuery('.help-popin__icon');

$button.on('click', function() {
    $bubble.toggleClass('d-none');
    $bubble.hasClass('d-none') ? $button.html('?') : $button.html('x');
});