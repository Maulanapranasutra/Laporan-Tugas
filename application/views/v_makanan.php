
<h1>makanan</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>

<?php }?>
<table class="table table-hover table-stripped">

	<thead>

		<tr>

			<td>no</td><td>kode_makanan</td><td>makanan</td><td>tahun</td><td>kategori</td><td>harga</td><td>cover</td><td>stok</td><td></td><td></td>

		</tr>

	</thead>

	<tbody>


		<?php $no = 0; foreach($makanan as $bk): $no++;?>







		<tr>

			<td><?=$no?></td><td><?=$bk->kode_makanan?></td><td><?=$bk->makanan?></td><td><?=$bk->tahun?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td><td><img src="<?=base_url(''.$bk->cover)?>" style="width:40px;"></td><td><?=$bk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_makanan?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/makanan/hapus/'.$bk->kode_makanan)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" class="btn btn-danger">Hapus</a><?php }else{ echo "anda kasir"; }?></td>

		</tr>



	<?php endforeach?>


</tbody>

</table>




<div class="modal fade" id="tambah" >
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">


			<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Tambah makanan</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/makanan/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td>judul makanan</td>
							<td><input type="text" name="makanan" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>tahun</td>
							<td><input type="number" name="tahun" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>foto cover</td>
							<td><input type="file" name="cover" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>penerbit</td>
							<td><input type="text" name="penerbit" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>penulis</td>
							<td><input type="text" name="penulis" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>
		</div>
	</div>

</div>



<div class="modal fade" id="ubah" >
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Ubah makanan</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/makanan/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_makanan" required id="kode_makanan" style="margin-left: 20px;">

						<tr>
							<td>judul makanan</td>
							<td><input type="text" name="makanan"  required  id="makanan" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>tahun</td>
							<td><input type="number" name="tahun" required  id="tahun" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>foto cover</td>
							<td><input type="file" name="cover"   id="cover" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>penerbit</td>
							<td><input type="text" name="penerbit" required   id="penerbit" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>penulis</td>
							<td><input type="text" name="penulis" required  id="penulis" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>
		</div>
	</div>

</div>




<script >


	function edit(kode_makanan){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/makanan/tampil_ubah_makanan/"+kode_makanan,
			dataType:"json",


			success:function(data){
				$("#kode_makanan").val(data.kode_makanan);
				$("#makanan").val(data.makanan);
				$("#tahun").val(data.tahun);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				// $("#penerbit").val(data.penerbit);
				// $("#penulis").val(data.penulis);
				$("#stok").val(data.stok);
			}
		});
	}

</script>
