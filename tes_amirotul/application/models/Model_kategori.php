<?php
/**
 * 
 */
class Model_kategori extends CI_Model
{
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('kategori');
		$query = $this->db->get();
		return $query;
		
	}

	function tambahKategori() { 
		$data = array(
			'nama_kategori' =>$this->input->post('nama_kategori')
		  );

		$nama_kategori = $this->input->post('nama_kategori');
		$kategori = $this->db->query("select * from kategori where nama_kategori='$nama_kategori'");
        $cek = $kategori->num_rows();

        if($cek == 0){
            $this->db->insert('kategori',$data);
        }
		
	}

	public function updateKategori()
  	{
		$id_kategori = $this->input->post("id_kategori");
		$data = array(
			'nama_kategori' =>$this->input->post('nama_kategori')
		  );
    	$this->db->where('id_kategori',$id_kategori);
    	return $this->db->update('kategori',$data);
  	}
    
    public function hapusKategori()
  	{
		$id_kategori = $this->input->post("id_kategori");
		$this->db->where('id_kategori',$id_kategori);
		return $this->db->delete('kategori');
  	}

	public function hapusCheckbox()
  	{ 
		$id_kategori = $this->input->post("id_kategori");
		$this->db->where_in('id_kategori',$id_kategori);
		return $this->db->delete('kategori');
  	}
}
?>