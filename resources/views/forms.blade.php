{{-- Categoria --}}
@if($Modo == 'crearPRC' || $Modo == 'editarPRC')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ $Modo == 'crearPRC' ? '➕ Agregar Categoria' : '✏️ Modificar Categoria' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📌 Nombre de la Categoria</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($category->name) ? $category->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">📝 Descripción</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ isset($category->description) ? $category->description : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Producto --}}
@if($Modo == 'crearP' || $Modo == 'editarP')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">{{ $Modo == 'crearP' ? '🛒 Agregar Producto' : '✏️ Modificar Producto' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📦 Nombre del Producto</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($product->name) ? $product->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">📝 Descripción</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ isset($product->description) ? $product->description : '' }}">
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">💲 Precio</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ isset($product->price) ? $product->price : '' }}">
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">📊 Stock</label>
                <input type="number" name="stock" id="stock" class="form-control"
                    value="{{ isset($product->stock) ? $product->stock : '' }}">
            </div>
            <div class="col-md-6">
                <label for="alsproduct_category_id" class="form-label">📂 Categoria</label>
                <select name="alsproduct_category_id" id="alsproduct_category_id" class="form-select">
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}" {{ isset($product->alsproduct_category_id) && $product->alsproduct_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="alssupllier_id" class="form-label">🚚 Proveedor</label>
                <select name="alssupllier_id" id="alssupllier_id" class="form-select">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ isset($product->alssupllier_id) && $product->alssupllier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->contactoName }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Proveedor --}}
@if($Modo == 'crearSP' || $Modo == 'editarSP')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">{{ $Modo == 'crearSP' ? '➕ Agregar Proveedor' : '✏️ Modificar Proveedor' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="contactoName" class="form-label">👤 Nombre del Proveedor</label>
                <input type="text" name="contactoName" id="contactoName" class="form-control"
                    value="{{ isset($supplier->contactName) ? $supplier->contactName : '' }}">
            </div>
            <div class="col-md-6">
                <label for="nameEmpresa" class="form-label">🏢 Nombre de Empresa</label>
                <input type="text" name="nameEmpresa" id="nameEmpresa" class="form-control"
                    value="{{ isset($supplier->nameEmpresa) ? $supplier->nameEmpresa : '' }}">
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">📍 Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control"
                    value="{{ isset($supplier->direccion) ? $supplier->direccion : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Ventas --}}
@if($Modo == 'crearV' || $Modo == 'editarV')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-danger text-white">
        <h4 class="mb-0">{{ $Modo == 'crearV' ? '💵 Agregar Venta' : '✏️ Modificar Venta' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="cantidad" class="form-label">🔢 Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control"
                    value="{{ isset($venta->cantidad) ? $venta->cantidad : '' }}">
            </div>

            <div class="col-md-6">
                <label for="fecha_venta" class="form-label">📅 Fecha de Venta</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="form-control"
                    value="{{ isset($venta->fecha_venta) ? $venta->fecha_venta : '' }}">
            </div>

            <div class="col-md-6">
                <label for="total" class="form-label">💲 Total</label>
                <input type="number" step="0.01" name="total" id="total" class="form-control"
                    value="{{ isset($venta->total) ? $venta->total : '' }}" readonly>
            </div>

            <div class="col-md-6">
                <label for="product_id" class="form-label">📦 Producto</label>
                <select name="product_id" id="product_id" class="form-select">
                    @foreach($produc as $producto)
                        <option value="{{ $producto->id }}" 
                            data-price="{{ $producto->price }}"
                            {{ isset($venta->product_id) && $venta->product_id == $producto->id ? 'selected' : '' }}>
                            {{ $producto->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Script para calcular total --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectProduct = document.getElementById("product_id");
        const cantidadInput = document.getElementById("cantidad");
        const totalInput = document.getElementById("total");

        function calcularTotal() {
            let selectedOption = selectProduct.options[selectProduct.selectedIndex];
            let price = parseFloat(selectedOption.getAttribute("data-price")) || 0;
            let cantidad = parseInt(cantidadInput.value) || 0;
            let total = price * cantidad;
            totalInput.value = total.toFixed(2);
        }

        // Cuando cambie producto o cantidad recalcular
        selectProduct.addEventListener("change", calcularTotal);
        cantidadInput.addEventListener("input", calcularTotal);

        // Calcular al cargar si ya hay datos
        calcularTotal();
    });
</script>
@endif


{{-- Cliente --}}
@if($Modo == 'crearCli' || $Modo == 'editarCli')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ $Modo == 'crearCli' ? '👤 Agregar Cliente' : '✏️ Modificar Cliente' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📝 Nombre</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($client->name) ? $client->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="fSurname" class="form-label">📝 Apellido Paterno</label>
                <input type="text" name="fSurname" id="fSurname" class="form-control"
                    value="{{ isset($client->fSurname) ? $client->fSurname : '' }}">
            </div>
            <div class="col-md-6">
                <label for="sSurname" class="form-label">📝 Apellido Materno</label>
                <input type="text" name="sSurname" id="sSurname" class="form-control"
                    value="{{ isset($client->sSurname) ? $client->sSurname : '' }}">
            </div>
            <div class="col-md-6">
                <label for="dni" class="form-label">🆔 DNI</label>
                <input type="text" name="dni" id="dni" class="form-control"
                    value="{{ isset($client->dni) ? $client->dni : '' }}">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">📞 Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control"
                    value="{{ isset($client->telefono) ? $client->telefono : '' }}">
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">📧 Correo</label>
                <input type="email" name="correo" id="correo" class="form-control"
                    value="{{ isset($client->correo) ? $client->correo : '' }}">
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">🎂 Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                    value="{{ isset($client->fecha_nacimiento) ? $client->fecha_nacimiento : '' }}"
                    max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="col-md-6">
                <label for="genero" class="form-label">⚧ Género</label>
                <select name="genero" id="genero" class="form-select">
                    <option value="1" {{ isset($client->genero) && $client->genero == 1 ? 'selected' : '' }}>Masculino</option>
                    <option value="0" {{ isset($client->genero) && $client->genero == 0 ? 'selected' : '' }}>Femenino</option>
                    <option value="2" {{ isset($client->genero) && $client->genero == 2 ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">📍 Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control"
                    value="{{ isset($client->direccion) ? $client->direccion : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Usuario --}}
@if($Modo == 'crearUser' || $Modo == 'editarUser')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">{{ $Modo == 'crearUser' ? '👤 Agregar Usuario' : '✏️ Modificar Usuario' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📝 Nombre</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($user->name) ? $user->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">📧 Correo</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ isset($user->email) ? $user->email : '' }}">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">🔑 Contraseña</label>
                <input type="password" name="password" id="password" class="form-control"
                    value="{{ isset($user->password) ? $user->password : '' }}">
            </div>
            <div class="col-md-6">
                <label for="client_id" class="form-label">👥 Cliente</label>
                <select name="client_id" id="client_id" class="form-select">
                    @foreach($cli as $clien)
                        <option value="{{ $clien->id }}" {{ isset($user->clien_id) && $user->clien_id == $clien->id ? 'selected' : '' }}>
                            {{ $clien->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Pedido --}}
@if($Modo == 'crearPedido' || $Modo == 'editarPedido')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-secondary text-white">
        <h4 class="mb-0">{{ $Modo == 'crearPedido' ? '📦 Agregar Pedido' : '✏️ Modificar Pedido' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="user_id" class="form-label">👤 Usuario</label>
                <select name="user_id" id="user_id" class="form-select">
                    @foreach($usuario as $usu)
                        <option value="{{ $usu->id }}" {{ isset($order->usu_id) && $order->usu_id == $usu->id ? 'selected' : '' }}>
                            {{ $usu->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="product_id" class="form-label">📦 Producto</label>
                <select name="product_id" id="product_id" class="form-select">
                    @foreach($productos as $prod)
                        <option value="{{ $prod->id }}" {{ isset($order->prod_id) && $order->prod_id == $prod->id ? 'selected' : '' }}>
                            {{ $prod->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endif


{{--  Cliente  --}}
@if ($Modo == 'Encabezado')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/products')}}">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.create') }}">Pedido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactanos')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/nosotros') }}">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif


{{--  Administrador  --}}
@if ($Modo == 'EncabezadoAdmin')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/products')}}">Producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/orders') }}">Pedido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactanos')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif