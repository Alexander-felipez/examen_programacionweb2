<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #111827;
            --text-muted: #6b7280;
            --border: #e5e7eb;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 800px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 { margin-top: 0; margin-bottom: 2rem; font-size: 1.5rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;}
        h2 { font-size: 1.1rem; color: var(--text-muted); margin-bottom: 1rem; margin-top: 2rem; }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 640px) {
            .grid { grid-template-columns: 1fr; }
        }

        .form-group { margin-bottom: 1.5rem; }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.2s;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-size: 0.95rem;
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); }
        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text-main); }
        .btn-outline:hover { background: #f9fafb; }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 2rem;
            border: 1px solid #f87171;
        }
        .alert-danger ul { margin: 0; padding-left: 1.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Editar Cliente</h1>

            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <h2>Datos Personales</h2>
                <div class="grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Cédula de Identidad (CI)</label>
                        <input type="text" name="ci" value="{{ old('ci', $cliente->ci) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $cliente->email) }}">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
                    </div>
                </div>

                <h2>Datos del Vehículo</h2>
                <div class="grid">
                    <div class="form-group">
                        <label>Marca</label>
                        <input type="text" name="vehiculo_marca" value="{{ old('vehiculo_marca', $cliente->vehiculo_marca) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" name="vehiculo_modelo" value="{{ old('vehiculo_modelo', $cliente->vehiculo_modelo) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Placa</label>
                        <input type="text" name="vehiculo_placa" value="{{ old('vehiculo_placa', $cliente->vehiculo_placa) }}" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
