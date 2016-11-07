$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
});
//Popup Click

$("#notificationContainer").click(function()
{
	$("#notification_count").fadeOut("slow");
//return false
});



$("#myUpload").click(function()
{
	$('#myModal').modal('show');
//return false
});

$(".editfileLink").click(function(){
	var value = $(this).attr("href");
	
	$.ajax({
                type: "GET",
                url: value,
                data:"",
				dataType:'json',
                cache: false,
                success:function(data){
				//$('#myModal2').modal('show');
				
				var html = data.e_upload;
				
				
				document.getElementById('fileTopic').value = data.et_topic;
				document.getElementById('description').value = data.e_content;
								
				
				$('#myModal2').modal('show');
				//alert(data.e_upload);
					 
                },
                error: function(xhr, status, error){
                //alert('error: ' + xhr.statusTexterror);
                }
				
				
				
            });
	
	
	//alert(value);
	return false;
});
//Check if there are any unread files and update the notifications icon
//This is done once the document is loaded
$.ajax({
                type: "GET",
                url: 'http://[::1]/shephered/index.php/fileActivity/getUnreadFiles',
                data:"",
				dataType:'json',
                cache: false,
                success:function(data){
				var length = data.length;
				var string = '';
				
				
					if(data.length == 0){
						$("#notification_count").fadeOut("slow");
						document.getElementById('notificationsBody').innerHTML = "<a href='#'><div class='row'><div class='col-md-12' id='notificationsBody_div'><strong>You have read all documents</strong></div></div></a>" 
					}else{
						document.getElementById('notification_count').innerHTML =data.length;
						//$("#notification_count").textContent = data.length;
						for(var i=0;i<length;i++){
							var linkname = 'http://[::1]/shephered/uploads/'+data[i].name+'/'+data[i].document;
							var divContent = "<a id='unreadFile' href='"+linkname+"' target='blank'><div class='row'><div class='col-md-12' id='notificationsBody_div'><strong>"+ data[i].document+"</strong></div></div></a>";
							string  += divContent;
						}
						document.getElementById('notificationsBody').innerHTML = string; 
					}
				
				
				}
				
				});


//End check
//The links in the notification drop down are ignoring my javascript
});