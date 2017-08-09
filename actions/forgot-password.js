jQuery('#sendButton').button();
jQuery('#sendButton').click(function(){
vfuel.execute('account','requestPasswordReset',{"value":jQuery('#email').val()},null);
});