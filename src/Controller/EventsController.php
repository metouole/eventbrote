<?php 

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class EventsController extends AbstractController
{
	#[Route('/events')]
	public function index(): Response
	{
		$events = ['symfony', 'laravel', 'rails', 'django'];
		return $this->render('events/index.html.twig', compact('events'));
	}
}

