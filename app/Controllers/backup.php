class Home extends BaseController
{
    public function index(): string
    {
        // $apiKey = '113b35c030f0f795fe5a9e1199821e79'; // Clave API
        // $city = 'San Luis';
        // $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric";

        // $responseBody = ''; // Definir la variable antes del bloque try

        try {
            // Instancia del cliente HTTP
            $client = new Client();
            $response = $client->get($apiUrl);

            // Obtener el código de estado y el cuerpo de la respuesta
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();

            if ($statusCode !== 200) {
                throw new \Exception('Error en la solicitud HTTP: ' . $response->getReasonPhrase() . ' (Código: ' . $statusCode . ')');
            }

            // Decodificar la respuesta JSON
            $weatherData = json_decode($responseBody, true);

            // Verificar la estructura de la respuesta
            if (!isset($weatherData['list'])) {
                throw new \Exception('La clave "list" no está presente en la respuesta de la API.');
            }

            return view('index_view', ['weather' => $weatherData]);
        } catch (RequestException $e) {
            // Manejar el error e incluir el cuerpo de la respuesta en el mensaje de error para depuración
            return 'Error: ' . $e->getMessage() . ' - Respuesta: ' . ($responseBody ?: 'No hay respuesta disponible');
        }
    }