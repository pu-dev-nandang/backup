<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_backup extends CI_Controller {


    public function loadBackUP(){
        $this->load->view();
    }

    // ===== Reload Database ======
    public function reLoadDatabase(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;

        $this->load->dbutil();
        $dbs = $this->dbutil->list_databases();


        // Insert To DB
        if(count($dbs)>0){
            for($i=0;$i<count($dbs);$i++){

                // Cek apakah sudah ada di db atau belum
                $checkDB = $this->db->get_where('backup_db.db',array('Name'=>$dbs[$i]),1)
                    ->result_array();

                if(count($checkDB)<=0){
                    $arr_ins = array(
                        'Name' => $dbs[$i],
                        'InsertAt' => $dataTime
                    );
                    $this->db->insert('backup_db.db',$arr_ins);
                }

            }
        }

        return print_r(1);
    }


    // ===== Add DB Auto BC Daily ====
    public function crudDaily(){
        $data_arr = $this->input->post('dataForm');

        if($data_arr['action']=='add'){

            // Cek apakah sudah ada atau blm
            if(count($data_arr['arrDBID'])>0){
                for($i=0;$i<count($data_arr['arrDBID']);$i++){
                    $d = $data_arr['arrDBID'][$i];

                    $arrCheck = array(
                        'DBID' => $d,
                        'BCType' => '1'
                    );

                    $d_check = $this->db->get_where('backup_db.setting',$arrCheck)->result_array();

                    if(count($d_check)<=0){
                        $arrIns = array(
                            'DBID' => $d,
                            'BCType' => '1',
                            'Status' => '1'
                        );
                        $this->db->insert('backup_db.setting',$arrIns);
                    } else {
                        $this->db->set('Time', $data_arr['Time']);
                        $this->db->where('ID',1);
                        $this->db->update('backup_db.bc_type');
                    }
                }
            }

            return print_r(1);

        }
        print_r($data_arr);
    }


    private function dateTimeNow(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        return $dataTime;
    }

    public function download($db){

//        $db = $this->input->post('db');

        $this->session->set_userdata('load_db', $db);

        $this->db = $this->load->database('default', TRUE);

        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
//        $this->load->helper('file');
//        write_file('./file/'.$db.'.sql', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($db.'.sql', $backup);

        echo "<script>window.close();</script>";

    }



    public function loadDB(){

        $this->load->dbutil();
        $dbs = $this->dbutil->list_databases();

        $noBackup = array('access_card','db_assets','db_global','db_students',
            'importer','information_schema','invent','k6330916_pu_acid','k6330916_pu_database',
            'metro','my_db','mysql','performance_schema','phpmyadmin','root26','siak4','test','markov');

        $dbBC = [];
        foreach ($dbs as $db)
        {
            if(!in_array($db,$noBackup)){
                array_push($dbBC,$db);
            }
        }

//        return $dbBC;
        return $dbs;

    }



}
