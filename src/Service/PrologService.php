<?php
namespace App\Service;
class PrologService
{
    public function procesarMensaje($entrada)
        {
            $estaciones = [
                'primavera', 'verano', 'otoño', 'invierno'
            ];
            $arraySintomas = array_map('trim', explode(',', $entrada));
            $sintomasValidos =[];
            $estacion = null;
            foreach ($arraySintomas as $sintoma) {
                if (in_array($sintoma, $estaciones)) {
                    $estacion = $sintoma;
                } else {
                    $sintomasValidos[] = $sintoma;
                }
            }
            $sintomasCadena = implode(', ', $sintomasValidos);
            // Ruta a la instalación de SWI-Prolog
            $prologPath = 'C:\\Program Files\\swipl\\bin\\swipl.exe';
            // Ruta al archivo Prolog con las reglas
            $archivoProlog = 'C:\\Users\\CTA-WEB-01\\Documents\\brainMed.pl';
            //$archivoProlog = 'C:\\Users\\garci\\OneDrive\\Documentos\\Universidad\\8voSemestre\\SEMSBC\\brainMed.pl';
            // Verificar que los archivos existan
            if (!file_exists($prologPath)) {
                return "Error: No se encontró el ejecutable de SWI-Prolog en la ruta especificada.";
            }
            if (!file_exists($archivoProlog)) {
                return "Error: No se encontró el archivo de reglas Prolog en la ruta especificada.";
            }

            // Extraer los síntomas de la entrada
            $sintomas = $this->extraerSintomas($sintomasCadena);

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
            $comando = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(diagnostico({$sintomasLista}, Enfermedad, {$estacion}) -> write('Basado en tus sintomas y la estacion en la que te encuentras, podrias tener: '), write(Enfermedad) ; write('No puedo determinar una enfermedad con esos síntomas.')), nl.\" -t halt";
            // Para depuración - guardar el comando en un archivo de log
            //file_put_contents('C:\\xampp2\\htdocs\\testProject\\prolog_debug.log', $comando . PHP_EOL, FILE_APPEND);
            file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando . PHP_EOL, FILE_APPEND);
            // Ejecutar el comando y capturar la salida
            $salida = null;
            $codigo = null;
            exec($comando, $salida, $codigo);
            if(preg_match('/podrias tener: (.*)/', $salida[0], $matches)) {
                $enfermedad = $matches[1];
            } else {
                return "No he podido identificar síntomas en tu mensaje. Por favor, selecciona algunos síntomas para que pueda ayudarte.";
            }
            $comando2 = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(tratamiento({$enfermedad}, Tratamiento) -> write('Para tu enfermedad, te recomiendo: '), write(Tratamiento) ; write('No puedo proporcionar un tratamiento para esa enfermedad.')), nl.\" -t halt";
            file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando2. PHP_EOL, FILE_APPEND);
            // Ejecutar el comando y capturar la salida
            $salida2 = null;
            $codigo2 = null;
            exec($comando2, $salida2, $codigo2);
            // Guardar la salida para depuración
            //file_put_contents('C:\\xampp2\\htdocs\\testProject\\prolog_debug.log',"Código: {$codigo}, Salida: " . print_r($salida, true) . PHP_EOL,FILE_APPEND);
            file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log',"Código: {$codigo}, Salida: ". print_r($salida, true). PHP_EOL,FILE_APPEND);
            file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log',"Código: {$codigo2}, Salida: ". print_r($salida2, true). PHP_EOL,FILE_APPEND);
            // Verificar si hubo algún error en la ejecución
            if ($codigo !== 0) {
                // Registrar el error para depuración
                error_log("Error al ejecutar Prolog. Código: {$codigo}. Comando: {$comando}");
                return "Lo siento, ocurrió un error al procesar tu mensaje.";
            }
            if ($codigo2!== 0) {
                // Registrar el error para depuración
                error_log("Error al ejecutar Prolog. Código: {$codigo2}. Comando: {$comando2}");
                return "Lo siento, ocurrió un error al procesar tu mensaje para el tratamiento.";
            }
            // Procesar la salida (puede ser un array, tomamos la primera línea)
            $respuesta = isset($salida[0]) ? $salida[0] : "No se obtuvo respuesta.";
            $respuesta2 = isset($salida2[0])? $salida2[0] : "No se obtuvo respuesta.";
            $respuesta = $respuesta."." . "\n " . $respuesta2;
            // Devolver la respuesta
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


