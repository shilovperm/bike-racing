/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

//menu action changes
$( '#organization-menu .navbar-nav a' ).on( 'click', function () {
	$( '#organization-menu .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});

$(document).ready(function () {

  $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr td').css('display', 'none');
        $('.table tr[data-status="' + $target + '"] td').fadeIn('slow');
      } else {
        $('.table tr td').css('display', 'none').fadeIn('slow');
      }
    });

 });

 $(document).ready(function () {
             $('[data-toggle="tooltip"]').tooltip();
         });
