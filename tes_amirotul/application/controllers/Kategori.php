<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Kategori extends CI_Controller{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('Model_kategori');
    }
    
    public function index(){ 
        $config['base_url'] = site_url('kategori');
        $data['valid'] = $this->session->flashdata('sukses');
        $data['error'] = $this->session->flashdata('error');
        $data['error2'] = $this->session->flashdata('error2');

        $data['kategori'] = $this->Model_kategori->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/kategori', $data);
        $this->load->view('template/footer');
    }

    public function input() { 
        $sukses = 'Berhasil menambah data';
		$error  = 'Data tidak valid!';
		$error2 = 'Data sudah ada dalam tabel!';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('kategori');
        } else {
            $nama_kategori = $this->input->post('nama_kategori');
            $kategori = $this->db->query("select * from kategori where nama_kategori='$nama_kategori'");
            $cek = $kategori->num_rows();

            if($cek > 0){
                $this->session->set_flashdata('error2', $error2);
                redirect('kategori');
            }else{
                $this->Model_kategori->tambahkategori();
                $this->session->set_flashdata('sukses', $sukses);
                redirect('kategori');
            }
        }
    }

    public function edit(){
        $sukses = 'Berhasil update data';
		$error  = 'Data tidak valid!';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('kategori');
        } else {
            $this->Model_kategori->updateKategori();
            $this->session->set_flashdata('sukses', $sukses);
            redirect('kategori');     
        } 
    }
        
	public function hapus_data() { 
        $sukses = 'Data berhasil dihapus';
		$error  = 'Tidak dapat menghapus data!';
        $del = $this->Model_kategori->hapusKategori();
         if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('kategori');
        } 
    }

    public function hapus_checkbox(){   
        $sukses = 'Data berhasil dihapus';
		$error  = 'Tidak dapat menghapus data!';

        $del = $this->Model_kategori->hapusCheckbox();
         if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('kategori');
        }   
    }
    }
?>