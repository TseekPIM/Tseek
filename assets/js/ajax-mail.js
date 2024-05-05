(function ($) {
  "use strict";

  var form = '.contact-form';
  var invalidCls = 'is-invalid';
  var $email = '[name="email"]';
  var $validation = '[name="name"],[name="email"],[name="message"]';// não dar espaços nas virgulas (,)
  var formMessages = $('.form-messages');
  
  function sendContact() {
    var formData = $(form).serialize();
    var valid;
    valid = validateContact();
    if (valid) {
      jQuery.ajax({
        url: $(form).attr('action'),
        data: formData,
        type: "POST"
      })
      .done(function (response){
        // formMessages tem que ter a classe "success"
        formMessages.removeClass('error');
        formMessages.addClass('success');
        // mensagem/texto
        formMessages.text(response);
        // limpar o formulário
        $(form + ' input:not([type="submit"]),'+ form+' textarea').val('');
      })
      .fail(function(data){
        // formMessages tem que ter a classe "error"
        formMessages.removeClass('success');
        formMessages.addClass('error');
        // mensagem/texto
        if (data.responseText !== '') {
          formMessages.text(data.responseText);
        } else {
          formMessages.text('Oops! Ocorreu um erro e não foi possível enviar sua mensagem.');
        }
      });
    };
  };

  function validateContact() {
    var valid = true;
    var formInput;

    function unvalid($validation) {
      $validation = $validation.split(',')
      for (var i = 0; i < $validation.length; i++) {
        formInput = form + ' ' + $validation[i];
        if (!$(formInput).val()) {
          $(formInput).addClass(invalidCls)
          valid = false;
        } else {
          $(formInput).removeClass(invalidCls)
          valid = true;
        };
      };
    };
    unvalid($validation);
    
    if (!$($email).val() || !$($email).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $($email).addClass(invalidCls)
      valid = false;
    } else {
      $($email).removeClass(invalidCls)
      valid = true;
    };

    
    return valid;
  };



  $(form).on('submit', function (element) {
    element.preventDefault();
    sendContact();
  });

})(jQuery);