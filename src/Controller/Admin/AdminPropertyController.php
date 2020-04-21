<?php
namespace App\Controller\Admin;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class AdminPropertyController extends AbstractController
{

     /**
     * @Route("/admin", name="admin.property.index")
     *  @param PropertyRepository $repository
     *  @return Response
     */
    public function index(PropertyRepository $repository):Response
    {
        $properties=$repository->findLatest();
        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @param Proprietes $property
     * @return Response
     */
    public function edit()
    {
        //$property = new Property;


           // $manager->persist($property);
           // $manager->flush();
        return $this->render('admin/property/edit.html.twig', [
            'current_menu' => 'Properties'
        ]);
    }
}



?>