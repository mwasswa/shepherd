<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * So that a file can be read form any page any where
*/

?>

<div class="modal fade" id="readfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><font color="green"><i class="fa fa-user-plus"></i><span  id="fileTitle"></span></font></h4>
            </div>
            <div class="modal-body" id="myFileEditReturned">
                <div id="iframe" class="col-xs-12 bpm-bottom">
                    <iframe class="col-xs-12" style='visibility: hidden; height: 0px;' name='iframe_a'></iframe>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>