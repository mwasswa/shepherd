<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Loaded when you want to upload a new file
 */

?>


           
            <form class="form-inline" role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group margin-10">
                    <select name="th_subject" class="form-control">
                        <option value=""><b>-Select Subject-</b></option>
                        <option value="1">Physics</option>
                        <option value="2">Chemistry</option>
                        <option value="3">Biology</option>
                        <option value="4">Mathematics</option>
                        <option value="5">ICTs</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Topic" name="th_topic"/>
                </div>
                <div class="form-group margin-10">
                    <select name="th_type" class="form-control">
                        <option value=""><b>-Select Type-</b></option>
                        <option value="notes">Class Notes</option>
                        <option value="assignment">Assignment</option>
                        <option value="textbook">Text Book</option>
                        <option value="pastpaper">Past Paper</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <label for="th_overview">Over View</label>
                    <textarea class="form-control" cols="70" rows="4" name="th_overview">Simple description of the upload</textarea>
                    <!-- <input type="text" class="form-control" id="pwd" placeholder="Overview" name="th_overview"/>-->
                </div>
                <div class="form-group margin-10">
                    <input type="file" class="form-control" id="pwd" name="theoryfile"/>
                </div>
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" value="Save" name="add_content"/>
                </div>
            </form>
      