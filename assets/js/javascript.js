$(document).ready(function () {
    var baseURL = 'http://[::1]/shephered/index.php';
    //alert('This is to test pop-ups')
    $('#accordion').accordion({
        collapsible: true
    });
    CollapsibleLists.apply();
    
    $("#quiz_date").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true, showAnim: 'show'});

    $("#quiz_date_2").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true, showAnim: 'show'});

    

        $('.expiredQuizClose').click(function(){
            window.location.href = baseURL+"/welcome/attempt_quiz";
        });


        //Dash board activity
      // z $('#dashClasses').click(function(){
             //var subject=document.getElementById("dashSubjects");
                                /*var tab=document.createElement("a");
                                tab.setAttribute("class","teacherResult");
                                tab.setAttribute("href","#");
            alert('How???');
        });
        $('#dashTeachers').click(function(){

        });
        $('#dashExams').click(function(){

        });
        $('#dashVideos').click(function(){

        });
        $('#dashTheory').click(function(){

        });
*/
});






