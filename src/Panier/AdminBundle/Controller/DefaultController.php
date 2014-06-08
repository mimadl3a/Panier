<?php

namespace Panier\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panier\AdminBundle\Entity\Produit;
use Panier\AdminBundle\Form\ProduitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$p = new Produit();    	
    	$form = $this->createForm(new ProduitType(), $p);

    	$form->handleRequest($request);
    	if ($form->isValid()) {
            $p = $form->getData();
            $p1 = $this->getDoctrine()
            		   ->getRepository('PanierAdminBundle:Produit')
            		   ->findBy(
            		   		array(
	            		   		'libelle' => $p->getLibelle(),
	            		   		'taille' => $p->getTaille(),
	            		   		'couleur' => $p->getCouleur(),
	            		   		'prix' => $p->getPrix()
	            		   	)
            		   	);
            if($p1){
            	return new Response("Erreur, produit dèja ajouté !");
            }else{
            	$em = $this->getDoctrine()->getManager();

	            $em->persist($p);
	            $em->flush();
	            
	            return new Response("Produit ajouté avec succès !");
            }
            
        }else{
        	return $this->render('PanierAdminBundle:Default:index.html.twig', array(
	        	'name' => '',
	        	'form' => $form->createView(),
	        ));
        }
    }
}
