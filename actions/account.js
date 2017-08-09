vfuel.execute('account','isGuest',{},null);
vfuel.execute('account','isAuth',{"redirect":true},null);
jQuery('#submitInfo').button();
vfuel.execute('account','infoView',{},null);

