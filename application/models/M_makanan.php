
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_makanan extends CI_Model {

	public function ambilmakanan(){
			$ambilmakanan = $this->db->join('kategori', 'kategori.kode_kategori = makanan.kode_kategori')->get('makanan')->result();

			return $ambilmakanan;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'makanan' => $this->input->post('makanan'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				// 'penerbit' => $this->input->post('penerbit'),
				// 'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'makanan' => $this->input->post('makanan'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				// 'penerbit' => $this->input->post('penerbit'),
				// 'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('makanan', $tambah);
	}

public function tampil_ubah_makanan($kode_makanan){
		return $this->db->join('kategori', 'kategori.kode_kategori = makanan.kode_kategori')->where('kode_makanan',$kode_makanan)->get('makanan')->row();

	}



public function update(){
			$ubah = array(
				'makanan' => $this->input->post('makanan'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				// 'penerbit' => $this->input->post('penerbit'),
				// 'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_makanan',$this->input->post('kode_makanan'))->update('makanan', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'makanan' => $this->input->post('makanan'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				// 'penerbit' => $this->input->post('penerbit'),
				// 'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_makanan',$this->input->post('kode_makanan'))->update('makanan', $ubah);





}


public function hapus($kode_makanan ){
	return $this->db->where('kode_makanan',$kode_makanan)->delete('makanan');
}




public function ambilmakanancart($kode_makanan){
	return $this->db->where('kode_makanan',$kode_makanan )->get('makanan')->row();

}

}

/* End of file M_makanan.php */
/* Location: ./application/models/M_makanan.php */

?>
