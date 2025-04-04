<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chats Controller
 *
 *
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChatsController extends AppController
{
    public function index()
    {
        // Cargar mensajes anteriores
        $chats = $this->Chats->find('all', [
        ])->toArray();
        
        if ($this->request->is('post')) {
            // Obtener la entrada del usuario
            $entrada = $this->request->getData('entrada');
            // Llamar a Prolog para procesar la entrada y obtener la respuesta
            $respuesta = $this->procesarMensaje($entrada);
            // Crear una nueva entidad de chat
            $chat = $this->Chats->newEntity([
                'entrada' => $entrada,
                'respuesta' => $respuesta,
                'hora_entrada' => date('Y-m-d H:i:s'),
                'hora_respuesta' => date('Y-m-d H:i:s'),
            ]);
            // Guardar el chat en la base de datos
            $this->Chats->save($chat);
            // Pasar la respuesta a la vista
            $this->set(compact('respuesta', 'entrada'));
        }
        // Pasar todos los chats a la vista
        $this->set(compact('chats'));
    }

    private function procesarMensaje($entrada)
    {
        // Ruta a la instalación de SWI-Prolog
        $prologPath = 'C:\\Program Files\\swipl\\bin\\swipl.exe';
        
        // Ruta al archivo Prolog con las reglas
        $archivoProlog = 'C:\\Users\\CTA-WEB-01\\Documents\\respuestas.pl';
        
        // Verificar que los archivos existan
        if (!file_exists($prologPath)) {
            return "Error: No se encontró el ejecutable de SWI-Prolog en la ruta especificada.";
        }
        
        if (!file_exists($archivoProlog)) {
            return "Error: No se encontró el archivo de reglas Prolog en la ruta especificada.";
        }
        
        // Escapar comillas simples en la entrada
        $entradaEscapada = str_replace("'", "\'", $entrada);
        
        // Construir el comando correctamente
        $comando = "\"{$prologPath}\" -s \"{$archivoProlog}\" -g \"responder('{$entradaEscapada}', R), write(R), nl.\" -t halt";
        
        // Para depuración - guardar el comando en un archivo de log
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', $comando . PHP_EOL, FILE_APPEND);
        // Ejecutar el comando y capturar la salida
        $salida = null;
        $codigo = null;
        exec($comando, $salida, $codigo);
        // Guardar la salida para depuración
        file_put_contents('C:\\xampp\\htdocs\\testProject\\testCakePHP\\prolog_debug.log', 
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
}
