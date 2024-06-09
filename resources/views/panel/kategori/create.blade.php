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
                  <input type="text" name="nama" id="nama" class="form-control" value="{{ old('judul') }}">
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="warna">Warna</label>
                  <input type="color" name="warna" id="warna" class="form-control form-control-color" value="{{ old('warna') }}">
                </div>
              </div>
            </div>
            <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>