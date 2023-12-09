<?php
/**
 * 
 */
class Model_produk extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('a.*, b.nama_kategori as kategori, c.nama_status as status');
		$this->db->from('produk a');
		$this->db->join('kategori b', 'b.id_kategori = a.kategori_id', 'LEFT');
		$this->db->join('status c', 'c.id_status = a.status_id', 'LEFT');
		$this->db->where('a.status_id', '1');
		$query = $this->db->get();
		return $query;
	}

	function getKategori(){ 
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get();
		return $query;
	}

	function getStatus(){ 
		$this->db->select('*');
		$this->db->from('status');
		$query = $this->db->get();
		return $query;
	}
	function tambahProduk() { 
		$data = array(
			'nama_produk' =>$this->input->post('nama_produk'),
			'harga' =>$this->input->post('harga'),
			'kategori_id' =>$this->input->post('kategori_id'),
			'status_id' =>$this->input->post('status_id')
		);

		$nama_produk = $this->input->post('nama_produk');
		$produk = $this->db->query("select * from produk where nama_produk='$nama_produk'");
        $cek = $produk->num_rows();

        if($cek == 0){
            $this->db->insert('produk',$data);
        }	
	}

	public function updateProduk()
  	{
		$id_produk = $this->input->post("id_produk");
		$data = array(
			'nama_produk' =>$this->input->post('nama_produk'),
			'harga' =>$this->input->post('harga'),
			'kategori_id' =>$this->input->post('kategori_id'),
			'status_id' =>$this->input->post('status_id')
		  );
    	$this->db->where('id_produk',$id_produk);
    	return $this->db->update('produk',$data);
  	}
    
    public function hapusProduk()
  	{
		$id_produk = $this->input->post("id_produk");
		$this->db->where('id_produk',$id_produk);
		return $this->db->delete('produk');
  	}

	public function hapusCheckbox()
  	{ 
		$id_produk = $this->input->post("id_produk");
		$this->db->where_in('id_produk',$id_produk);
		return $this->db->delete('produk');
  	}
}
?>