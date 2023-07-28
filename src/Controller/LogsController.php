<?php
namespace App\Controller;

use App\Entity\Message;
use App\Entity\Wiadomosc;
use App\Repository\MessageRepository;
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

      if (!isset($data['date'] )) {
        return new JsonResponse(['error' => 'Brak liczby w żądaniu'], 400);
      }
    
      $date = $data['date'];
      $format = 'd-m-Y';
      $validDate = DateTime::createFromFormat($format, $date);
      if ($validDate->format($format) != $date) {
          return new JsonResponse(['error' => 'Liczba musi być liczbą całkowitą'], 400);
      }

      $time =$data['time'];
      $format = 'h:i:s';
      $validTime = DateTime::createFromFormat($format, $date);
      if ($validTime->format($format) != $time) {
          return new JsonResponse(['error' => 'Liczba musi być liczbą całkowitą'], 400);
      }

      if (!is_int($data['status'])) {
          return new JsonResponse(['error' => 'Liczba musi być liczbą całkowitą'], 400);
      }
    
      $status = $data['status'];
      if(is_string($status)) {
        return new JsonResponse(['error' => 'Liczba musi być liczbą całkowitą'], 400);
      }

      $wiadomosc = new Wiadomosc();
      
      // $inter->persist($message);
      $inter->flush();

      if ($wiadomosc->getId()) {
        return new JsonResponse(['reply' => 'Ok'], 200);
      } 
      else {
        return new JsonResponse(['reply' => 'Nie Ok'], 400);
      }

  }
    

}