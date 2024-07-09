  <!-- Modal -->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/panel/kategori">
            @csrf
            <div class="row">
              <div class="col-9">
                <div class="mb-3">
                  <label for="nama">Nama Kategori</label>
                  <input type="text" name="nama" id="nama" class="@error('nama') is-invalid @enderror form-control" value="{{ old('nama') }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="warna">Warna</label>
                  <input type="color" name="warna" id="warna" class="@error('warna') is-invalid @enderror form-control" value="{{ old('warna') }}">
                  @error('warna')
                  <div class="invalid-feedback">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="text-end">
              <button class="btn btn-light me-2" type="button" data-bs-dismiss="modal"><i class="bi bi-x-square me-1"></i>Cancel</button>
              <button class="btn btn-primary" type="submit"><i class="bi bi-save me-1"></i>Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>