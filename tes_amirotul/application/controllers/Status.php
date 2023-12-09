<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Status extends CI_Controller{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('Model_status');
    }
    
    public function index(){ 
        $config['base_url'] = site_url('status');
        $data['valid'] = $this->session->flashdata('sukses');
        $data['error'] = $this->session->flashdata('error');
        $data['error2'] = $this->session->flashdata('error2');

        $data['status'] = $this->Model_status->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/status', $data);
        $this->load->view('template/footer');
    }

    public function input() { 
        $sukses = 'Berhasil menambah data';
		$error  = 'Data tidak valid!';
		$error2 = 'Data sudah ada dalam tabel!';

        $this->form_validation->set_rules('nama_status', 'Nama status', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('status');
        }else {
            $nama_status = $this->input->post('nama_status');
            $status = $this->db->query("select * from status where nama_status='$nama_status'");
            $cek = $status->num_rows();

            if($cek > 0){
                $this->session->set_flashdata('error2', $error2);
                redirect('status');
            }else{
                $this->Model_status->tambahstatus();
                $this->session->set_flashdata('sukses', $sukses);
                redirect('status');
            }
        }
    }

    public function edit(){
        $sukses = 'Berhasil update data';
		$error  = 'Data tidak valid!';

        $this->form_validation->set_rules('nama_status', 'Nama status', 'required');
 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('status');
        } else {
            $this->Model_status->updatestatus();
            $this->session->set_flashdata('sukses', $sukses);
            redirect('status');
        } 
    }
        
	public function hapus_data() { 
        $sukses = 'Data berhasil dihapus';
		$error  = 'Tidak dapat menghapus data!';

        $del = $this->Model_status->hapusstatus();
         if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('status');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('status');
        } 
    }

    public function hapus_checkbox(){   
        $sukses = 'Data berhasil dihapus';
		$error  = 'Tidak dapat menghapus data!';

        $del = $this->Model_status->hapusCheckbox();
         if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('status');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('status');
        }   
    }
    }
?>