<div class="card-header">
    <h3 class="card-title">Form Biodata</h3>
</div>
<div class="card-body">
    <!-- Date dd/mm/yyyy -->

    <!-- phone mask -->
    <div class="form-group">
        {{ Form::label('divisi', 'Pilih Divisi') }}

        <div class="input-group">
            <select class="form-control" id="divisi" name="divisi"
                    style="width: 100%;"
                    required>
                <option selected="selected" value="">-- Pilih Divisi --</option>
                @foreach($divisi as $value)
                    @if (Request::old('divisi') == $value->id_divisi)
                        <option value="{{$value->id_divisi}}"
                                selected>{{$value->nama_divisi}}</option>
                    @else
                        <option
                            value="{{$value->id_divisi}}">{{$value->nama_divisi}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <!-- phone mask -->
    <div class="form-group">
        {{ Form::label('nama', 'Nama Lengkap & Gelar') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="nama"
                   value="{{old('nama')}}"
                   id="nama" required>
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
    <div class="form-group">
        {{ Form::label('tempatlahir', 'Tempat Lahir') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
            </div>
            <input type="text" name="tempatlahir" class="form-control"
                   id="tempatlahir"
                   value="{{old('tempatlahir')}}"
                   required>
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('tgllahir', 'Tanggal Lahir') }}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input autocomplete="none" name="tanggallahir" type="text"
                   class="form-control pull-right datepicker"
                   id="datepicker" value="{{old('tanggallahir')}}" required>
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('alamat', 'Alamat Lengkap') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
            </div>
            <input name="alamat" type="text" class="form-control"
                   value="{{old('alamat')}}"
                   id="alamat" required>
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('nik', 'NIK') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <input name="nik" type="text" class="form-control" id="nik"
                   value="{{old('nik')}}" required>
            @if ($errors->any())
                {!! $errors->first('nik', '<p style="font-size: 12px; color:red">ERROR! input NIK harus 16 digit dan Berupa Angka atau data sudah ada.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('email', 'E-mail') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
            </div>
            <input name="email" type="text" class="form-control" id="email"
                   value="{{old('email')}}" required>
            @if ($errors->any())
                {!! $errors->first('email', '<p style="font-size: 12px; color:red">ERROR! inputkan dengan format e-mail yang benar.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('telp', 'No. Telp') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input type="text" class="form-control" name="hp" id="hp"
                   value="{{old('hp')}}"
                   required>
            @if ($errors->any())
                {!! $errors->first('hp', '<p style="font-size: 12px; color:red">ERROR! input No. HP Harus Berupa Angka.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('jeniskelamin', 'Jenis Kelamin') }}

        <div class="input-group">
            <select class="form-control" id="jeniskelamin" name="jeniskelamin"
                    style="width: 100%;" required>
                <option selected="selected" value="">-- Pilih Jenis Kelamin --
                </option>
                @foreach($jk as $data)
                    @if (Request::old('jeniskelamin') == $data->id_jk)
                        <option value="{{$data->id_jk}}"
                                selected>{{$data->jenis_kelamin}}</option>
                    @else
                        <option
                            value="{{$data->id_jk}}">{{$data->jenis_kelamin}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('pendidikan', 'Pendidikan') }}

        <div class="input-group">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="pendidikan" id="pendidikan"
                            style="width: 100%;" required>
                        <option selected="selected" value="">-- Pilih Pendidikan
                            Terakhir --
                        </option>
                        @foreach($pendidikan as $pend)
                            @if (Request::old('pendidikan') == $pend->id_pendidikan)
                                <option value="{{$pend->id_pendidikan}}"
                                        selected>{{$pend->pendidikan}}</option>
                            @else
                                <option
                                    value="{{$pend->id_pendidikan}}">{{$pend->pendidikan}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6" style="display: none" id="divjurusan">
                    <input type="text" name="jurusan" class="form-control" id="jurusan"
                           placeholder="Masukkan jurusan" value="{{old('jurusan')}}"
                           required>
                </div>
            </div>
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('no_rekening', 'No. Rekening') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
            </div>
            <input name="no_rekening" type="text" class="form-control"
                   id="no_rekening"
                   value="{{old('no_rekening')}}" required>
            @if ($errors->any())
                {!! $errors->first('no_rekening', '<p style="font-size: 12px; color:red">ERROR! input No. Rekening harus Berupa Angka.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('npwp', 'NPWP') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
            </div>
            <input type="text" class="form-control" name="npwp" id="npwp"
                   value="{{old('npwp')}}" required>
        </div>
        <!-- /.input group -->
    </div>
    <!-- IP mask -->
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" name="password"
                   value="{{old('dev_team')}}"
                   id="password" required>
            @if ($errors->any())
                {!! $errors->first('password', '<p style="font-size: 12px; color:red">ERROR! input Password minimal 8 digit.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
