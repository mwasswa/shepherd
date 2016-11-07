
        <legend><font class="myColor"><i class="fa fa-question-circle"></i><span id="teacherQuestionName">My Quesitons</span></font></legend>
        <form class="form-inline col-md-12 questionSearch" role="form ">
            <div class="form-group margin-10 input-group col-md-12">
                <input type="text" class="form-control col-md-8" autocomplete="off" id="questionLiveSearch" placeholder="Search My Questions" name="v_desc"/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" id="fileSearchButton"><i class="fa fa-search"></i>Search</button>
                </span>
            </div>
        </form>


<!-- For a more detailed File Search -->
<div class="modal fade" id="crazyFileSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><font class="myColor"><i class="fa fa-search"></i><span></span>Deatiled File search</font></h4>
            </div>
            <div class="modal-body" id="myFileEditReturned">
                Deatiled Search:
                Searching by date, teacher, topic, etc...

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
