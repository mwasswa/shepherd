$(document).ready(function()
    {

       var baseUrl = 'http://[::1]/shephered/index.php/';
       //Hiddng the stuff editing form
       $('#editingStuff').hide();
        //Hide the Theory results table
        $('table#theorySearchResult').hide();



        //Hiding the question replies

        $('#questionReplies').hide();

        //Hide the quiz upload file foam
        $('.quizUploadFileFoam').hide();
 
        

        //Hide the video upload form
        $('#videoUpload').hide();

        //Show the Search Videos Form
        $('#videosSearch').show();
        //Hide the Video search results Table
        $('table#videoSearchResult').hide();



        //Check for the number of unread files and update it in the menu bar.

        //Script hold info for clicking files and updates the DB
        $(".fileClicked").click(function(){
            var value = $(this).attr("href");
            var info = value.split('/');
	
            var fileName = info[6];
	
            $.ajax({
                type: "POST",
                url: 'http://[::1]/shephered/index.php/fileActivity/registerFileClick',
                data: {
                    query:fileName
                },
                cache: false,
                success:function(data){
				
                    if(data == 'true'){
					
                        $("iframe").height(526);
                        $("iframe").css('visibility', 'visible');
                        document.getElementById('fileTitle').innerHTML = fileName;
                        $('#readfile').modal('show');
                    }else{
                        alert('Critical error, please contact the owner');
                    }
					
					
                }
				
            });
			
			
        });

        //Scripts for the file live search fields.

        function searchFile() {
            var query_value = $('input#fileLiveSearch').val();
            var myurl = '';
            if(query_value == 'math'){
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchSubject';
            }else if(query_value == 'biology'){
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchSubject';
            }else if(query_value == 'chemistry'){
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchSubject';
            }else if(query_value == 'physics'){
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchSubject';
            }else if(query_value =='icts'){
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchSubject';
            }
            else{
                myurl = 'http://[::1]/shephered/index.php/fileActivity/searchFileName';
            }


            /*Querying the database for the search Results */
            if(query_value !== ''){

                var toView = '';

                $.ajax({
                    type: "GET",
                    url: myurl,
                    data: {
                        query: query_value
                    },
                    dataType:'json',
                    cache: false,
                    success:function(data){
                   
                        for(var i=0;i<data.length;i++){
                            toView +='<tr><td>'+data[i].id+'</td><td><a href="http://[::1]/shephered/uploads/'+data[i].subjectid+'/'+data[i].upload+'" target="iframe_a" class="docs fileClicked">'+data[i].upload+'</a></td><td>'+data[i].subjectid+'</td><td>'+data[i].topic+'</td><td>'+data[i].content+'</td><td>'+data[i].category+'</td><td class="green-font"><a class="editfileLink" href="http://[::1]/shephered/index.php/welcome/edit_theory/'+data[i].id+'"><i class="fa fa-edit"></i></a></td><td class="red-font"><i class="fa fa-trash"></i></td></tr>';

                        }
                        document.getElementById('theoryResult').innerHTML = toView;
                        $('table#theorySearchResult').show();
                    

                    },
                    error: function(xhr, status, error){
                        alert('error: ' + xhr.statusTexterror);
                    }



                });
            }
            return false;
        }



        $("input#fileLiveSearch").on("keyup", function(e) {
            // Set Timeout
            clearTimeout($.data(this, 'timer'));


            var lolz = $('input#fileLiveSearch');
            var search_string = lolz.val();
            var string_length = search_string.length;
       
		

            // Do Search
            if (search_string == '') {
                //Display the default loaded files table
                $('table#theoryDefault').show();
                $('table#theorySearchResult').hide();

            }else{

                if(string_length<3){
                    //Display the default loaded files table
                    $('table#theoryDefault').show();
                    $('table#theorySearchResult').hide();

                }else{
                    $('table#theoryDefault').hide();
                
                
                    $(this).data('timer', setTimeout(searchFile, 100));
                }

            
            };
        });
        $('button#fileSearchButton').click(function(){
            $('#crazyFileSearch').modal('show');
            return false;
        });
        //end scripts for the file live search

        //Script for the Video live search


        function searchVideo(){
            //Geting the user input
            var input = $('input#videoLiveSearch').val();

           
            

            var myurl = '';
            if(input == 'math'){
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchSubject';
                
            }else if(input == 'biology'){
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchSubject';
            }else if(input == 'chemistry'){
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchSubject';
            }else if(input == 'physics'){
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchSubject';
            }else if(input =='icts'){
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchSubject';
            }
            else{
                
                myurl = 'http://[::1]/shephered/index.php/videoActivity/searchVideoName';
               
            }


            /*Querying the database for the search Results */
            if(input !== ''){
                
                var toView = '';

                $.ajax({
                    type: "GET",
                    url: myurl,
                    data: {
                        query: input
                    },
                    dataType:'json',
                    cache: false,
                    success:function(data){
                       

                        for(var i=0;i<data.length;i++){
                            toView +='<tr><td>'+data[i].id+'</td><td><a href="http://[::1]/shephered/index.php/welcome/user_login/'+data[i].id+'" >'+data[i].path+'</a></td><td>'+data[i].subjectid+'</td><td>'+data[i].topic+'</td><td>'+data[i].description+'</td><td>'+data[i].createdby+'</td><td class="green-font"><a class="editfileLink" href="#"><i class="fa fa-edit"></i></a></td><td class="red-font"><i class="fa fa-trash"></i></td></tr>';

                        }
                        document.getElementById('videoResult').innerHTML = toView;
                        $('table#videoSearchResult').show();//Show the Videos Search result table


                    },
                    error: function(xhr, status, error){
                        alert('error: ' + xhr.statusTexterror);
                    }



                });
            }
            return false;
        }
        
        $('input#videoLiveSearch').on('keyup',function(){
            // Set Timeout
            clearTimeout($.data(this, 'timer'));
            //Geting the user input
            var input = $('input#videoLiveSearch').val();
            //Getting the length of the input
            var inputLen = input.length;
            //If the input is less than 3 characters, do nothing.
            if(inputLen < 3){
                $('table#videosTable').show();//Keep the videos Default table shown
                $('table#videoSearchResult').hide();//Hide the Videos Search result table


            }else{
                $('table#videosTable').hide();//Hide videos Default table shown
                $('#videoPaginaiton').hide();
                $(this).data('timer', setTimeout(searchVideo, 100));
                
        
            }

        });

        //Button brings up a form to throughly search through the videos
        $('button#videoSearchButton').click(function(){
            $('#crazyVideoSearch').modal('show');
            return false;
        });

        $('#myVideoUpload').click(function(){
            //Show the video uplaod stuff and hide everything else
            $('table#videosTable').hide();//Keep the videos Default table shown
            $('table#videoSearchResult').hide();//Hide the Videos Search result table
            $('#videoPaginaiton').hide();
            //Hide the Search Videos Form
            $('#videosSearch').hide();
            //Hide the video upload form
            $('#videoUpload').show();

            return false;

            
        });

        //End videos search



        //Search for teachers when asking questions

        


        $('input#teacherName').on('keyup',function(){

            var teacherName = $('input#teacherName').val();
            var myurl = 'http://[::1]/shephered/index.php/questions/searchTeacher'

            var toView = '';
            if(teacherName.length > 3){
                //Make Ajax call to the DB to search for the teachers
                $.ajax({
                    type: "GET",
                    url: myurl,
                    data: {
                        query: teacherName
                    },
                    dataType:'json',
                    cache: false,
                    success:function(data){
                        var li = document.createElement('li');
                       
                        if(data.length == 0){
                            document.getElementById('teahcerSearchResult').innerHTML = '';
                            $('#teahcerSearchResult').hide(); //Show the search results
                        }else{
                        
                            for(var i=0;i<data.length;i++){
                                /* toView +='<div class="row"><a href="javascript:clickedSearch()" id="tsResult"><div class="col-md-12 teacherResult">'+data[i].name+'</div></a></div>';
                            
                           li.className ='tsResult';
                           li.innerHTML = 'Josh';
                           $('#results').appendChild(li);
                           li.onclick = clickedSearch;*/
                                
                                var josh = josh;
                                var div1=document.getElementById("teahcerSearchResult");
                                var tab=document.createElement("a");
                                tab.setAttribute("class","teacherResult");
                                tab.setAttribute("href","#");
                                tab.onclick = clickedSearch;
                                tab.innerHTML= data[i].name;
                                div1.appendChild(tab);
                            }
                            //document.getElementById('teahcerSearchResult').innerHTML = toView;
                            $('#teahcerSearchResult').show(); //Show the search results
                        }


                    },
                    error: function(xhr, status, error){
                        alert('error: ' + xhr.statusTexterror);
                    }



                });
                     
            }else{
                document.getElementById('teahcerSearchResult').innerHTML = '';
                $('#teahcerSearchResult').hide();
            }


        });

        function clickedSearch(){
            // var info = $('.teacherResult').html();
            var name  = $(this).html();
            var info_1 = name.split(' ');

            var firstName = info_1[0];
            var lastName = info_1[1];
            

            document.getElementById('t_fname').value = firstName;
            document.getElementById('t_lname').value = lastName;

            document.getElementById('teacherName').value = name;
            document.getElementById('teahcerSearchResult').innerHTML = '';
            $('#teahcerSearchResult').hide();
        }


        $('#tsResult').click(function(){
            alert('Woow');
        });

        $(".questionResponse").click(function(){
            //Link will use the link id pulled form the link to search the databases for the question responses
            var value = $(this).attr("href");

            var myUrl = 'http://[::1]/shephered/index.php/welcome/student_query_replies/';
            var length = '';
            $.ajax({
                type: "GET",
                url: myUrl,
                data: {
                    query: value
                },
                dataType:'json',
                cache: false,
                success:function(data){
                    var viewInfo = '<div class="row"><div class="col-xs-6 questionAsked"><font color="blue">'+data.qInfo[0].question+'</font></div></div>';

                    if(!data.qReplies.length){
                        viewInfo += '<div class="row"><div class="col-xs-6 col-xs-push-6  responseToQuestion">No available response</div></div>';

                    }else{
                        for(var i =0;i<data.qReplies.length;i++){

                            if(data.qReplies[i].roleid == 1){
                                viewInfo +='<div class="row"><div class="col-xs-6 questionAsked">'+data.qReplies[i].reply+'</div></div>';
                            }else{
                                viewInfo += '<div class="row"><div class="col-xs-6 col-xs-push-6  responseToQuestion">'+data.qReplies[i].reply+'</div></div>';

                            }

                        }
                    }
                   


                    $('.questionSearch').hide();
                    document.getElementById('questionResponseResults').innerHTML = viewInfo;
                    document.getElementById('qid').value = data.qInfo[0].id;
                    $('table#displayQuestions').hide();//Hide the questions table
                    $('#questionReplies').show();//Display the question replies
                },
                error: function(xhr, status, error){
                    alert('error: ' + xhr.statusTexterror);
                }



            });

            /*$('table#displayQuestions').hide();//Hide the questions table
            $('.questionReplies').show();//Display the question replies */
            return false;
        });

        $(".backQuestionLink").click(function(){

            //Link will move from the view to respond to quesitons to the view showing all qiestions
        
            $('table#displayQuestions').show();//Show the questions table
            $('#questionReplies').hide();//Hide the question replies



            return false;

        });



        $('.respondQuestionLink').click(function(){

            var response = document.getElementById('responseText').value;
            var questionid = document.getElementById('qid').value;

             

            if(response ==''){//Will not send response when the text is blank
                return false;
            }else{
                 
                var joshUrl = 'http://[::1]/shephered/index.php/questions/questionResponse/';
                
                $.ajax({
                    type: "GET",
                    url: joshUrl,
                    data: {
                        query: response,
                        id:questionid
                    },
                    dataType:'json',
                    cache: false,
                    success:function(data){
                    
                        //Get the JSON Object and populate the View with what ou are seeing...
                        var viewInfo = '<div class="row "><div class="col-xs-6 questionAsked"><font color="blue">'+data.question[0].question+'</font></div></div>';

                   

                        for( var i = 0; i<data.qresponse.length; i++){
                            if(data.qresponse[i].roleid == 1){
                                viewInfo += '<div class="row "><div class="col-xs-6 questionAsked">'+data.qresponse[i].reply+'</div></div>';

                            }else{
                                viewInfo += '<div class="row "><div class="col-xs-6 col-xs-push-6 responseToQuestion">'+data.qresponse[i].reply+'</div></div>';

                            }
                        }

                        $('.questionSearch').hide();
                        document.getElementById('responseText').value = '';
                        document.getElementById('questionResponseResults').innerHTML = viewInfo;
                 
                    },
                    error: function(xhr, status, error){
                        alert(error);

                    //alert('Not cool');
                    }

                });
              
            }
            return false;
        });


        //Shwoing the quiz upload File foam
        $('.showQuizUploadFileFoam').click(function(){
            $('.setQuizWithTheFoam').hide();//Hide the quiz upload foam
            $('.showQuizUploadFileFoam').hide();//Hide the button
            $('.quizUploadFileFoam').show();//Show the foam for setting quiz usign the file
            return false;
        });

        //Send the values of the form to the DB...
      $('.setQuiz').click(function(){

            var title =  $('.title').val();//Get the Quiz titel
            var duration = $('.duration').val();//Get the duration fo teh quiz
            var date = $('#quiz_date_2').val();//Get the date fo the quiz
            var startTime = $('.startTime').val();//Get the start time
            
             //tab.setAttribute("class","teacherResult");
            if(!title){
              // var titleError =  $('div.titleError');
              $('div.titleError').attr("class","has-error form-group margin-10  titleError");
              // alert('Shit');
            }else{
			var joshUrl = baseUrl+'quiz/addQuiz';
			
               $.ajax({
                    type: "GET",
                    url: joshUrl,
                    data: {
                        title: title,
                        duration:duration,
                        start_time:startTime,
						date:date                        
                    },
                    //dataType:'json',
                    cache: false,
                    success:function(data){
						if(data){
							document.getElementById('Ftitle').value = '';
							document.getElementById('Fduration').value = '';
							document.getElementById('quiz_date_2').value = '';
							document.getElementById('Ftime').value = '';
							document.getElementById('quizSetupResult').innerHTML = 'Quiz has been setup';
						}else{
						alert('shit');
						}
                    }
                });
            }
             $('.quizUploadFileFoam').hide();
            return false;

        });

        $('#addQuestion').click(function(){
            
            $('div#questionError').attr("class","form-group margin-10");
            $('div#optionsError').attr("class","form-group margin-10");
            $('div#ansError').attr("class","form-group margin-10");
             $('div#weightError').attr("class","form-group margin-10");

            var question =  $('input#question').val();
            var options = document.getElementById('options').value;
            var correctOption = $('input#correctOption').val();
            var weight = $('input#weight').val();
            if(!question){
                $('div#questionError').attr("class","has-error form-group margin-10");
                return false;
            }else if(!options){
                $('div#optionsError').attr("class","has-error form-group margin-10");
                return false;
            }else if(!correctOption){
                $('div#ansError').attr("class","has-error form-group margin-10");
                return false;
            }else if(!weight){
                $('div#weightError').attr("class","has-error form-group margin-10");
                return false;
            }

            return true;
        });

        $('#options').on('keypress',function(e){
            var key = e.keyCode;

            if(key == 13){
                document.getElementById('options').value = document.getElementById('options').value+":\n";
                return false;
            }
            return true;
        });

        $('.editQuizlink').click(function(){
            $('#summaryForQuiz').hide();
            $('#editingStuff').show();
        });

        $('.cancelQuizEdit').click(function(){
             $('#summaryForQuiz').show();
            $('#editingStuff').hide();
        });


    
    });