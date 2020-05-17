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
        $('.action-table tr td').css('display', 'none');
        $('.action-table tr[data-status="' + $target + '"] td').fadeIn('slow');
      } else {
        $('.action-table tr td').css('display', 'none').fadeIn('slow');
      }
    });

 });

 $(document).ready(function () {
             $('[data-toggle="tooltip"]').tooltip();
         });
 $(document).ready(function () {

     var copyCardBtn = document.querySelector('.js-cardcopybtn');
     copyCardBtn.addEventListener('click', function(event) {
       // Выборка номера карты
       var cardNumber = document.querySelector('.js-cardnumber');
       var range = document.createRange();
       range.selectNode(cardNumber);
       window.getSelection().addRange(range);

       try {
         // Теперь, когда мы выбрали текст ссылки, выполним команду копирования
         var successful = document.execCommand('copy');
         var msg = successful ? 'successful' : 'unsuccessful';
         console.log('Copy card number command was ' + msg);
       } catch(err) {
         console.log('Oops, unable to copy');
       }

       // Снятие выделения - ВНИМАНИЕ: вы должны использовать
       // removeRange(range) когда это возможно
       window.getSelection().removeAllRanges();
     });

 });
