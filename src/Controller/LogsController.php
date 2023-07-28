<?php
namespace App\Controller;

use App\Entity\Tokeny;
use App\Entity\Wiadomosci;
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

      if($data == null) {
        return new JsonResponse(['error' => 'Brak danych w żądaniu'], 400);
      }

      if (!isset($data['data_wyslania'] )) {
        return new JsonResponse(['error' => 'Brak daty w żądaniu'], 400);
      }
      if (!isset($data['id_tokenu'] )) {
        return new JsonResponse(['error' => 'Brak id_tokenu w żądaniu'], 400);
      }
      if (!isset($data['status'] )) {
        return new JsonResponse(['error' => 'Brak statusu w żądaniu'], 400);
      }
    

      $data_wyslania = $data['data_wyslania'];
      $format = "Y-m-d H:i:s";
      $data_wyslania_format_datetime = DateTime::createFromFormat($format, $data_wyslania);
      if ($data_wyslania_format_datetime->format($format) != $data_wyslania) {
          return new JsonResponse(['error' => 'Zly format daty'], 400);
      }
    
      $status = $data['status'];
      $logi = $data['logi'];
      
      $id_tokenu = new Tokeny();
      $id_tokenu->setToken($data['id_tokenu']); // assuming this is a token, not a Tokeny id
      $inter->persist($id_tokenu);
      $inter->flush();

      $wiadomosc = new Wiadomosci();
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