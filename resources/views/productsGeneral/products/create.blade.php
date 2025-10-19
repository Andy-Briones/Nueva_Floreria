<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div>
        @include('forms', ['Modo' => 'EncabezadoAdmin'])
    </div>
</head>

<body>
    <div class="container mt-4">
        <form action="{{url('/products')}}" method="POST" enctype="multipart/form-data"
            class="p-4 bg-white shadow rounded">
            @csrf
            @include('forms', ['Modo' => 'crearP'])
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary me-2">💾 Guardar</button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">⬅️ Cancelar</a>
            </div>
        </form>
    </div>

    <button id="btnOpenCarac" class="btn btn-success">➕ Nueva Categoría</button>
<button id="btnOpenSupplier" class="btn btn-info">➕ Nuevo Proveedor</button>



    <!-- 📌 Formulario flotante: Categoría -->
<div id="formCaracFloating" class="form-container" style="display: none;">
    <span class="close-btn">&times;</span>
    <div class="form-header">➕ Agregar Categoría</div>

    <form id="caracFormFloating" action="{{ route('product_categories.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms', ['Modo' => 'crearPRC'])
        <div class="text-center mt-4">
            <button type="button" id="btnGuardarCarac" class="btn btn-primary me-2">💾 Guardar</button>
            <button type="button" class="btn btn-outline-secondary btnCloseFloating">⬅️ Cancelar</button>
        </div>
    </form>
</div>

<!-- 📌 Formulario flotante: Proveedor -->
<div id="formSupplierFloating" class="form-container" style="display: none;">
    <span class="close-btn">&times;</span>
    <div class="form-header">➕ Agregar Proveedor</div>

    <form id="supplierFormFloating" action="{{ route('suppliers.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms', ['Modo' => 'crearSP'])
        <div class="text-center mt-4">
            <button type="button" id="btnGuardarSupplier" class="btn btn-primary me-2">💾 Guardar</button>
            <button type="button" class="btn btn-outline-secondary btnCloseSuppFloating">⬅️ Cancelar</button>
        </div>
    </form>
</div>

<!-- 🧠 JS para abrir/cerrar y guardar con AJAX -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // CATEGORÍA
    const btnOpenCarac = document.getElementById('btnOpenCarac');
    const formCaracFloating = document.getElementById('formCaracFloating');
    const btnCloseCaracX = formCaracFloating.querySelector('.close-btn');
    const btnCloseCaracCancel = formCaracFloating.querySelector('.btnCloseFloating');
    const btnGuardarCarac = document.getElementById('btnGuardarCarac');

    if (btnOpenCarac) {
        btnOpenCarac.addEventListener('click', () => formCaracFloating.style.display = 'block');
    }
    btnCloseCaracX.addEventListener('click', () => formCaracFloating.style.display = 'none');
    btnCloseCaracCancel.addEventListener('click', () => formCaracFloating.style.display = 'none');

    btnGuardarCarac.addEventListener('click', () => {
        const formData = new FormData(document.getElementById('caracFormFloating'));

        fetch("{{ route('product_categories.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('✅ Categoría guardada correctamente');
                formCaracFloating.style.display = 'none';
                location.reload();
            } else {
                alert('❌ Error al guardar la categoría');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('❌ Error en la petición');
        });
    });

    // PROVEEDOR
    const btnOpenSupplier = document.getElementById('btnOpenSupplier');
    const formSupplierFloating = document.getElementById('formSupplierFloating');
    const btnCloseSuppX = formSupplierFloating.querySelector('.close-btn');
    const btnCloseSuppCancel = formSupplierFloating.querySelector('.btnCloseSuppFloating');
    const btnGuardarSupplier = document.getElementById('btnGuardarSupplier');

    if (btnOpenSupplier) {
        btnOpenSupplier.addEventListener('click', () => formSupplierFloating.style.display = 'block');
    }
    btnCloseSuppX.addEventListener('click', () => formSupplierFloating.style.display = 'none');
    btnCloseSuppCancel.addEventListener('click', () => formSupplierFloating.style.display = 'none');

    btnGuardarSupplier.addEventListener('click', () => {
        const formData = new FormData(document.getElementById('supplierFormFloating'));

        fetch("{{ route('suppliers.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('✅ Proveedor guardado correctamente');
                formSupplierFloating.style.display = 'none';
                location.reload();
            } else {
                alert('❌ Error al guardar el proveedor');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('❌ Error en la petición');
        });
    });
});
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>