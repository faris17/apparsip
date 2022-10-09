 <div class='col-md-12'>
     <div class="row">
         <div class="card p-2">
             <!-- Way 1: Display All Error Messages -->

             @if ($errors->any())

                 <div class="alert alert-danger">
                     <strong>Whoops!</strong> Ada kesalahan input.<br><br>
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>

             @endif
             {{-- jika ada edit --}}
             @if (isset($edit))
                 <h3>Edit Template</h3>
                 <form class="row g-3" method="post" action="{{ route('templates.update', $edit->id) }}"
                     enctype="multipart/form-data">
                     @method('PUT')
                 @else
                     {{-- jika tidak ada berarti tambah --}}
                     <h3>Tambah</h3>
                     <form class="row g-3" method="post" action="{{ route('templates.store') }}"
                         enctype="multipart/form-data">
             @endif
             @csrf
             <div class="col-md-4">
                 <input type='text' class='form-control' name="jenis_surat" id="jenis_surat" required>
             </div>
             <div class="col-md-4">
                 <input type='file' class='form-control' name="file" required
                     accept=".doc,.docx,application/msword">
             </div>
             <div class="col-md-4">
                 @if (isset($edit))
                     <div class="d-flex justify-content-between"></div>
                     <button type="submit" class="btn btn-info mb-3">Update</button>

                     <a href="{{ route('templates.index') }}">
                         <button type="button" class="btn btn-default mb-3">Cancel</button>
                     </a>
                 @else
                     <button type="submit" class="btn btn-primary mb-3">Save</button>
                 @endif
             </div>
             </form>
         </div>
     </div>
 </div>
