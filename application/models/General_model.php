<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 12-21-2016
 * General_model (model)
 */

class General_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*     * ****** Db connection for my_sql_real_escape_string ***** */

    public function db_connection() {
        $connection = mysql_connect("localhost", "empuser", "emp@bim16");
        mysql_select_db("dbname", $connection);
        return $connection;
    }

    /*     * **** Load_My_View function is commn for load layout ***** */

    public function load_my_view($data) {
        $Total_Page = count($data['section']);

        $My_Page = $data['section'];

        $this->load->view('layout/header', $data);
        for ($i = 0; $i < $Total_Page; $i++) {
            $this->load->view($My_Page[$i], $data);
        }

        $this->load->view('layout/footer', $data);
    }
	/*     * **** Load_My_View function is commn for load layout ***** */

    public function load_front_view($data) {
        $Total_Page = count($data['section']);

        $My_Page = $data['section'];

        $this->load->view('layout/front/header', $data);
        for ($i = 0; $i < $Total_Page; $i++) {
            $this->load->view($My_Page[$i], $data);
        }

        $this->load->view('layout/front/footer', $data);
    }

    /*     * *** Insert Common function ** */

    function insert_data($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        /* echo $this->db->last_query();
          exit; */
    }

    /*     * *** Insert Common function ** */

    function insert_batch_data($table, $data) {
        $this->db->insert_batch($table, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * * Select common Funtion ** */

    public function get_all($table) {
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
        return array();
    }

    /*     * ************* Update Common Function ************** */

    public function update_record($table, $data, $primaryfield, $id) {

        $this->db->ci_where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        /*  echo $this->db->last_query();
          exit; */
        return $q;
    }

    /*     * ******** Delete record from table ******** */

    public function delete_record($table, $primaryfield, $id) {
        $this->db->ci_where($primaryfield, $id);
        $delete = $this->db->delete($table);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ***************** data_validate function ********************* */

    public function data_validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /*     * *************** real_escape function ******************* */

    public function real_escape($data) {
        if (is_array($data)) {
            $variable = array();
            foreach ($data as $key => $var) {
                if (is_array($var)) {
                    $sub_var = array();
                    foreach ($var as $key1 => $value) {
                        $sub_var[$key1] = $this->security->xss_clean($value);
                    }
                    $variable[$key] = $sub_var;
                } else {
                    $variable[$key] = $this->security->xss_clean($var);
                }
            }
            return $variable;
        } else {
            $data = $this->security->xss_clean($data);
            return $data;
        }
    }

    /*     * ******** check_emp_exists function will check is there employee exist with given Emp_ID ********** */

    public function check_emp_exists($Emp_ID) {
        $sql_check_emp = "SELECT `Emp_ID`, `First_Name`, `Middle_Name`, `Last_Name` FROM `employe` WHERE `Emp_ID` = '$Emp_ID' AND `Status` = '1'";
        $query_check_emp = $this->db->query($sql_check_emp);
        $result_check_emp = $query_check_emp->result_array();
        //print_r($result_check_emp); exit;

        if (isset($result_check_emp) && !empty($result_check_emp)) {
            $Emp_Title = strtoupper($result_check_emp[0]['First_Name'] . ' ' . $result_check_emp[0]['Last_Name']) . '/' . $result_check_emp[0]['Emp_ID'];
        } //echo $Emp_Title; exit;
        return $Emp_Title;
    }

    /*     * **** main_user_roles() function for getting main user roles data *** */

    public function main_user_roles($Role_Id = '') {

        /*         * ******** select detail from role table ************ */
        $main_user_roles = array();
        $sql_where = '';
        if ($Role_Id != '') {
            $sql_where = " WHERE Role_Id = $Role_Id";
        }

        $sql_get = "SELECT * FROM `role`$sql_where";
        $query_get = $this->db->query($sql_get);
        $result_get = $query_get->result_array();

        if (isset($result_get) && !empty($result_get)) {
            foreach ($result_get as $Role_ID => $val) {
                $main_user_roles[$val['Role_ID']] = $val['Role_Name'];
            }
        }
        // echo '<pre>'; print_r($main_user_roles); exit;
        return $main_user_roles;
    }

    public function get_leave_details($Emp_ID = '', $Lev_Id = '') {

        $this->db->select('emp_leave.*,employe.First_Name,employe.Last_Name,employe.Email,employe.DOB,position_list.Position_Name');
        $this->db->from('emp_leave');
        $this->db->join('employe', 'employe.Emp_ID = emp_leave.Emp_ID', 'left');
        $this->db->join('position_list', 'position_list.Pos_ID = employe.Position', 'left');

        if ($Emp_ID != '' && $Lev_Id == '') {
            $this->db->ci_where('emp_leave.Emp_ID', $Emp_ID);
        }
        if ($Emp_ID == '' && $Lev_Id != '') {
            $this->db->ci_where('emp_leave.Lev_ID', $Lev_Id);
        }
        $this->db->order_by('Created_Date', 'DESC');
        $query = $this->db->get();
        //echo $query->executeQueryLog();exit;
        $result = $query->result_array();

        //echo '<pre>';print_r($result);exit;
        return $result;

        //return $this->db->get('emp_leave')->result();
    }

    public function get_user_detail($Emp_ID) {
        $this->db->select('*');
        $this->db->from('employe');
        $this->db->ci_where('employe.Emp_ID', $Emp_ID);
        $this->db->ci_where('employe.Status', '1');
        $this->db->order_by('Created_Date', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }

}