<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class EventsController extends AbstractController
{

	#[Route('/events')]
	public function index(EventRepository $eventRepository): Response
	{
		//$em = $this->getDoctrine()->getManager();
		//$eventRepository = $em->getRepository(Event::class);
		$events = $eventRepository->findAll();
		return $this->render('events/index.html.twig', compact('events'));
	}
}

