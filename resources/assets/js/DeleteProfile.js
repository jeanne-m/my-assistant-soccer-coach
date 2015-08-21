/**
 * DeleteProfile.js
 *
 * JavaScript to have the user confirm that they want to delete their profile.
 */

$('#delete-profile').click(function (event) {
    event.preventDefault();
    var modal = $('#modal-delete-profile').html();
    $(modal).modal('show');
});
