<?php
/**
 * 
 */
class Model_status extends CI_Model
{
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('status');
		$query = $this->db->get();
		return $query;
		
	}

	function tambahstatus() { 
		$data = array(
			'nama_status' =>$this->input->post('nama_status')
		  );

		$nama_status = $this->input->post('nama_status');
		$status = $this->db->query("select * from status where nama_status='$nama_status'");
        $cek = $status->num_rows();

        if($cek == 0){
            $this->db->insert('status',$data);
        }
		
	}

	public function updatestatus()
  	{
		$id_status = $this->input->post("id_status");
		$data = array(
			'nama_status' =>$this->input->post('nama_status')
		  );
    	$this->db->where('id_status',$id_status);
    	return $this->db->update('status',$data);
  	}
    
    public function hapusstatus()
  	{
		$id_status = $this->input->post("id_status");
		$this->db->where('id_status',$id_status);
		return $this->db->delete('status');
  	}

	public function hapusCheckbox()
  	{ 
		$id_status = $this->input->post("id_status");
		$this->db->where_in('id_status',$id_status);
		return $this->db->delete('status');
  	}
}
?>