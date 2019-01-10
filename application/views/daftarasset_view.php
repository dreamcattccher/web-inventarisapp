<?php
  $this->load->view("components/head");
  $this->load->view("components/navbar");
  ?>
<div class="container">
        <div class="modal fade" tabindex="-1" role="dialog" id="form-daftarasset">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"><h3>Form <span id="mode"></span> daftarasset</h3></div>
                    <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="idasset">ID Asset</label>
                            <input type="text" id="idasset" class="form-control" name="idasset">
                        </div>
                        <div class="form-group">
                                <label for="namaasset">Nama Asset</label>
                                <input type="text" id="namaasset" class="form-control" name="namaasset">
                        </div>
                        <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" id="satuan" class="form-control" name="satuan">
                        </div>
                        <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select id="jenis" class="form-control" name="jenis">
                                    <option value="EL">Elektronik</option>
                                    <option value="NE">Non-Elektronik</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <input type="text" id="kondisi" class="form-control" name="kondisi">
                        </div>
                        <div class="form-group">
                                <label for="noruang">No Ruang</label>
                                <select id="noruang" class="form-control" name="noruang">
                                        <option value="201">201</option>
                                        <option value="205">205</option>
                                        <option value="206">206</option>
                                        <option value="207">207</option>
                                        <option value="208">208</option>
                                        <option value="209">209</option>
                                        <option value="210">210</option>
                                        <option value="Lab213">Lab213</option>
                                        <option value="Lab308">Lab308</option>
                                        <option value="Lab313">Lab313</option>
                                </select>
                        </div>
                    </div>
                    </form>


                    <div class="modal-footer">
                        <button class="btn btn-success" id="simpan">
                        <span class="glyphicon glyphicon-floppy-disk"></span>Simpan</button>
                        <button class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>Batal</button>
                    </div> 
                </div>
            </div>
        </div>


        <div class="page-header">
            <h1> <span class="glyphicon glyphicon-briefcase"></span> 
                Daftar Asset <small>Berisi Informasi Daftar Asset Kampus</small></h1>
        </div>

        <button class="btn btn-default" id="reload">
            <span class="glyphicon glyphicon-refresh"></span> Reload
        </button> 

         <button class="btn btn-success pull-right" id="tambah">
            <span class="glyphicon glyphicon-plus"></span> Tambah </button> 
            <div class="clearfix"></div>

            <table class="table table-bordered tabel0-striped tabel-hover"
            style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ID Asset</th>
                    <th>Nama Asset</th>
                    <th>Satuan</th>
                    <th>Jenis</th>
                    <th>Kondisi</th>
                    <th>No Ruang</th>
                    <th colspan="2">Action</th>
                </tr>
               <tbody>


               </tbody>

                
            </thead>
        </table>
    </div>
    <script src="assets/js/myfunction.js"></script>
    <script src="assets/js/app/daftarasset.js"></script>
    <?php
    $this->load->view("components/foot");
     ?>