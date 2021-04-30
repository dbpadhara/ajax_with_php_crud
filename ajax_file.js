// data_user();
var table="";
window.onload=function(){
	table = $('#sample').DataTable({
		  dom: 'Bfrtip',
		  ajax : "controller.php?action=getdata&model=user_table",
            	columns : [ {
            		"data" : "uid"
            	},{
            		"data" : "uname"
            	},{
            		"data" : "unumber"
            	},{
            		"data" : "email"
            	},{
            		"data" : "password"
            	},{
            		"data" : " "
            	} ],
            	columnDefs : [
            			{
            				"targets" : -1,
            				"data" : null,
            				"defaultContent" :'<div><button id="update" class="btn btn-primary">update</button> <button class="btn btn-primary" id="delete">delete</button></div>'
            			},
            			{
            				"targets" : [0],
            				"visible" : false,
            				"searchable" : false
            			}
            	],
            	"order" : [ [ 0, "desc" ] ],
            });
            
            // update set the data
          $('#sample tbody').on('click','#update',function(){
          	var data = table.row($(this).parents('tr')).data();
          	
          	$('[name="userid"]').val(data['uid']);
          	$('[name="username"]').val(data['uname']);
          	$('[name="number"]').val(data['unumber']);
          	$('[name="email"]').val(data['email']);
          	$('[name="password"]').val(data['password']);
          	console.log(data);
          });

        // delete data
          $('#sample tbody').on('click','#delete',function(){
          	var data = table.row($(this).parents('tr')).data();
          	// alert(data.uid);
            if(confirm("are you sure")){
            $.ajax({
              url:"controller.php",
              method:"post",
              data:{"action":"deleteData","id":data.uid},
              success:function(ret){
                var data = JSON.parse(ret);
                console.log(data);
                // alert(data);
                if(data){
                  table.ajax.reload();
                  alert("data can be deleted");
                }else{
                  alert("data can't be deleted")
                }
                
              },
              error:function(error){
                console.log("error for delete ajax"+error);
              }
            });  
          }else{
            alert("ok data can't delete");
          }
          	
          	// console.log(data);
          });	
}
// getdata();
function getdata(){    
		 $.ajax({
	  		url:'controller.php',
	  		method:'GET',
	  		data: {'action':'getdata','model':'user_table'},
	  		
	  		success:function(data)
	  		{
	  			var mydata=JSON.parse(data);
	  			console.log(mydata);

	  			$('#userdata').html('');

	  			var obj=mydata.data;
	  			// console.log(obj);
	  			$(obj).each(function()
				{
					var option=$('<option/>');
					option.attr('value',this.uid);
					option.html(this.uname);
					// alert(this.email);
					$('#userdata').append(option);
					// console.log(this.email);
				});
	  		}
	  	});
}

function res(){
	$('#employeeform')[0].reset();
	$('[name = "userid"]').val(0);
}

function save(){
	$.ajax({
		url:"controller.php",
		method:"post",
		data:$('#employeeform').serialize(),
		success:function(ret){
			var data=JSON.parse(ret);

        // delete data			// console.log(data);
      table.ajax.reload();
			if(data){
        table.ajax.reload();
        alert("data can be saved");
      }else{
        alert("data can't be saved")
      }
    // alert(data);
      res();
		},
		error:function(e){
			console.log("error"+e);
		}
	});
}