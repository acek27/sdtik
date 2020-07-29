<div class="card-header">
    <h3 class="card-title">Form Biodata</h3>
</div>
<div class="card-body">
    <!-- Date dd/mm/yyyy -->

    <!-- phone mask -->
    <div class="form-group">
        {{ Form::label('divisi', 'Pilih Divisi') }}

        <div class="input-group">
            {{ Form::select('id_divisi', $divisi,null,[
                'class'=>'form-control select2',
                'id' => 'id_divisi'
            ]) }}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <!-- phone mask -->
    <div class="form-group">
        {{ Form::label('nm_tenaga', 'Nama Lengkap & Gelar') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            {{ Form::text('nm_tenaga',null,[
                'class'=>'form-control',
                'id' => 'nm_tenaga'
            ]) }}
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
            {{ Form::text('tempat_lahir',null,[
                 'class'=>'form-control',
                 'id' => 'tempat_lahir'
             ]) }}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('tgllahir', 'Tanggal Lahir') }}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            {{ Form::text('tgl_lahir',null,[
                'class'=>'form-control datepicker',
                'id' => 'tgl_lahir'
            ]) }}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('alamat', 'Alamat Lengkap') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
            </div>
            {{ Form::text('alamat',null,[
                'class'=>'form-control',
                'id' => 'alamat'
            ]) }}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('nik', 'NIK') }}

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            {{ Form::text('nik',null,[
                 'class'=>'form-control',
                 'id' => 'nik'
             ]) }}
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
            {{ Form::email('email',null,[
                 'class'=>'form-control',
                 'id' => 'email'
             ]) }}
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
            {{ Form::text('telp',null,[
                'class'=>'form-control',
                'id' => 'telp'
            ]) }}
            @if ($errors->any())
                {!! $errors->first('telp', '<p style="font-size: 12px; color:red">ERROR! input No. HP Harus Berupa Angka.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('jeniskelamin', 'Jenis Kelamin') }}

        <div class="input-group">
            {{ Form::select('id_jk', $jk,null,[
               'class'=>'form-control select2',
               'id' => 'id_jk'
           ]) }}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {{ Form::label('pendidikan', 'Pendidikan') }}

        <div class="row">
            <div class="input-group">
                <div class="col-md-4">
                    {{ Form::select('id_pendidikan', $pendidikan,null,[
                        'class'=>'form-control select2',
                        'id' => 'id_pendidikan',
                        'placeholder' => '-Pilih Pendidikan-'
                    ]) }}
                </div>
                <div class="col-md-8" style="display: none" id="divjurusan">
                    {{ Form::text('prog_studi',null,[
                        'class'=>'form-control',
                        'id' => 'prog_studi',
                    ]) }}
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
            {{ Form::text('no_rekening',null,[
                        'class'=>'form-control',
                        'id' => 'no_rekening',
                    ]) }}
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
            {{ Form::text('npwp',null,[
                        'class'=>'form-control',
                        'id' => 'npwp',
                    ]) }}
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
            {{ Form::password('password',null,[
                          'class'=>'form-control',
                          'id' => 'password',
                      ]) }}
            @if ($errors->any())
                {!! $errors->first('password', '<p style="font-size: 12px; color:red">ERROR! input Password minimal 8 digit.</p>') !!}
            @endif
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        {!! Form::submit('Simpan', [
            'class'=>'btn btn-info',
            'id' => 'save'
        ]) !!}
    </div>
</div>
