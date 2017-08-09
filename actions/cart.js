
vfuel.execute('cart','viewCart',{},null);
jQuery(".pageTitle").append('<div id="vendorfuel_banner"></div><br/>');
vfuel.execute('catalog','showBanner',{"area":"Shopping cart", "bannerDiv":"#vendorfuel_banner"},null);