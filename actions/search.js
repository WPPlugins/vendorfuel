if(jQuery.cookie("vfuel-punchoutOnlyOpt")!=1){
    vfuel.execute('catalog','newSearch',{"q":vfuel.getURLParameter("q")});
}else{
    window.location.href= vfuel.getOpt('page-welcome');   
}