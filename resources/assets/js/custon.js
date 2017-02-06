// quantidade
jQuery('[data-app="qty"]').on('click', function() {
  var $input = jQuery(this).parent().find('input')[0];
  var value = parseInt(jQuery($input).attr('value'));
  var option = jQuery(this).attr('data-action')== 'minus' ? -1 : 1

  value += option;
  if(value > 0){
    jQuery($input).attr('value',value);
  }else if (option == 1) {
    jQuery($input).attr('value',1);
  }else{
    jQuery($input).attr('value',0);
  }
})

jQuery('button[name="Delete"]').on('click', function(e){
    var $form= jQuery(this).closest('form');
    e.preventDefault();
    bootbox.confirm({
    title: " <i class='fa fa-trash' aria-hidden='true'></i> Excluir",
    message: "Deseja realmente excluir esse produto?",
    buttons: {
        confirm: {
            label: 'Sim',
            className: 'btn-success'
        },
        cancel: {
            label: 'Não',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
        if(result){
          $form.trigger('submit');
        }
    }
  });
});
