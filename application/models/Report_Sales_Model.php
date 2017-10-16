<?php

    class Report_Sales_Model extends CI_Model
    {


        

public function show_reports(){

//            $this->db->where('Status',1);

            $Query=$this->db->query("SELECT p. * 
                                                FROM  `invoice` AS p");


            if($Query->num_rows()>=1){

                return $Query->result();

            }else{

                return FALSE;

            }
    
}}
    ?>


