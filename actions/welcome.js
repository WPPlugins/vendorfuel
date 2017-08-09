vfuel.execute('account','isAuth',{"redirect":true},null);
jQuery('#cartButton').button();
jQuery('#browseCatButton').button();
vfuel.execute('catalog','welcomePage',{},null);
vfuel.execute('punchout','punchoutList',{},null);
