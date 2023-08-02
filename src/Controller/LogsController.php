<?php
namespace App\Controller;

use App\Entity\Token;
use App\Entity\Wiadomosc;
use App\Serwis\LogsRequestValidator;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class LogsController extends AbstractController
{
  #[Route('/logs', name: 'check_logs', methods: ['POST'])]
  public function hello(Request $request,EntityManagerInterface $inter ): JsonResponse // Metoda przymuje obiekt żądania HTTP
  {
    $data = json_decode($request->getContent(), true); //pobiera obiekt i dekoduje z formatu JSON do tablicy PHP

    $validator = new LogsRequestValidator();
    $validationError = $validator->validate($data);
      if ($validationError) {
          return $validationError;
      }

    $data_wyslania = $data['data_wyslania'];
    $format = "Y-m-d H:i:s";
    $data_wyslania_format_datetime = DateTime::createFromFormat($format, $data_wyslania);
  
    $status = $data['status'];
    $logi = $data['logi'];

    $id_tokenu = $inter->getRepository(Token::class)->findOneBy(['token' => $data['token']]);
    if (!$id_tokenu) {
        return new JsonResponse(['error' => 'Nie znaleziono tokenu o podanym id'], 400);
    }

    $wiadomosc = new Wiadomosc();
    $wiadomosc->setDataWyslania($data_wyslania_format_datetime);
    $wiadomosc->setStatus($status);
    $wiadomosc->setLogi($logi);
    $wiadomosc->setIdTokenu($id_tokenu);

    $inter->persist($wiadomosc);
    $inter->flush();

    if ($wiadomosc->getId()) {
      return new JsonResponse(['reply' => 'Ok'], 200);
    } 
    else {
      return new JsonResponse(['reply' => 'Nie Ok'], 400);
    }
  }
}