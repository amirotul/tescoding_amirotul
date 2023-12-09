<?php
/**
 * 
 */
class Model_savedataapi extends CI_Model
{
	
	function save_api($data){
        foreach ($data as $dt)
        {
            $arr = [];
            $arr['nama_produk'] = $dt->nama_produk;
            $arr['harga'] = $dt->harga;

            if($dt->kategori == "L QUEENLY"){
                $arr['kategori_id'] = 1;
            }
            elseif($dt->kategori == "L MTH AKSESORIS (IM)"){
                $arr['kategori_id'] = 2;
            }
            elseif($dt->kategori == "L MTH TABUNG (LK)"){
                $arr['kategori_id'] = 3;
            }
            elseif($dt->kategori == "CI MTH TINTA LAIN (IM)"){
                $arr['kategori_id'] = 4;
            }
            elseif($dt->kategori == "L MTH AKSESORIS (LK))"){
                $arr['kategori_id'] = 5;
            }
            elseif($dt->kategori == "S MTH STEMPEL (IM)"){
                $arr['kategori_id'] = 6;
            }
            elseif($dt->kategori == "SP MTH SPAREPART (LK)"){
                $arr['kategori_id'] = 7;
            }
            elseif($dt->kategori == "L MTH AKSESORIS (LK)"){
                $arr['kategori_id'] = 8;
            }

            if($dt->status == "bisa dijual"){
                $arr['status_id'] = 1;
            }
            elseif($dt->status == "tidak bisa dijual"){
                $arr['status_id'] = 2;
            }

            $produk = $this->db->query("select * from produk where nama_produk='$dt->nama_produk'");
            $cek = $produk->num_rows();

            if($cek == 0){
                $this->db->insert('produk', $arr);
            }

        }
    }

}
?>