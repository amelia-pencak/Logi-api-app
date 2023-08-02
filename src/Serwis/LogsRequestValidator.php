<?php
namespace App\Serwis;

use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;

class LogsRequestValidator
{
    public function validate(array $data): JsonResponse|null
    {
        if ($data == null) {
            return new JsonResponse(['error' => 'Brak danych w żądaniu'], 400);
        }
        

        if (!isset($data['data_wyslania'])) {
            return new JsonResponse(['error' => 'Brak daty w żądaniu'], 400);
        }
        if (!isset($data['token'])) {
            return new JsonResponse(['error' => 'Brak wartosci tokenu w żądaniu'], 400);
        }
        if (!isset($data['status'])) {
            return new JsonResponse(['error' => 'Brak statusu w żądaniu'], 400);
        }

        $data_wyslania = $data['data_wyslania'];
        $format = "Y-m-d H:i:s";
        $data_wyslania_format_datetime = DateTime::createFromFormat($format, $data_wyslania);
        if ($data_wyslania_format_datetime->format($format) != $data_wyslania) {
            return new JsonResponse(['error' => 'Zly format daty'], 400);
        }

        return null;
    }
}
