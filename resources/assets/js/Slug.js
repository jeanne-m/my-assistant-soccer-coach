/**
 * Slug.js
 *
 * Generates a slug based on a name field when the slug field is empty.
 */

(function ($) {
    'use strict';

    $.fn.slug = function () {
        return this.each(function () {
            if (!$(this).data('slug-source')) {
                return;
            }
            var $slug = $(this);
            $($slug.data('slug-source')).on('change', function () {
                $slug.val($(this).val().replace(' ', '-')
                    .toLowerCase()
                    .trim()
                    .replace(/\s/g, '-')
                    .replace(/[^\w-]+/g, '')
                    .replace(/[\-]+/g, '-')
                );
            });
        });
    };
}(jQuery));

$(window).load(function () {
    'use strict';
    $('.generate-slug').slug();
});
