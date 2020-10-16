<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ajax Crud</title>
    <style>
    #container{
        padding: 10px;
    }
    #adduser{
        padding: 10px;
    }
    #addmodal{
        display: none;
    }
    </style>
</head>
<body>
    <div id="container">

        <h1 align="center">AJAX CR</h1>
        <br/>
        <div id="adduser" align="right">
        <button type="button" id="adduserbtn" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add</button>
        <!-- <button id="delete" class="btn btn-danger">Delete</button></td> -->
        </div>
        <div class="table-resposive">
            <table id="user_data" class="table">
                <thead class="thead-dark">
                <!-- <tr> -->
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
                <!-- </tr> -->
                </thead>
                <!-- <tr>
                    <td>1</td>
                    <td>Adam</td>
                    <td>Adam@Earth.com</td>
                    <td>0000001</td>
                    <td>
                        <button class="btn btn-warning btn-xs update">Edit</button>
                        <button class="btn btn-danger btn-xs delete">Delete</button>
                    </td>
                </tr> -->
            </table>
        </div>
    </div>
    <div id="addmodal" class="modal fade">
        <div class="modal-dialog">
            <form id="add_form" class="form">
            <div class="modal-content form-group">
                <div class="modal-header">
                    <h4 class="modal-title">Add user</h4>
                </div>
                <div class="modal-body">
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name"/>
                <span id="error-name" class="text-danger">
                </span>
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email"/>
                <span id="error-email" class="text-danger">
                </span>
                </div>
                <div class="form-group">
                <label>Contact</label>
                <input type="text" class="form-control" id="contact"/>
                <span id="error-contact" class="text-danger">
                </span>
                </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" value="Add" id="addinguser">Add</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function(){
    showdata();
    function showdata(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET','php/fetch.php',true);
        var html = '<thead class="thead-dark"><th scope="col">ID</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Contact</th><th scope="col">Action</th></thead>';
        //var html = '';
        xhr.onload = function(){
            if(this.status == 200){
                var results = JSON.parse(this.responseText);

                // for(results in result){
                //     console.log(result);
                // }
                for(var i = 0; i<results.length; i++){
                html +='<tr><td>'+results[i].stid+'</td><td>'+results[i].stname+'</td><td>'+results[i].stemail+'</td><td>'+results[i].stcontact+'</td><td><button id="update" class="btn btn-warning edit">Edit</button> <button id="deleteuser" class="btn btn-danger deleteu" value="'+results[i].stid+'">Delete</button></td></tr>';
                }
                // document.getElementById('user_data').innerHTML += html;
                //trying jquery's method
                $('#user_data').html(html);
            }
        }
        
        xhr.send();
    }


    //Adding new user
    document.getElementById('add_form').addEventListener('submit', function(e){
        e.preventDefault();
        //alert('Inserting user button');
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var contact = document.getElementById('contact').value;
        if(name == ''){
            document.getElementById('error-name').innerHTML = "Please enter Name";
        }
        else if(email == ''){
            document.getElementById('error-email').innerHTML = "Please enter Email";
        }
        else if(contact == ''){
            document.getElementById('error-contact').innerHTML = "Please enter Contact";
        }else{
        var xhr = new XMLHttpRequest();
        xhr.open('POST','php/insert.php?name='+name+'&email='+email+'&contact='+contact,true);
        xhr.onload = function(){
            $('#addmodal').modal('hide');
            showdata();
        }
        xhr.send();

        }
        
    });

    
    //doing delete action through jquery's method
    $(document).on('click', '.deleteu', function(){
        
        var id = $(this).attr("value");
        console.log(id);
        if(window.confirm("Do you really want to delete this?")){
            console.log("delete confirmation");
            $.ajax({
                url: "php/delete.php",
                method: "POST",
                data: {id:id},
                success:function(){
                    showdata();
                }

            });
        }
        //var ids = document.getElementByName('id[]');
        //console.log(ids);
    });

    });
    </script>
</body>
</html>