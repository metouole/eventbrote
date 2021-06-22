<?php

namespace App\Twig;

use Twig\TwigFilter;
use App\Entity\Event;
use Twig\TwigFunction;
use Twig\Extra\Intl\IntlExtension;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('dateTime', [$this, 'formatDateTime']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('format_price', [$this, 'format_price']),
        ];
    }

    public function format_price(Event $event)
    {
       
        return $event->isFree() 
        ? '<b>Free<b>' :  (new IntlExtension)->formatCurrency($event->getPrice(), 'XOF');
     
    }

    public function formatDateTime(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format('F d, Y \a\t h:i A');
    }
}
