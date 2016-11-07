<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *
 *  Created by Joshua Waiswa
 * jwaiswa7@gmail.com
 * Controller handles the activities of the files.
 * Activities hancelded include:: Getting the count of the number of times a file has been clicked by a perticular user
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class videoActivity extends CI_Controller {

    function index() {
        redirect ('');
    }

    //video search funcitons
    function searchSubject() {
        $subject = $_GET['query'];
        //Getting the subject id
        $id = $this->msubject->getSubjectId($subject);
        //Getting the info for that subject in the theory table
        $data = $this->mvideo->getVideoBySubject($id);
        //Returning the Json for javascript use
        if($data) {
            foreach($data as $info) {
                $info->subjectid = $this->msubject->get_subject_byId($info->subjectid);
            }
        }
        echo json_encode($data);
        exit;
    }

    function searchVideoName() {
        //Search the theory table for the like Video name
        $VideoName = $_GET['query'];
        //Getting the info for that subject in the theory table
        $data = $this->mvideo->videoSearch($VideoName);
        if($data) {
            foreach($data as $info) {
                $info->subjectid = $this->msubject->get_subject_byId($info->subjectid);
            }

        }
        //Returning the Json for javascript use
        echo json_encode($data);
    }
    //End video Search functions*/
}
?>
