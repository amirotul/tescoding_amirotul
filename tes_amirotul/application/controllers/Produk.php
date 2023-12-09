<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Produk extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Model_produk');
        $this->load->library('form_validation');
	}
	
	public function index(){ 
		$config['base_url'] = site_url('produk');
        $data['valid'] = $this->session->flashdata('sukses');
        $data['error'] = $this->session->flashdata('error');
        $data['error2'] = $this->session->flashdata('error2');

		$data['produk'] = $this->Model_produk->getAll();
		$data['kategori'] = $this->Model_produk->getKategori();
		$data['status'] = $this->Model_produk->getStatus();
        // echo $this->db->last_query();

		$this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/produk', $data);
        $this->load->view('template/footer');
		
	}

	public function input(){
        $sukses = 'Berhasil menambah data';
		$error  = 'Data tidak valid!';
		$error2 = 'Data sudah ada dalam tabel!';

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('produk');
        } else {
            $nama_produk = $this->input->post('nama_produk');
            $produk = $this->db->query("select * from produk where nama_produk='$nama_produk'");
            $cek = $produk->num_rows();

            if($cek > 0){
                $this->session->set_flashdata('error2', $error2);
                redirect('produk');
            }else{
                $this->Model_produk->tambahproduk();
                $this->session->set_flashdata('sukses', $sukses);
                redirect('produk');
            }
        }
    }

    public function edit(){
        $sukses = 'Berhasil update data';
		$error  = 'Data tidak valid!';

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
 
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $error);
            redirect('produk');
        } else {
            $this->Model_produk->updateproduk();
            $this->session->set_flashdata('sukses', $sukses);
            redirect('produk');
        } 
    }
        
	public function hapus_data() { 
        $sukses = 'Data berhasil dihapus';
		$error  = 'Tidak dapat menghapus data!';

        $del = $this->Model_produk->hapusProduk();
        if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('produk');
        } 
    }

    public function hapus_checkbox(){      
        $del = $this->Model_produk->hapusCheckbox();
        if ($del) {
            $this->session->set_flashdata('sukses', $sukses);
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', $error);
            redirect('produk');
        }   
    }

}
?>