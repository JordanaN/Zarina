// quantidade
jQuery('[data-app="qty"]').on('click', function() {
  console.log(this);
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
