function Login()
{
    var email = $("#email").val();
    var pass = $("#pass").val();
    var contenedor = $("#response");
    contenedor.show();

    if(!validaCorreo(email) || email=="")
    {
       contenedor.html("<img src='images/error.png' width='16px' height='16px' align='absmiddle'/>&nbsp;The email is invalid");
       $("#email").addClass("input_error");
    }
    else
      {
          $("#email").removeClass("input_error");

          if(pass!="")
            {
				  $("#pass").removeClass("input_error");
                  contenedor.html("<img src='images/loader.gif' width='16px' height='16px' align='absmiddle'/>&nbsp;Loading...");
                  $.post("restOperations.php",
                   {
                       'option' : 'login',
                       'email' : email,
                       'pass' : pass
                   },
                   function(data)
                   {
                       if(data.status)
                        {
                          contenedor.html(data.message);
                           location.href = "home.php";
                        }
                        else
                           contenedor.html(unescape(data.message));
                   },'json');
            }
          else
              {
                  $("#pass").addClass("input_error");
                  contenedor.html("<img src='images/error.png' width='16px' height='16px' align='absmiddle'/>&nbsp;Write your password.");
              }
      }
}

function SwitchEventPage(page)
{
    location.href = "home.php?pageNumber=" + page;
}

function DataRegistration(page)
{
    $.post("restOperations.php", 
    {
        'option' : 'listRegistrations',
        'eventPage' : page
    }
    , function (data) 
    {
        
        var select = $("#tableList tbody");

        for(var i=0 ; i < data.length; i++)
        {
            var item = data[i];
            var tr = $("<tr></tr>");

            var td = $("<td></td>");
            td.html(item["id"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["registerDateTime"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["nameType"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["playerName"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["dateOfBirth"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["teamLastPlayed"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["levelOfMostRecentTeam"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianName1"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianCellNumber1"] + ", " + item["guardianOtherNumber1"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianEmail1"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianMailingAddress1"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianName2"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianCellNumber2"] + ", " + item["guardianOtherNumber2"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianEmail2"]);
            tr.append(td);

            td = $("<td></td>");
            td.html(item["guardianMailingAddress2"]);
            tr.append(td);

            select.append(tr);

        }

    }, 'json');
}