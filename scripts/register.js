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

$(document).ready(function()
{
    $("#buttonRegister").attr("disabled", true);

    $("#acceptThis").change(function(ev)
    {
        var control = $(ev.target).prop("checked");
        if(control) 
            $("#buttonRegister").attr("disabled", false);
        else 
            $("#buttonRegister").attr("disabled", true);
    });

    $("#buttonRegister").click(function(ev) 
    {
        SendData();
    });

    //page=1
    var page = getUrlParameter("page");
    
    if(page != null)
    {
        switch (parseInt(page)) 
        {
            case 1:
                $("#headerImage").attr("src", "images/form1.png");
                break;
            case 2:
                $("#headerImage").attr("src", "images/form2.png");
                break;
            case 3:
                $("#headerImage").attr("src", "images/form3.png");
                break;
            default:
                $(".form-formData").hide();
                $(".textForm").hide();
        }
    }
    else
    {
        $(".form-formData").hide();
        $(".textForm").hide();
    }
});

function SendData()
{
    var accept = $("#acceptThis").prop("checked");

    if(accept)
    {
        var errors = "";
        var inputs = $(".form-formData input");
        var ajaxData = {};

        $.each(inputs, function(ix, vx) 
        {
            var label = $(vx).attr("data-label");
            var required = $(vx).attr("data-required");
            var value = $(vx).val();

            if($(vx).attr("id") == "emailGuardian1" || $(vx).attr("id") == "emailGuardian2")
            {
                if(!validaCorreo(value) && eval(required))
                    errors += "<strong>" + label + "</strong> " + " The email is incorrect " + "<br />";
            }


            if(eval(required))
            {
                if(value == "")
                {
                    errors += "<strong>" + label + "</strong> " + value + "<br />";
                    $(vx).css("outline", "1px solid red");
                }
                else
                {
                    ajaxData[$(vx).attr("id")] = value;
                    $(vx).css("outline", "0");
                }
            }
            else
            {
                ajaxData[$(vx).attr("id")] = value;
            }
        });

        var body = $("html, body");

        if(errors != "")
        {
            body.stop().animate({scrollTop:0}, 700, 'swing', function() { 
                $(inputs[0]).focus();
            });

            $.Zebra_Dialog(errors, 
            {
                type: 'error',
                title: 'Error'
            });
        }
        else
        {
            ajaxData["page"] = getUrlParameter("page");

            $.post("registerServer.php", ajaxData, function(data) 
            {
                var result = data.status;
                if(result)
                {
                    $.each(inputs, function(ix, vx) { $(vx).val(""); });

                    $("#acceptThis").prop("checked", false);
                    body.stop().animate({scrollTop:0}, 700, 'swing', function() { 
                        $(inputs[0]).focus();
                    });

                    $.Zebra_Dialog('<strong>The registration was successfully</strong>', {
                        type: 'confirmation',
                        title: 'Confirmation'
                    });
                }
                else
                {
                    $.Zebra_Dialog('<strong>Error in server</strong>, please contact with the administrator.', {
                        type: 'error',
                        title: 'Error'
                    });
                }
            },'json');
        }
    }
}