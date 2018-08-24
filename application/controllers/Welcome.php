<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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


    public function bc($db){
        $this->session->set_userdata('load_db', $db);

        echo $this->session->userdata('load_db');

        $this->db = $this->load->database('default', TRUE);

        $data = $this->db->limit(10)->get('employees')->result_array();
        print_r(json_encode($data));
    }

	public function index()
	{


	    $this->bc('db_employees');

	    exit;

	    $data['classroom'] = $this->db->get('db_academic.classroom')->result_array();

        // Load the DB utility class
        $this->load->dbutil();


        $prefs = array(
//            'tables'        => array('table1', 'table2'),   // Array of tables to backup.
            'ignore'        => array(),                     // List of tables to omit from the backup
            'format'        => 'txt',                       // gzip, zip, txt
            'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n"                         // Newline character used in backup file
        );

//        $this->dbutil->backup($prefs);
//
//
//        exit;

// Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);

// Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/ok.sql', $backup);

// Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('ok.sql', $backup);


//		$this->load->view('welcome_message',$data);
	}
}
