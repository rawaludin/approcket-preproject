$(document.body).on('click', '.js-submit-confirm', function(event) {
  event.preventDefault();
  var $form = $(this).closest('form');
  swal({
      title: "Are you sure?",
      text: "You will not be able to recover this resource!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: true
    },
    function() {
      $form.submit();
    });
});

$('.js-selectize-multiple').selectize({
    allowEmptyOption: true,
    sortField: 'text',
});
