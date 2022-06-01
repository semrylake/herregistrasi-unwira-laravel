<div class="modal fade" id="editpasswordmodal" tabindex="-1" role="dialog" aria-labelledby="modalEditPssword"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditPssword">Form Ubah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update-user/{{ Auth::user()->nip }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="">Nama Lengkap</label>
                        <input name="name" id="name" placeholder="Nama Lengkap" type="text"
                            value="{{ old('name', Auth::user()->name) }}" class="form-control">
                        <div class="invalid-feedback text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="password" class="">Password</label>
                        <input autocomplete="off" name="password" id="password" placeholder="Password" type="password"
                            value="{{ old('password') }}" class="form-control">
                        <div class="invalid-feedback text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="jk" class="">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            @if (old('jk', Auth::user()->jk) == 'Laki-laki')
                            <option id="jk" value="{{Auth::user()->jk}}" selected class="form-control">
                                Laki-laki
                            </option>
                            <option id="jk" value="Perempuan" class="form-control">
                                Perempuan
                            </option>
                            @endif
                            @if (old('jk', Auth::user()->jk) == 'Perempuan')
                            <option id="jk" value="{{Auth::user()->jk}}" selected class="form-control">
                                Perempuan
                            </option>
                            <option id="jk" value="Laki-laki" class="form-control">
                                Laki-laki
                            </option>
                            @endif
                        </select>
                        <div class="invalid-feedback text-danger">
                            @error('jk')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="exampleFile" class="">Foto</label>
                        @if (Auth::user()->foto)
                        <img class="img-preview mb-2 img-fluid col-sm-4" style="height: 150px"
                            src="{{ asset('storage/'.Auth::user()->foto) }}">
                        @else
                        <img class="img-preview mb-2 img-fluid col-sm-4">
                        @endif
                        <input name="foto" id="foto" onchange="previewImage()" type="file" class="form-control-file">
                        <div class="invalid-feedback text-danger">
                            @error('foto')
                            {{ $message }}
                            @enderror
                        </div>
                        <small class="form-text text-muted">File yang diupload hanya type gambar(jpg,png,jpeg), dan
                            tidak boleh dari 1MB</small>
                    </div>
                    <button type="submit" class="mt-1 btn btn-md btn-success"> <i class="fas fa-save mr-2"></i>
                        SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
