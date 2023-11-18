<?php

namespace App\Controller\Admin;

use App\Entity\FormulaireDeRenseignement;
use App\Entity\VoituresOccasions;
use App\Entity\Avis;
use App\Entity\Marques;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardControllerEmploye extends AbstractDashboardController
{
    #[Route('/employe/dashboard', name: 'employe_dashboard')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
        return $this->render('admin/dashboardEmploye.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecf Garage Automobile');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Liste des voitures', 'fa-solid fa-plus', VoituresOccasions::class);
        yield MenuItem::linkToCrud('Marques', 'fa-solid fa-comment', Marques::class);
        yield MenuItem::linkToCrud('Information', 'fa-solid fa-circle-info', FormulaireDeRenseignement::class);
        yield MenuItem::linkToCrud('Avis client', 'fa-solid fa-comment', Avis::class);
    }
}
