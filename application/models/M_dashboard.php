<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    function getDataBase(){

        $data = $this->db->get('backup_db.db')->result_array();

        if(count($data)>0){
            for($i=0;$i<count($data);$i++){
                $dataLog = $this->db->order_by("ID", "DESC")->get_where('backup_db.log',array('DBID'=>$data[$i]['ID']))
                    ->result_array();

                $data[$i]['BC'] = count($dataLog);

                $last_bc = '-';
                if(count($dataLog)>0){
                    $last_bc = $dataLog[0]['InsertAt'];
                }
                $data[$i]['LastBackup'] = $last_bc;

            }
        }

        return $data;

    }

    function getDataDaily(){

        $dataDB = $this->getDataBase();

        if(count($dataDB)>0){
            for($i=0;$i<count($dataDB);$i++){
                $d = $dataDB[$i];
                $dataDaily = $this->db->query('SELECT * FROM backup_db.setting s 
                                            WHERE s.BCType = "1" AND s.DBID = "'.$d['ID'].'" ')
                                        ->result_array();

                $dataDB[$i]['Checked'] = (count($dataDaily)>0) ? '1' : '0';
            }
        }

        $dataTime = $this->db->select('Time')->get_where('backup_db.bc_type',array('ID' => '1'),1)->result_array()[0];

        $res = array(
            'Time' => $dataTime['Time'],
            'Data' => $dataDB
        );

        return $res;



    }

}
