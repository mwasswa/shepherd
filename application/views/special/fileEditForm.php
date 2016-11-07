<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Loaded when you want to edit a file
 */
echo 
    "
            <legend><font class='myColor'><i class='fa fa-user-plus'></i>Edit File</font></legend>
            <form class='form-inline' role='form' method='POST' enctype='multipart/form-data'>
                <div class='form-group margin-10'>
                    $subjects
                </div>
                <div class='form-group margin-10'>
                    <input type='text' class='form-control' id='email' placeholder='Topic' name='th_topic' value='" . $topic . "'/>
                </div>
                <div class='form-group margin-10'>
                    <select name='th_type' class='form-control'>
                        <option value=''><b>-Select Type-</b></option>
                        <option value='notes'>Class Notes</option>
                        <option value='assignment'>Assignment</option>
                        <option value='textbook'>Text Book</option>
                        <option value='pastpaper'>Past Paper</option>
                    </select>
                </div>
                <div class='form-group margin-10'>
                    <input type='text' class='form-control' id='pwd' placeholder='Overview' name='th_overview' value='" . $content . "'/>
                </div>
                <div class='form-group margin-10'>
                    <input type='file' class='form-control' id='pwd' name='theoryfile'/>
                </div>
                <div class='margin-10'>
                    <input type='submit' class='btn btn-primary' value='Update' name='edit_content'/>
                </div>
            </form>
       
    ";