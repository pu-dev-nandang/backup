<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

    public function menu_navigation($page){
        $data['page'] = $page;
        $this->load->view('menu_navigation',$data);
    }

    public function index(){

        $data['dataDB'] = $this->loadDB();
        $page = $this->load->view('page/dashboard',$data,true);
        $this->menu_navigation($page);
    }

    public function auto_backup(){
        $data['dataDB'] = $this->loadDB();
        $page = $this->load->view('page/auto_backup',$data,true);
        $this->menu_navigation($page);
    }

    //=============================

    public function index2(){


        // Load the DB utility class
        $this->load->dbutil();
        $dbs = $this->dbutil->list_databases();

        $noBackup = array('access_card','db_assets','db_global','db_students',
            'importer','information_schema','invent','k6330916_pu_acid','k6330916_pu_database',
            'metro','my_db','mysql','performance_schema','phpmyadmin','root26','siak4','test');



        $dbBC = [];
        foreach ($dbs as $db)
        {
//            echo $db;
            if(!in_array($db,$noBackup)){
                array_push($dbBC,$db);
            }
        }

        print_r(json_encode($dbBC));
    }


    function setInterval($f, $milliseconds)
    {
        $seconds=(int)$milliseconds/1000;
        while(true)
        {
            $f();
            sleep($seconds);
        }
    }

    private  $a = true;

    public function index_()
    {

        $dataDB = array('db_academic', 'db_employees');
//
//
//        $this->setInterval(function (){
//            echo '1';
////            if($this->a==true){
////                $this->backupDB('db_academic');
////                $this->a = false;
////            } else {
////                $this->backupDB('db_employees');
////            }
//
//        },5000);
//
//


        exit;
        for($i=0;$i<count($dataDB);$i++){
//                echo $dataDB[$i];
            $this->backupDB($dataDB[$i]);
        }

//        print_r($arr);


        exit;

        $dataDB = $this->loadDB();

//        print_r($dataDB);

        if(count($dataDB)>0){
            for($i=0;$i<count($dataDB);$i++){
//                echo $dataDB[$i];
                $this->backupDB($dataDB[$i]);
            }
        }

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

    private function backupDB2($db)
    {
        echo $db;

    }

    private function backupDB($db){

        echo $db.' - ';

        $this->db = $this->load->database('db_employees', TRUE);

        // Load the DB utility class
        $this->load->dbutil();

//        $prefs = array(
////            'tables'        => array('table1', 'table2'),   // Array of tables to backup.
//            'ignore'        => array(),                     // List of tables to omit from the backup
//            'format'        => 'txt',                       // gzip, zip, txt
//            'filename'      => $db.'.sql',              // File name - NEEDED ONLY WITH ZIP FILES
//            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
//            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
//            'newline'       => "\n"                         // Newline character used in backup file
//        );

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/'.$db.'.sql', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($db.'.sql', $backup);

    }

}
