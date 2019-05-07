<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#pasien" data-toggle="tab">Pasien <i class="glyphicon"></i></a></li>
        <li><a href="#rekam" data-toggle="tab">Rekam Medis <i class="glyphicon"></i></a></li>
      </ul>
      </br>
  <form role="form"  id="addapotek" class="form-horizontal" name="addapoteks" action="pros.php" method="Post">

  <div class="tab-content">
  <div class="tab-pane active" id="pasien">
  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <input class="form-control" name="nama" placeholder="nama" type="text">
  </div>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-3">
  <div class="input-group">
  <input class="form-control" name="umur" placeholder="umur" type="text">
  </div>
  </div>
  <div class="col-md-5">
  <select class="form-control" name="time" required>
  <option value="">Pilih Bulan, Tahun & Hari</option>
  <option value="thn" selected>Tahun</option>
  <option value="bln">Bulan</option>
  <option value="hr">Hari</option>
  </select>
  </div>
  </div>

  <div class="form-group">
  <label class="col-lg-3 control-label">Kategori</label>
  <div class="col-lg-5">
  <div class="radio">
  <label><input type="radio" name="kategori" value="D" /> Dewasa</label>&nbsp;&nbsp;
  <label><input type="radio" name="kategori" value="A" /> Anak</label>
  </div>
  </div>
  </div>

  <div class="form-group">
  <label class="col-lg-3 control-label">Jenis Kelamin</label>
  <div class="col-lg-5">
  <div class="radio">
  <label><input type="radio" name="gender" value="L" />Laki-laki</label>&nbsp;&nbsp;
  <label><input type="radio" name="gender" value="P" />Perempuan</label>
  </div>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <input type="text" class="form-control" name="alamat" placeholder="alamat" />
  </div>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <input type="text" class="form-control" name="nohp" placeholder="nomor hp" />
  </div>
  </div>
  </div>

  </div>
  <div class="tab-pane" id="rekam">
  <div class="form-group">
  <div class="col-md-5">
  <input class="form-control" name="tanggal" type="date" required/>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <textarea class="form-control" name="keluhan" placeholder="keluhan"></textarea>
  </div>
  </div>
  </div>

      <legend><h5>Penunjang :</h5></legend>
  <div class="row">
  <div class="col-md-2"><input class="form-control" name="bb" placeholder="BB" type="text"/></div>
  <div class="col-md-2"><input class="form-control" name="ss" placeholder="S" type="text"/></div>
  <div class="col-md-2"><input class="form-control" name="td" placeholder="TD" type="text"/></div>
  
  </div>
  <hr/>

  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <input class="form-control" name="alergi" placeholder="alergi" type="text"/>
  </div>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-5">
  <div class="input-group">
  <textarea class="form-control" name="obat" placeholder="obat yang diberikan"></textarea>
  </div>
  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-3">
  <div class="input-group">
  <input type="text" class="form-control" name="tarif" placeholder="T" />
  </div>
  </div>
  </div>

  </div>
  </div>

  <div class="form-group">
  <div class="col-sm-5">
  <button type="submit" name="saves" id="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span></button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
  </div>
  </form>


      </div>
    </div>
 </div>
 </div>
