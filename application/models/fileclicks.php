<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Created by Joshua Waiswa
 * jwaiswa7@gmail.com
*/


class Fileclicks extends CI_Model {

    function insert($data=array()) {
        extract($data);
        $sql = $this->db->query("select * from fileclicks where docid='$docid' AND user ='$user'");

        if ($sql->num_rows() > 0) {
            //Get the number of clicks and add one to them
            foreach ($sql->result_array() as $row) {
                extract($row);
                $number = $number + 1;
                $data['number'] = $number;
            }
            //Update the clicks table with the new number value

            $where = "docid = '$docid' AND user  = '$user'";
            $sql = $this->db->update_string('fileclicks', $data, $where);
            $result = $this->db->query($sql);

            if($result){
               return true;
            }else{
                return false;
            }
            

        }else {
            //Inserting the file clicks for a particular file and user for the first time
            $this->db->insert('fileclicks', $data);
            return true;
        }

        return false;
    }

    function timesFileIsRead(){
        
        $user = $this->session->userdata('username');
        //Joining the Files table with the clicks table using a left outer join.
        $query = $this->db->select('*')->from('theory')->get()->result();
        //Checking for the subject in the fileclicks table and adding the number of counts every time it apears
        
           foreach ($query as $row) {
                $id = $row->id;
                //echo $id;
                
               
                $numbernew = 0;
                
                $status = $this->db->query("select * from fileclicks where docid='$id'")->result();
                foreach ($status as $row1) {                    
                    $numbernew = $numbernew + $row1->number;          
                    //Adding the number of times the file has apeared
                }
               
               
               $update = "UPDATE theory SET clicked = '$numbernew' WHERE id ='$id'";
               $this->db->query($update);
              
                
             
            }
        return true;

    }

    function getTotalCountsPerFile(){
        $status = $this->db->query("select upload,clicked from theory")->result();

        return $status;
    }

   function unreadFiles(){

       $data = array();//Data array to be sent back to the controller containing files that have not yet been read.
       $position = 0;
       $user = $this->session->userdata('username');
       //Getting the files uploaded and using the id of the file and username to search if it
       //exists in the clicks table.
       $results = $this->db->query("select id,upload,subjectid from theory")->result();

       foreach($results as $value){

           $query = "SELECT * FROM fileclicks WHERE docid='$value->id' AND user = '$user'";
           $exist = $this->db->query($query);
           if($exist->num_rows() > 0){
               //Do nothing
           }else{
               //Add the id and document name to the $data array
               
               $data[$position]= array(
                   'id'=>$value->id,
                   'document'=>$value->upload,
                   'name'=>$this->msubject->get_subject_byId($value->subjectid)
               );
               //Incriment the position variable by 1
               
               $position = $position +1;
           }

           

       }

       return $data;


   }


}
?>
