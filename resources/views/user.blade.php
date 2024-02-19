<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />             
    </head>

    <body class="antialiased">
        <div>
                <input type="textbox" class="form-control" name="mobile" id="mobile"/>
                <input type="button" value="search"  id="search_btn" />
        </div>

        <div class="user_details" style="font-size: 20px">
        </div>

        <div id="address" style="display: none">
            @include('address')
        </div>    
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            $(document).on('click','#search_btn', function(){           
                var mobile = $('#mobile').val();
                $.ajax({
                    method:"get",
                    url:"{{route('searchUser')}}",
                    data:{mobile:mobile},
                    success:function(response){

                        if(response. status ==='success'){
                            var user_body ='<table border="1" style="margin-top: 20px"><th>Name</th><th>Mobile</th><th>Email</th>';

                                user_body += '<tr><td>'+ response.user[0].name +'</td>';
                                user_body += '<td>'+ response.user[0].email +'</td>';
                                user_body += ' <td>'+ response.user[0].mobile +'</td></tr></table>'
                                console.log('>>',user_body)
                                $('.user_details').html(user_body);
                                $('#address').show();
                        }
                        else{
                            $('.user_details').html(response.message);
                        }
                            
                    }
                })

            })

            $(document).on('change','#district', function(){           
                var distric = $(this).val();
                console.log('>>',distric);
                $.ajax({
                        method:"get",
                        url :"{{route('getMandal')}}",
                        data:{id:distric},
                        success:function(res){
                            console.log('res', res)
                            
                            if(res.mandals.mandals.length>0){
                                var option = '';
                                $.each( res.mandals.mandals,function(key, mandals){
                                    console.log(mandals)
                                    option += '<option value="'+mandals.id+'"> '+ mandals.mandal_name+' </option>';
                                })
                                $('#mandal').append(option); 
                            } 
                        }
                    })
            })    
            
            $(document).on('change','#mandal', function(){           
                var mandal = $(this).val();
                console.log('>>',mandal);
                $.ajax({
                    method:"get",
                    url :"{{route('getVillage')}}",
                    data:{id:mandal},
                    success:function(res){
                        console.log('res', res.villages.villages)
                        var option = '';
                        $.each(res.villages.villages,function(key,village){
                            option += '<option> '+ village.village_name+' </option>';
                        })
                        console.log('>>',option)
                        $('#village').append(option);

                        if (mandal) {
                             var selectedBox = $(this).closest(".select-box");
                             var selectedText = selectedBox.find("select option:selected").text();
                             console.log('>>',selectedText)
                             //$("#selected-list").append("<li>" + selectedText + "</li>");
                             //$(this).prop("disabled", true);
                        }
                        
                    }
                })
            })

          
        })
    </script>
        
</html>
