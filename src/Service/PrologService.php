<?php
namespace App\Service;

class PrologService
{
    public function procesarMensaje($entrada, $session)
    {
        [$sintomasValidos, $estacion] = $this->foundSeason($entrada);
        if (count($sintomasValidos) <3) {
            return "Se requieren al menos 3 síntomas para poder ayudarte.";
        }
        $sintomasCadena = implode(', ', $sintomasValidos);
        $prologPath = 'C:\\Program Files\\swipl\\bin\\swipl.exe';
        $archivoProlog = 'C:\\Users\\CTA-WEB-01\\Documents\\brainMed.pl';
        //$archivoProlog = 'C:\\Users\\garci\OneDrive\\Documentos\\Universidad\\8voSemestre\\SEMSBC\\brainMed.pl';
        if (!file_exists($prologPath)) {
            return "Error: No se encontró el ejecutable de SWI-Prolog en la ruta especificada.";
        }
        if (!file_exists($archivoProlog)) {
            return "Error: No se encontró el archivo de reglas Prolog en la ruta especificada.";
        }
        $sintomas = $this->extraerSintomas($sintomasCadena);
        if (empty($sintomas)) {
            return "No he podido identificar síntomas en tu mensaje. Por favor, selecciona algunos síntomas para que pueda ayudarte.";
        }

        // Pasar los síntomas como strings tipo 'fiebre alta'
        $sintomasFormateados = array_map(function($s) {
            return "'" . strtolower(trim($s)) . "'";
        }, $sintomas);
        $sintomasLista = "[" . implode(', ', $sintomasFormateados) . "]";
        $comando = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(parse_sintomas_entrada({$sintomasLista}, SintomasFormateados), diagnostico(SintomasFormateados, Enfermedad, '{$estacion}') -> write('Basado en tus sintomas y la estacion en la que te encuentras, podrias tener: '), write(Enfermedad) ; write('No puedo determinar una enfermedad con esos síntomas.')), nl.\" -t halt";
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando . PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp2\\htdocs\\testProject\\prolog_debug.log',  $comando .  PHP_EOL, FILE_APPEND);

        $salida = null;
        $codigo = null;
        exec($comando, $salida, $codigo);
        if (preg_match('/podrias tener: (.*)/', $salida[0] ?? '', $matches)) {
            $enfermedad = $matches[1];
            $session->write('enfermedad', $enfermedad);
        } else {
            return "No he podido identificar síntomas en tu mensaje. Por favor, selecciona algunos síntomas para que pueda ayudarte.";
        }
        $enfermedad = "'". strtolower(trim($enfermedad)). "'";
        

        $comando2 = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(tratamientode({$enfermedad}, Tratamiento) -> write('Para tu enfermedad, te recomiendo: '), write(Tratamiento) ; write('No puedo proporcionar un tratamiento para esa enfermedad.')), nl.\" -t halt";
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando2 . PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp\\htdocs\\testProject\\prolog_debug.log', $comando2 . PHP_EOL, FILE_APPEND);
        $salida2 = null;
        $codigo2 = null;
        exec($comando2, $salida2, $codigo2);
        $salida2 = str_replace(['[', ']'], '', $salida2);
        $comando3 = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"(parse_sintomas_entrada({$sintomasLista}, SintomasFormateados),advertencia_urgencias(SintomasFormateados)), nl.\" -t halt";
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando3. PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp\\htdocs\\testProject\\prolog_debug.log', $comando3. PHP_EOL, FILE_APPEND);
        $salida3 = null;
        $codigo3 = null;
        exec($comando3, $salida3, $codigo3);

        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', "Código: {$codigo}, Salida: " . print_r($salida, true) . PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp\\htdocs\\testProject\\prolog_debug.log', "Código: {$codigo}, Salida: ". print_r($salida, true). PHP_EOL, FILE_APPEND);
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', "Código: {$codigo2}, Salida: " . print_r($salida2, true) . PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp\\htdocs\\testProject\\prolog_debug.log', "Código: {$codigo2}, Salida: ". print_r($salida2, true). PHP_EOL, FILE_APPEND);
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', "Código: {$codigo3}, Salida: ". print_r($salida3, true). PHP_EOL, FILE_APPEND);
        //file_put_contents('C:\\xampp\\htdocs\\testProject\\prolog_debug.log', "Código: {$codigo3}, Salida: ". print_r($salida3, true). PHP_EOL, FILE_APPEND);
        if ($codigo !== 0 || $codigo2 !== 0) {
            return "Lo siento, ocurrió un error al procesar tu mensaje.";
        }
        $respuesta = $salida[0] ?? "No se obtuvo respuesta.";
        $respuesta2 = $salida2[0] ?? "No se obtuvo respuesta.";
        $respuesta3 = $salida3[0]?? "Sin síntomas graves.";
        return $respuesta . ".\n" . $respuesta2 . ".\n" . $respuesta3;
    }
    private function extraerSintomas($entrada)
    {
        $sintomas = [];
        if (strpos($entrada, ',') !== false) {
            $sintomas = array_map('trim', explode(',', $entrada));
        } else {
            $sintomas = [trim($entrada)];
        }
        return $sintomas;
    }
    public function foundSeason($entrada)
    {
        $estaciones = ['primavera', 'verano', 'otonio', 'invierno'];
        $arraySintomas = array_map('trim', explode(',', $entrada));
        $sintomasValidos = [];
        $estacion = null;
            foreach ($arraySintomas as $sintoma) {
                if (in_array(strtolower($sintoma), $estaciones)) {
                    $estacion = strtolower($sintoma);
                } else {
                    $sintomasValidos[] = $sintoma;
                }
            }
        return [$sintomasValidos, $estacion];
    }
}
