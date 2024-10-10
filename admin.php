<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evento</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
}

input[type="text"], input[type="number"], input[type="time"], textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
    resize: vertical;
}

.horarios {
    margin-top: 10px;
}

.horario-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.horario-item input {
    flex-grow: 1;
    margin-right: 10px;
}

.horario-item button {
    background-color: #f44336; /* Rojo */
    color: white;
    border: none;
    padding: 8px;
    cursor: pointer;
    border-radius: 4px;
}

.horario-item button:hover {
    background-color: #d32f2f; /* Rojo más oscuro al pasar el mouse */
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background-color: #45a049;
}

#agregarHorario {
    background-color: #008CBA;
}

#agregarHorario:hover {
    background-color: #007B9A;
}

@media (max-width: 600px) {
    body {
        padding: 10px;
    }

    .container {
        padding: 15px;
        max-width: 100%;
        margin: 0;
        box-shadow: none; 
    }

    h2 {
        font-size: 1.5rem;
    }

    button {
        padding: 10px;
        font-size: 1rem;
    }

    input[type="text"], input[type="number"], textarea, input[type="time"] {
        font-size: 1rem;
        padding: 10px;
    }

    .horario-item {
        flex-direction: column;
    }

    .horario-item input, .horario-item button {
        width: 100%;
        margin-right: 0;
    }

    .horarios button {
        width: 100%;
        margin-top: 10px;
    }
}
   
    </style>
</head>

<body>
    <div class="container">
        <h2>Agregar Nuevo Evento</h2>
        <form id="eventoForm" action="procesar_evento.php" method="POST">
            <label for="nombre">Nombre del Evento:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>

            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" min="1" required>

            <div class="horarios">
                <label>Horarios:</label>
                <div id="horariosContainer">
                    <div class="horario-item">
                        <input type="time" name="horarios[]" required>
                    </div>
                </div>
                <button type="button" id="agregarHorario">+ Agregar Horario</button>
            </div>

            <button type="submit">Guardar Evento</button>
        </form>
    </div>

    <script>
        function agregarHorario() {
            const container = document.getElementById('horariosContainer');
            const nuevoHorario = document.createElement('div');
            nuevoHorario.className = 'horario-item';
            nuevoHorario.innerHTML = `
                <input type="text" name="horarios[]" required>
                <button type="button" onclick="eliminarHorario(this)">Eliminar horario</button>
            `;
            container.appendChild(nuevoHorario);
        }

        function eliminarHorario(btn) {
            btn.parentElement.remove();
        }
        document.getElementById('agregarHorario').addEventListener('click', agregarHorario);
    </script>
</body>
</html>
