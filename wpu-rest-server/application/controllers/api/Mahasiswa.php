<?php 
use RestServer\Libraries\Rest_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends Rest_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model','mahasiswa');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null)
        {  
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        }else{
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }
       
        // print_r($mahasiswa);exit();
        if($mahasiswa){
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK); 
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if($id === null)
        {
            $this->response([
                'status' => false,
                'message' => 'provie an id'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }else{
            if($this->mahasiswa->deleteMahasiswa($id)> 0 )
            {
                //ok
                $this->response([
                    'status' => true,
                    'message' => 'delete data success'
                ], REST_Controller::HTTP_NO_CONTENT); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        // $mahasiswa = $this->db->insert();
        $data =[
                'nrp' => $this->post('nrp'),
                'nama' => $this->post('nama'),
                'email' => $this->post('email'),
                'jurusan' => $this->post('jurusan'),

        ]; 
        if($this->mahasiswa->createMahasiswa($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'New mahasiswa has been new created'
            ], REST_Controller::HTTP_CREATED); 
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to created data mahasiswa'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}