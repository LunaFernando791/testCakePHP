<?php
namespace App\Service;
class PrologService
{
    public function procesarMensaje($entrada)
        {
            // Ruta a la instalación de SWI-Prolog
            $prologPath = 'C:\\Program Files\\swipl\\bin\\swipl.exe';
            // Ruta al archivo Prolog con las reglas
            //$archivoProlog = 'C:\\Users\\CTA-WEB-01\\Documents\\respuestas.pl';
            $archivoProlog = 'C:\\Users\\garci\\OneDrive\\Documentos\\Universidad\\8voSemestre\\SEMSBC\\brainMed.pl';

            // Verificar que los archivos existan
            if (!file_exists($prologPath)) {
                return "Error: No se encontró el ejecutable de SWI-Prolog en la ruta especificada.";
            }

            if (!file_exists($archivoProlog)) {
                return "Error: No se encontró el archivo de reglas Prolog en la ruta especificada.";
            }

            // Extraer los síntomas de la entrada
            $sintomas = $this->extraerSintomas($entrada);

            if (empty($sintomas)) {
                return "No he podido identificar síntomas en tu mensaje. Por favor, selecciona algunos síntomas para que pueda ayudarte.";
            }

            // Convertir los síntomas al formato adecuado para Prolog (reemplazar espacios por guiones bajos)
            $sintomasFormateados = array_map(function($s) {
                return str_replace(' ', '_', strtolower($s));
            }, $sintomas);

            // Construir la lista de síntomas para Prolog
            $sintomasLista = "[" . implode(', ', $sintomasFormateados) . "]";

            // Construir el comando para diagnóstico usando el predicado diagnostico/2
            $comando = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(diagnostico({$sintomasLista}, Enfermedad) -> write('Basado en tus sintomas, podrias tener: '), write(Enfermedad) ; write('No puedo determinar una enfermedad con esos síntomas.')), nl.\" -t halt";

            // Para depuración - guardar el comando en un archivo de log
            file_put_contents('C:\\xampp2\\htdocs\\testProject\\prolog_debug.log', $comando . PHP_EOL, FILE_APPEND);

            // Ejecutar el comando y capturar la salida
            $salida = null;
            $codigo = null;
            exec($comando, $salida, $codigo);

            // Guardar la salida para depuración
            file_put_contents('C:\\xampp2\\htdocs\\testProject\\prolog_debug.log',
                            "Código: {$codigo}, Salida: " . print_r($salida, true) . PHP_EOL,
                            FILE_APPEND);
            // Verificar si hubo algún error en la ejecución
            if ($codigo !== 0) {
                // Registrar el error para depuración
                error_log("Error al ejecutar Prolog. Código: {$codigo}. Comando: {$comando}");
                return "Lo siento, ocurrió un error al procesar tu mensaje.";
            }

            // Procesar la salida (puede ser un array, tomamos la primera línea)
            $respuesta = isset($salida[0]) ? $salida[0] : "No se obtuvo respuesta.";
            return $respuesta;
        }

    /**
     * Extrae los síntomas del mensaje de entrada
     */
    private function extraerSintomas($entrada)
    {
        $sintomas = [];
        // Si el formato es simplemente una lista separada por comas
        if (strpos($entrada, ',') !== false) {
            $sintomas = array_map('trim', explode(',', $entrada));
        }
        // Si es un solo síntoma
        else {
            $sintomas = [trim($entrada)];
        }
        return $sintomas;
    }
}


