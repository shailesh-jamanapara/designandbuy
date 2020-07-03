<?php
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards Extends Designandbuy_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();

        $this->_model = strtolower(__CLASS__);
        $this->setModel($this->_model);
        $model = (string) $this->getModel();
        $this->web['request'] = $this->request;
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['items'] = ucfirst($this->_model);
            $this->web['item'] = ucfirst($this->inflect->singularize($this->_model));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        is_loggedin();


    }

    private function initLoad() {

        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 100;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['order_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.first_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $user_type = 'employee';
        //$this->roles_accesses[$this->module_access_id]['add_button'] = str_replace( ucfirst($this->_model), $user_type, $this->roles_accesses[$this->module_access_id]['add_button']);
        //$this->web['roles_accesses']  = $this->roles_accesses[$this->module_access_id];
        $this->web['roles_accesses'] = $this->roles_accesses;
    }

    public function index() {
		   //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $this->web['rows'] = array();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
	}

    private function getTechData() {
        $rows = array();
        $this->load->model('skill_experts_model');
        $this->skill_experts_model->group_by = array('skill_experts.skill_id');
        $rows = $this->skill_experts_model->getAllGroupBy();
        return $rows;
    }

    private function getUpcomingTrainings() {
        $rows = array();
        $this->load->model('users_trainings_model');
        $this->users_trainings_model->where["users_trainings.user_id"] = $this->session->userdata['loggedin']['id'];
        $rows = $this->users_trainings_model->getAll();
        return $rows;
    }

    private function getMyEarnigns() {
        $rows = array();
        $this->load->model('users_expenses_model');
	    $this->users_expenses_model->ci_where = array();	
        $this->users_expenses_model->ci_where["users_expenses.user_id"] = $this->session->userdata['loggedin']['id'];
        $this->users_expenses_model->ci_where["users_expenses.is_archived"] = "0";
        $rows = $this->users_expenses_model->getAll();
        return $rows;
    }

    private function getMyLeaves() {
        $rows = array();
        $this->load->model('leave_applications_model');
        $this->leave_applications_model->where["leave_applications.user_id"] = $this->session->userdata['loggedin']['id'];
        $this->leave_applications_model->where["leave_applications.is_archived"] = "0";
        $rows = $this->leave_applications_model->getAll();
        return $rows;
    }

    private function getExpenses() {
        $arr = array();
        $this->load->model('expenses_model');
        $rows = $this->expenses_model->getAll();
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $addon = array();
                $addon['expense_name'] = $row['expense_name'];
                if ($row['expense_value_type'] == 'percentage') {
                    $addon['expense_value'] = $row['expense_value'] . " %";
                    if (isset($row['depend_on']) && isset($this->web['expenses_all'][$row['depend_on']])) {
                        $addon['depend_on'] = "on " . $this->web['expenses_all'][$row['depend_on']];
                    }
                } else {
                    $addon['expense_value_type'] = ucfirst($row['expense_value_type']) . " Amount ";
                }
                $addon['payable_base'] = $this->web['payable_modes'][$row['payable_base']];
                $addon['expense_type_id'] = $this->web['expense_types'][$row['expense_type_id']];
                $arr[$row['id']] = $addon;
            }
        }
        return $arr;
    }

}
