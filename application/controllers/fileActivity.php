<?php
/* 
 * Created by Joshua Waiswa
 * jwaiswa7@gmail.com
 * Controller handles the activities of the files.
 * Activities hancelded include:: Getting the count of the number of times a file has been clicked by a perticular user
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fileActivity extends CI_Controller {

    function index(){
        
        redirect ('');
    }

    function registerFileClick(){

        $data = $_POST['query'];//Gets the file Name
        //Checking and returning the id of the file
        $fileID = $this->theory->get($data);        
        if($fileID){
            //Add click item to the database.

            $fileClickInfo = array(
                'docid' => $fileID,
                'user' =>$this->session->userdata('username'),
                'number' => 1

            );

            if($this->fileclicks->insert($fileClickInfo)){
                $this->fileclicks->timesFileIsRead();
                echo 'true';
            }else{
                echo 'false';
            }
     
        }else{
            echo 'false';
        }
        
       

    }

    function count(){
        $count = $this->fileclicks->timesFileIsRead();
        echo 'Funny';
    }
//Geting the unread files by a user
    function getUnreadFiles(){
        $unread = $this->fileclicks->unreadFiles();
        echo json_encode($unread);
    }

//File search functions
    function searchSubject(){
        $subject = $_GET['query'];
       //Getting the subject id
       $id = $this->msubject->getSubjectId($subject);
       //Getting the info for that subject in the theory table
       $data = $this->fileSearch->getSubjects($id);
       //Returning the Json for javascript use
       if($data){
       foreach($data as $info){
           $info->subjectid = $this->msubject->get_subject_byId($info->subjectid);
       }
       }
        echo json_encode($data);
    }
    
    function searchFileName(){
       //Search the theory table for the like file name
        $subjectName = $_GET['query'];
        //Getting the info for that subject in the theory table
       $data = $this->fileSearch->getFileSearched($subjectName);
       if($data){
       foreach($data as $info){
           $info->subjectid = $this->msubject->get_subject_byId($info->subjectid);
       }
       
       }
       //Returning the Json for javascript use
        echo json_encode($data);
    }
 //End file Search functions



    /*function for trying out stuff*/
    function trying(){
        $data = $this->db->query('SELECT id,upload,clicked,name FROM theory,subject WHERE subject.sid = theory.subjectid')->result();
        echo json_encode($data);
    }
}
?>
