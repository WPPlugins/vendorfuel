vfuel.execute('account','isAuth',{"redirect":true},null);
jQuery("#btn-to").button({
			text : false,
			icons : {
				primary : "ui-icon-arrowthick-1-e",
			}
	});
jQuery("#btn-from").button({
			text : false,
			icons : {
				primary : "ui-icon-arrowthick-1-w",
			}
	});

jQuery('#btnModCost').button();
vfuel.execute('group','costCenterView',{},null);