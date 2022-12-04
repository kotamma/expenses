
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Expenses extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Expenses_model','Expenses_model' );
        $this->load->library('session');
    }
 
    function index(){
        $data['category'] = $this->Expenses_model->get_category()->result();
        $this->load->view('user/add_expense_view', $data);
        
        
    }
    function add_new(){
        $data['Expenses'] = $this->Expenses_model->get_expenses();
        $this->load->view('user/Expenses_list',$data);
        
       
    }
    function get_sub_category(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Expenses_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
    function save_expense(){
        $category_id    = $this->input->post('category',TRUE);
        $subcategory_id= $this->input->post('sub_category',TRUE);
        $currency = $this->input->post('currency',TRUE);
        $amount  = $this->input->post('amount',TRUE);
        $this->Expenses_model->save_expense($category_id,$subcategory_id,$currency,$amount);
        $this->session->set_flashdata('msg','<div class="alert alert-success">Expense Saved</div>');
        redirect('Expenses/add_new');
     
    }
}