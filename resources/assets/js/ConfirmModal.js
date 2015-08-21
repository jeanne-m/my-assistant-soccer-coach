/**
 * ConfirmModal.js
 *
 * Displays a confirmation modal.
 */

(function ($) {
    'use strict';

    $.fn.confirmModal = function () {

        return this.each(function () {
            $(this).click(function (event) {
                event.preventDefault();
                var $modal = $($('#modal-delete').html()),
                    href = $(this).attr('href');
                $modal.on('show.bs.modal', function (event) {
                    $(this).find('.btn-primary').attr('href', href);
                });
                $modal.modal('show');
            });
        });

    };
}(jQuery));

$(window).load(function () {
    'use strict';
    $('a.modal-confirm').confirmModal();
});
