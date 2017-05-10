# zenvia
Integração PHP – Envio de SMS na API

include('vendor/autoload.php');

$key = "You Key";

$zenvia = new \Smolareck\Zenvia\Zenvia($key);

$zenvia->setFrom("Carlos");

$zenvia->setNumber("5551999999999");

$zenvia->setMessage("Hello World");

$return = $zenvia->send();

var_dump($return);
