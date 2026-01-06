@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
            <!-- Header -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-lg bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="fas fa-edit fa-2x text-warning"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">Edit Kelas</h4>
                            <p class="text-muted mb-0">Memperbarui data kelas {{ $kelas->nama_kelas }}</p>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: 100%"></div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <!-- Notifikasi -->
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Validasi Error!</h5>
                                <ul class="mb-0 ps-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('classes.update', $kelas->id) }}" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Current Data -->
                        <div class="alert alert-secondary mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-history fa-lg me-3"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Data Saat Ini</h6>
                                    <p class="mb-0">
                                        <span class="fw-bold">Nama Kelas:</span> 
                                        <span class="badge bg-dark">{{ $kelas->nama_kelas }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kelas -->
                        <div class="mb-4">
                            <label for="nama_kelas" class="form-label fw-semibold">
                                <i class="fas fa-chalkboard-teacher text-primary me-2"></i>
                                Nama Kelas Baru <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-school text-muted"></i>
                                </span>
                                <input type="text" 
                                       class="form-control border-start-0 @error('nama_kelas') is-invalid @enderror" 
                                       id="nama_kelas" 
                                       name="nama_kelas" 
                                       value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                                       placeholder="Masukkan nama kelas baru"
                                       required
                                       autofocus>
                                <button type="button" class="btn btn-outline-secondary" onclick="resetToOriginal()">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                            @error('nama_kelas')
                                <div class="invalid-feedback d-block mt-2">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle me-1 text-primary"></i>
                                Pastikan nama kelas unik dan mudah dipahami
                            </div>
                        </div>

                        <!-- Change Indicator -->
                        <div class="card border mb-4" id="changeIndicator">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fas fa-exchange-alt me-2"></i> Perubahan
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-5">
                                        <div class="p-3 border rounded">
                                            <small class="text-muted d-block mb-1">DARI</small>
                                            <h5 id="originalName" class="mb-0">{{ $kelas->nama_kelas }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-arrow-right fa-xl text-primary"></i>
                                    </div>
                                    <div class="col-5">
                                        <div class="p-3 border rounded bg-primary bg-opacity-10">
                                            <small class="text-primary fw-bold d-block mb-1">MENJADI</small>
                                            <h5 id="newName" class="mb-0 text-primary">{{ $kelas->nama_kelas }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <div id="changeStatus" class="badge bg-success">
                                        <i class="fas fa-check me-1"></i> Tidak ada perubahan
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <div>
                                <a href="{{ route('classes.show', $kelas->id) }}" 
                                   class="btn btn-outline-secondary px-4 me-2">
                                    <i class="fas fa-eye me-2"></i> Lihat Detail
                                </a>
                                <a href="{{ route('classes.index') }}" 
                                   class="btn btn-outline-danger px-4">
                                    <i class="fas fa-times me-2"></i> Batal
                                </a>
                            </div>
                            <div class="btn-group">
                                <button type="reset" class="btn btn-outline-warning px-4">
                                    <i class="fas fa-redo me-2"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary px-5" id="submitBtn">
                                    <i class="fas fa-save me-2"></i> Update Kelas
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Footer -->
                <div class="card-footer bg-light py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                Dibuat: {{ $kelas->created_at->format('d M Y H:i') }}
                            </small>
                        </div>
                        <div class="col-md-6 text-end">
                            <small class="text-muted">
                                <i class="fas fa-history me-1"></i>
                                Terakhir diupdate: {{ $kelas->updated_at->format('d M Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    #changeIndicator .card-body {
        padding: 1.5rem;
    }
    #changeStatus {
        transition: all 0.3s ease;
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }
</style>
@endpush

@push('scripts')
<script>
    const originalName = "{{ $kelas->nama_kelas }}";
    
    // Track changes
    document.getElementById('nama_kelas').addEventListener('input', function() {
        const newName = this.value.trim().toUpperCase();
        const changeIndicator = document.getElementById('changeStatus');
        const newNameElement = document.getElementById('newName');
        const submitBtn = document.getElementById('submitBtn');
        
        // Update new name display
        newNameElement.textContent = newName || originalName;
        
        if (newName === originalName || newName === '') {
            // No changes
            changeIndicator.className = 'badge bg-success';
            changeIndicator.innerHTML = '<i class="fas fa-check me-1"></i> Tidak ada perubahan';
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i> Update Kelas';
        } else if (newName.length < 3) {
            // Invalid
            changeIndicator.className = 'badge bg-danger';
            changeIndicator.innerHTML = '<i class="fas fa-times me-1"></i> Nama terlalu pendek';
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i> Perbaiki Data';
        } else {
            // Valid changes
            changeIndicator.className = 'badge bg-warning';
            changeIndicator.innerHTML = '<i class="fas fa-edit me-1"></i> Ada perubahan';
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i> Simpan Perubahan';
        }
    });

    // Reset to original
    function resetToOriginal() {
        document.getElementById('nama_kelas').value = originalName;
        document.getElementById('nama_kelas').dispatchEvent(new Event('input'));
    }

    // Auto uppercase
    document.getElementById('nama_kelas').addEventListener('keyup', function() {
        const cursorPos = this.selectionStart;
        this.value = this.value.toUpperCase();
        this.setSelectionRange(cursorPos, cursorPos);
    });

    // Form validation
    document.getElementById('editForm').addEventListener('submit', function(e) {
        const newName = document.getElementById('nama_kelas').value.trim().toUpperCase();
        
        if (newName === originalName) {
            e.preventDefault();
            showAlert('warning', 'Tidak ada perubahan yang dilakukan!');
            return false;
        }
        
        if (newName === '') {
            e.preventDefault();
            showAlert('error', 'Nama kelas tidak boleh kosong!');
            return false;
        }
        
        return true;
    });

    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            <i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.querySelector('.card-body').insertBefore(alertDiv, document.querySelector('form'));
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 3000);
    }
</script>
@endpush
@endsection