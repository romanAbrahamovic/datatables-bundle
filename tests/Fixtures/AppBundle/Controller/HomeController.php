<?php

/*
 * Symfony DataTables Bundle
 * (c) Omines Internetbureau B.V. - https://omines.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Fixtures\AppBundle\Controller;

use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * HomeController.
 *
 * @author Niels Keurentjes <niels.keurentjes@omines.com>
 */
class HomeController extends Controller
{
    use DataTablesTrait;

    public function showAction()
    {
        $datatable1 = $this->createDataTable();
        $datatable1
            ->add('col1', TextColumn::class, ['label' => 'foo', 'field' => 'bar'])
            ->add('col2', TextColumn::class, ['label' => 'bar', 'field' => 'foo'])
        ;

        $datatable2 = $this->createDataTable([
            'languageFromCdn' => false,
        ]);
        $datatable2
            ->add('col3', TextColumn::class, ['label' => 'foo', 'field' => 'bar'])
            ->add('col4', TextColumn::class, ['label' => 'bar', 'field' => 'foo'])
        ;

        return $this->render('@App/home.html.twig', [
            'datatable1' => $datatable1,
            'datatable2' => $datatable2,
        ]);
    }
}