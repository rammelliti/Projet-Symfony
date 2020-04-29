<?php

namespace App\Controller\Admin;

use App\Entity\Option ;
use App\Form\OptionType;
use App\Repository\OptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdminOptionController extends AbstractController
{
    /**
     * @Route("/admin/option", name="admin_option")
     */
    public function index()
    {
        return $this->render('admin_option/index.html.twig', [
            'controller_name' => 'AdminOptionController',
        ]);
    }
    /**
    * @Route("/admin/option/create", name="admin.option.new")
    * @param Option $option
    * @param Request $request
    */
    public function new(Request $request)
    {
        $option = new Option;
        $form = $this->createForm(OptionType::class, $option);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

           
            $this->entityManager->persist($option);
            $this->entityManager->flush();
            $this->addFlash ("success", "Votre option a été choisi avec succès");
            return $this->redirectToRoute('admin.option.index');
        }
            return $this->render('admin/option/new.html.twig',[
                'option' => $option,
                'form' => $form->createView()
            ]);
        }

    /**
    * @Route("/admin/option/{id}", name="admin.option.edit", methods="GET|POST")
    * @return Response
    * @param Option $option
    * @param Request $request
    */
    public function edit(Option $option, Request $request)
    {

        $form = $this->createForm(OptionType::class, $option);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->entityManager->flush();
            $this->addFlash ("success", "Votre option a été modifié avec succès");
            return $this->redirectToRoute('admin.option.index');

        }


        return $this->render('admin/option/edit.html.twig',[
            'option' => $option,
            'form' => $form->createView()
        ]);
    }
    /**
    * @Route("/{id}", name="admin.option.delete", methods="DELETE")
    * @return Response
    * @param Option $option
    */
   public function delete(Option $option, Request $request)
   {
        if ($this->isCsrfTokenValid('delete' . $option->getId(), $request->get('_token'))) {
           
            $this->entityManager->remove($option);
            $this->entityManager->flush();
            $this->addFlash("success", "Votre option a été supprimé avec succès");
        }
        
        return $this->redirectToRoute('admin.option.index');

    
   }
}
