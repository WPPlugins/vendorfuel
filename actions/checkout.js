vfuel.execute('account','isAuth',{"redirect":true},null);
vfuel.execute('cart','generateCheckout',{},null);
jQuery(".pageTitle").append('<div id="vendorfuel_banner"></div><br/>');
vfuel.execute('catalog','showBanner',{"area":"Checkout", "bannerDiv":"#vendorfuel_banner"},null);