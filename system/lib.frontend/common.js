function validaCorreo(valor)
{
	var reg=/(^[a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30}$)/;
	if(reg.test(valor)) return true;
	else return false;
}

function getUrlParameter(name)
{
    try
    {
        name = name.replace( /[\[]/, "\\[" ).replace( /[\]]/, "\\]" );
        var regex = new RegExp( "[\\?&]" + name + "=([^&#]*)" );
        var results = regex.exec( location.search );
        return results === null ? "" : decodeURIComponent( results[1].replace( /\+/g, " " ) );
    }
    catch(err)
    {
        return null;
    }
}