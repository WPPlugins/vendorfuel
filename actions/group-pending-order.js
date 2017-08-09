vfuel.execute('account','isAuth',{"redirect":true},null);
jQuery('#paymentOptionsTabs').tabs();
jQuery('#btnComplete').button({icons:{primary:"ui-icon-check"}});
jQuery('#btnCancel').button({icons:{primary:"ui-icon-cancel"}});
vfuel.execute('group','orderPendingView',{"value": vfuel.getURLParameter('order_id')},null);