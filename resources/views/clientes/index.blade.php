<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
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
            --danger: #ef4444;
            --danger-hover: #dc2626;
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
            max-width: 1100px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1rem;
        }

        h1 { margin: 0; font-size: 1.5rem; color: var(--text-main); }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); }
        
        .btn-sm { padding: 0.4rem 0.8rem; font-size: 0.85rem; }
        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text-main); }
        .btn-outline:hover { background: #f9fafb; }
        .btn-danger { background: var(--danger); color: white; }
        .btn-danger:hover { background: var(--danger-hover); }

        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: var(--text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr:hover td { background-color: #f9fafb; }

        .actions { display: flex; gap: 0.5rem; align-items: center; }
        
        form { margin: 0; }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            border: 1px solid #34d399;
        }

        .empty-state { text-align: center; padding: 3rem; color: var(--text-muted); }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="header-flex">
                <h1>Listado de Clientes</h1>
                <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>CI</th>
                            <th>Teléfono</th>
                            <th>Vehículo</th>
                            <th>Placa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                            <td>{{ $cliente->ci }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->vehiculo_marca }} {{ $cliente->vehiculo_modelo }}</td>
                            <td><strong>{{ $cliente->vehiculo_placa }}</strong></td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-outline">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('¿Eliminar cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">No hay clientes registrados aún.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
